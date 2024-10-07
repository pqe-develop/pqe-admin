<?php

/* PQE env configuration */
return [

    // Inertia Flag
    'inertia' => env('APP_INERTIA'),
    
    // Kafka
    
    'kafkaServer' => env('KAFKA_BOOTSTRAP_SERVERS'),
    'kafkaGroup' => env('KAFKA_GROUP_ID'),
    
    // Mail Config
    'mailDevTo' => env('MAIL_DEV_TO'),
    'mailDevToName' => env('MAIL_DEV_TO_NAME'),

    // Google API Key
    'googleApiKey' => env('GOOGLE_API_KEY', ''),


];
