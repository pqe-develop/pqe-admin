<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Pqe\Admin\Kafka\PqeConsumer;

class KafkaConsumer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kafka:consume';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Consume messages from Kafka topics';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $consumer = new PqeConsumer();
//         ->withHandler(function (KafkaConsumerMessage $message) {
//             event(new MovieDataReceived(json_encode($message->getBody())));
//             $this->info('Received message: ' . json_encode($message->getBody()));
//         })->build();
        
        $consumer->consume();
    }
}
