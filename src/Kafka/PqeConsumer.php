<?php

namespace Pqe\Admin\Kafka;

use Pqe\Admin\Logging\PqeLog;
use RdKafka\Conf;
use RdKafka\KafkaConsumer;

class PqeConsumer
{
    private $consumer;
    private $app;

    public function __construct()
    {
        $conf = new Conf();
        $conf->set('bootstrap.servers', config('pqe.kafkaServer');
        $conf->set('group.id', config('pqe.kafkaGroup');

        $this->consumer = new KafkaConsumer($conf);
        $this->consumer->subscribe([
            'pqe-admin'
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
                        $result = $this->execute(json_decode($message->payload, true));
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

    public function execute($payload)
    {
        $action = $payload['action'];
        $classExecute = new $payload['class']();
        $result = $classExecute->$action($payload['id'], $payload['data']);
        return $result;
    }
}
