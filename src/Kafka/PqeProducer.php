<?php
namespace Pqe\Admin\Kafka;

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
        $topic = $this->producer->newTopic($topicParam);
        
        $topic->produce(RD_KAFKA_PARTITION_UA, 0, $message);
        $result = $this->producer->flush(1000);

        if (RD_KAFKA_RESP_ERR_NO_ERROR !== $result) {
            throw new \RuntimeException('Was unable to flush, messages might be lost!');
            return false;
        }

        return true;
    }

    public function produceTransactional($topicParam, $message)
    {
        $topic = $this->producer->newTopic($topicParam);
        
        try {
        $producer->initTransactions(10000);
        $producer->beginTransaction();

        $topic->produce(RD_KAFKA_PARTITION_UA, 0, $message);
        $result = $this->producer->flush(1000);

        // Any outstanding messages will be flushed (delivered) before actually committing the transaction.
        $error = $producer->commitTransaction(10000);

        if (RD_KAFKA_RESP_ERR_NO_ERROR !== $error) {
            $producer->abortTransaction();
            //check what kind of error it was e.g. $error->isFatal(), etc. and act accordingly (retry, abort, etc.)
            throw new \RuntimeException('Was unable to flush, abort transaction, messages might be lost!');
            return false;
        }
        } catch (KafkaErrorException $e) {
            PqeLog::error($e->getMessage();
            return false
        }

        return true;
    }

}
