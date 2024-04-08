<?php
namespace Pqe\Admin\Kafka;

use RdKafka\Conf;
use RdKafka\Producer;

class PqeProducerSyn
{
    private $producer;
    
    public function __construct()
    {
        $conf = new Conf();
        $conf->set('bootstrap.servers', config('pqe.kafkaServer'));
        
        $this->producer = new Producer($conf);
    }
    
    public function produce($message)
    {
        $topic = $this->producer->newTopic('pqe-admin');
        
        $topic->produce(RD_KAFKA_PARTITION_UA, 0, $message);
        $this->producer->flush(1000);
        /*
         $config->setRequiredAck(1);
         $config->setIsAsyn(false);
         $config->setProduceInterval(500);
         $producer = new \Kafka\Producer();
    	 $producer->send($message);
        */
    }
}