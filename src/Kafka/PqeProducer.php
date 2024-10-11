<?php

namespace Pqe\Admin\Kafka;

use Pqe\Admin\Models\KafkaJobs;
use RdKafka\Conf;
use RdKafka\Producer;

class PqeProducer
{
    private $producer;

    public function __construct($transactionalId = null)
    {
        $conf = new Conf();
        $conf->set('bootstrap.servers', config('pqe.kafkaServer'));

        if (!empty($transactionalId)) {
            $conf->set('transactional.id', $transactionalId);
        }

        // If you need to produce exactly once and want to keep the original produce order, uncomment the line below
        // $conf->set('enable.idempotence', 'true');

        $this->producer = new Producer($conf);
    }

    public function produce($topicParam, $message)
    {
        $returnValue = true;
        $topic = $this->producer->newTopic($topicParam);
        $error = '';

        // set unique ID for Kafka
        $kafkaId = $this->uniqKafkaId();
        
        $topic->produce(RD_KAFKA_PARTITION_UA, 0, $message, $kafkaId);
        $result = $this->producer->flush(1000);

        if (RD_KAFKA_RESP_ERR_NO_ERROR !== $result) {
            $error = 'Was unable to flush, messages might be lost! ' . json_encode($result);
            $returnValue = false;
        }

        $this->createKafkaJob($kafkaId, $topicParam, $message, $error);

        return $returnValue;
    }

    /* BDA TODO da implementare
    public function produceTransactional($topicParam, $messageArray, $kafkaId = null)
    {
        $returnValue = true;

        $kafkaId = $kafkaId ?? KafkaUtil::uniqKafkaId();

        $topic = $this->producer->newTopic($topicParam);

        try {
            $this->producer->initTransactions(10000);
            $this->producer->beginTransaction();

            foreach ($messageArray as $message) {
                $topic->produce(RD_KAFKA_PARTITION_UA, 0, $message, $kafkaId);
                $result = $this->producer->flush(1000);

                if (RD_KAFKA_RESP_ERR_NO_ERROR !== $result) {
                    $this->producer->abortTransaction();
                    //check what kind of error it was e.g. $error->isFatal(), etc. and act accordingly (retry, abort, etc.)
                    $error = 'Was unable to flush, abort transaction, messages might be lost! ' . json_encode($result);
                    $returnValue = false;
                    break;
                }
            }
            // Any outstanding messages will be flushed (delivered) before actually committing the transaction.
            $this->producer->commitTransaction(10000);
        } catch (KafkaErrorException $e) {
            PqeLog::error($e->getMessage());
            $error = $e->getMessager();
            $returnValue = false;
        }

        $this->createKafkaJob($kafkaId, $topicParam, $message, $error);

        return $returnValue;
    }
*/
    private function createKafkaJob($kafkaId, $topicParam, $message, $error = null)
    {
        $kafkaJobs = new KafkaJobs();
        $kafkaJobs->kafka_type = 'Producer';
        $kafkaJobs->kafka_id = $kafkaId;
        $kafkaJobs->kafka_source = config('app.name');
        $kafkaJobs->kafka_dest = $topicParam;
        $kafkaJobs->kafka_payload = $message;
        if (!empty($error)) {
            $kafkaJobs->kafka_status = 'Error';
            $kafkaJobs->kafka_message = $error;
        } else {
            $kafkaJobs->kafka_status = 'Sent';
        }
        $kafkaJobs->save();
    }
    
    public function uniqKafkaId($length = 13)
    {
        $prefix = config('app.name');
        // uniqid gives 13 chars, but you could adjust it to your needs.
        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($length / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($length / 2));
        } else {
            $bytes = uniqueid();
        }
        return $prefix . substr(bin2hex($bytes), 0, $length);
    }
	
	public static function getTopicName($prefix)
    {
        $topicName = $prefix;
        $topicName .= config('app.env') == 'production' ? '-prod' : '-dev';
        return $topicName;
    }

}
