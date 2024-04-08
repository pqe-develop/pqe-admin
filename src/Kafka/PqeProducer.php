<?php
namespace Pqe\Admin\Kafka;

use RdKafka\Conf;
use RdKafka\Producer;

class PqeProducer
{
    private $producer;
    
    public function __construct()
    {
        $conf = new Conf();
        $conf->set('bootstrap.servers', config('pqe.kafkaServer'));
        
        $this->producer = new Producer($conf);
    }
    
    public function produce($topic, $message)
    {
        $topic = $this->producer->newTopic($topic);
        
        $topic->produce(RD_KAFKA_PARTITION_UA, 0, $message);
        $this->producer->flush(1000);
    }
}