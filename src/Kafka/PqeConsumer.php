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
        if (config('pqe.kafkaServer')) {
            // Laravel
            $bootstrapServers = config('pqe.kafkaServer');
            $groupId = config('pqe.kafkaGroup');
            $this->app = 'Laravel';
        } else {
            // Suite
            global $sugar_config;
            $bootstrapServers = $sugar_config('pqe_kafka_servers');
            $groupId = $sugar_config('pqe_kafka_group');
            $this->app = 'Suite';
        }
        $conf->set('bootstrap.servers', $bootstrapServers);
        $conf->set('group.id', $groupId);

        $this->consumer = new KafkaConsumer($conf);
        $this->consumer->subscribe([
            'pqe-admin'
        ]);
    }

    public function consume()
    {
        /*
         * consume return RdKafka\Message that have this structure:
         * Properties
         * public int|null $err ;
         * public int|null $len ;
         * public string|null $topic_name ;
         * public int|null $timestamp ;
         * public int|null $partition ;
         * public string|null $payload ;
         * public string|null $key ;
         * public int|null $offset ;
         * public string|null $opaque ;
         * Methods
         * public errstr ( void ) : string
         * public headers ( void ) : string
         */
        while (true) {
            $message = $this->consumer->consume(120 * 1000);

            switch ($message->err) {
                case RD_KAFKA_RESP_ERR_NO_ERROR :
                    // Process the consumed message
                    if ($this->app == 'Laravel') {
                        PqeLog::info($message->payload);
                        $result = $this->execute(json_decode($message->payload, true));
                        if ($result['status'] == 'error') {
                            PqeLog::error($result['message']);
                        }
                    } else if ($this->app == 'Suite') {
                        $GLOBALS['log']->info($message->payload);
                        $result = $this->execute($message->payload);
                        if ($result['status'] == 'error') {
                            $GLOBALS['log']->error($result['message']);
                        }
                    }
                    break;
                case RD_KAFKA_RESP_ERR__PARTITION_EOF :
                    // End of partition, no more messages
                    if ($this->app == 'Laravel') {
                        PqeLog::info('No messages from Kafka. End Partition');
                    } else if ($this->app == 'Suite') {
                        $GLOBALS['log']->info('No messages from Kafka. End Partition');
                    }
                    break;
                case RD_KAFKA_RESP_ERR__TIMED_OUT :
                    // No message within the given timeout
                    if ($this->app == 'Laravel') {
                        PqeLog::info('No messages from Kafka');
                    } else if ($this->app == 'Suite') {
                        $GLOBALS['log']->info('No messages from Kafka');
                    }
                    break;
                default :
                    // Handle other errors
                    if ($this->app == 'Laravel') {
                        PqeLog::error($message->errstr() . PHP_EOL);
                    } else if ($this->app == 'Suite') {
                        $GLOBALS['log']->error($message->errstr());
                    }
                    break;
            }
            break;
        }
    }

    public function execute($payload)
    {
        /*
         * in Payload we organize producer messages with this structure in array:
         * id => topic-name + uuid()
         * class => class name (internal class to execute in app)
         * action => action to be used in application class
         * appProducer => topic name app Producer (for sendback)
         * data (array) => all data used in execute message
         */
        /*
         * result will be structured:
         * status => ok error
         * message => message error/ok to return
         * sendback => message to send back to producer
         */
        $action = $payload['action'];
        $classExecute = new $payload['class']();
        $result = $classExecute->$action($payload['id'], $payload['data']);
        return $result;
    }
}