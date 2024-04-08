<?php

/* PQE env configuration */
return [

    // Inertia Flag
    'inertia' => env('APP_INERTIA'),
    
    // Kafka

    'kafkaServer' => env('KAFKA_BOOTSTRAP_SERVERS'),
    'kafkaGroup' => env('KAFKA_GROUP_ID'),

];
