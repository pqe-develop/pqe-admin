<?php
use Pqe\Admin\Kafka\PqeConsumer;
use Pqe\Admin\Kafka\PqeProducer;

Route::group([
    'middleware' => [
        'web',
        'auth'
    ]
],
function () {

    // Kafka examples
    Route::get('/consume', function (PqeConsumer $consumer) {
        $consumer->consume();
        return 'Consuming messages from Kafka...';
    });
        
    Route::get('/produce', function (PqeProducer $producer) {
        $producer->produce('Hello Kafka!');
        return 'Producing message to Kafka...';
    });
});

