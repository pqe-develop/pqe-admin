<?php

namespace Pqe\Admin\Kafka;

use Pqe\Admin\Logging\PqeLog;
use Pqe\Admin\Models\KafkaJobs;
use RdKafka\Conf;
use RdKafka\KafkaConsumer;

class PqeConsumer
{
    private $consumer;
    private $app;
    private $topicName;

    public function __construct($topicName)
    {
        $this->topicName = $topicName;
        $conf = new Conf();
        $conf->set('bootstrap.servers', config('pqe.kafkaServer'));
        $conf->set('group.id', config('pqe.kafkaGroup'));

        $this->consumer = new KafkaConsumer($conf);
        $this->consumer->subscribe([
            $this->topicName
        ]);
    }

    public function consume()
    {
        while (true) {
            $message = $this->consumer->consume(120 * 1000);

            switch ($message->err) {
                case RD_KAFKA_RESP_ERR_NO_ERROR :
                    // Process the consumed message
                    PqeLog::info($message->payload);
                    $result = $this->execute($message);
                    if ($result['status'] == 'error') {
                        PqeLog::error($result['message']);
                    }
                    break;
                case RD_KAFKA_RESP_ERR__PARTITION_EOF :
                    // End of partition, no more messages
                    PqeLog::info('No messages from Kafka. End Partition');
                    break;
                case RD_KAFKA_RESP_ERR__TIMED_OUT :
                    // No message within the given timeout
                    PqeLog::info('No messages from Kafka');
                    break;
                default :
                    // Handle other errors
                    PqeLog::error($message->errstr() . PHP_EOL);
                    break;
            }
            break;
        }
    }

    public function execute($message)
    {
        $kafkaJob = $this->createKafkaJobs($message);
        $payload = json_decode($message->payload, true);
        $method = $payload['method'];
        $className = $payload['class'];
        $error = '';
        if (!class_exists($className)) {
            //            throw new Exception('Class ' . $className . ' does not exist');
            $result = 'Class ' . $className . ' does not exist';
            $error = $result;
        } else {
            $objectConsume = new $className();
            if (!method_exists($objectConsume, $method)) {
                //            throw new Exception('Function ' . $method . ' in class ' . $className . ' does not exist');
                $result = 'Function ' . $method . ' in class ' . $className . ' does not exist';
                $error = $result;
            } else {
                $result = $objectConsume->$method($payload['kafkaId'], $payload['properties']);
            }
        }
        $this->updateKafkaJobs($kafkaJob, $error);
        return $result;
    }

    public function createKafkaJobs($message)
    {
        $payload = json_decode($message->payload, true);
        $kafkaJobs = new KafkaJobs();
        $kafkaJobs->kafka_type = 'Consumer';
        $kafkaJobs->kafka_id = $message->key;
        $kafkaJobs->kafka_source = $this->topicName;
        $kafkaJobs->kafka_dest = config('app.name');
        $kafkaJobs->kafka_ref = [
            'method' => $payload['method'],
            'class' => $payload['class']
        ];
        $kafkaJobs->kafka_payload = $payload;
        $kafkaJobs->kafka_status = 'Start';
        $kafkaJobs->save();

        return $message->key;
    }

    public function updateKafkaJobs($kafkaJobs, $error = null)
    {
        if (!empty($error)) {
            $kafkaJobs->kafka_status = 'Error';
            $kafkaJobs->kafka_message = $error;
        } else {
            $kafkaJobs->kafka_status = 'Done';
        }
        $kafkaJobs->save();
    }
}
