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
        $this->saveKafkaJobs('Start', $message);
        $payload = json_decode($message->payload, true);
        $method = $payload['method'];
        $className = $payload['class'];
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
        $this->saveKafkaJobs('Done', $message, $error);
        return $result;
    }

    public function saveKafkaJobs($status, $message, $error = null)
    {
        $payload = json_decode($message->payload, true);
        $this->kafkaJobs = new KafkaJobs();
        $this->kafkaJobs->kafka_type = 'Producer';
        $this->kafkaJobs->kafka_id = $message->id;
        $this->kafkaJobs->kafka_source = $this->topicName;
        $this->kafkaJobs->kafka_dest = config('app.name');
        $this->kafkaJobs->kafka_ref = [
            'method' => $payload['method'],
            'class' => $payload['class']
        ];
        $this->kafkaJobs->kafka_payload = $payload;
        if (!empty($error)) {
            $this->kafkaJobs->kafka_status = 'Error';
            $this->kafkaJobs->kafka_message = $error;
        } else {
            $this->kafkaJobs->kafka_status = $status;
        }
        $this->kafkaJobs->save();
    }
}
