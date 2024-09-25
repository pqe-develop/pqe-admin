<?php

/* PQE env configuration */
return [

    // Inertia Flag
    'inertia' => env('APP_INERTIA'),
    
    // Kafka
    
    'kafkaServer' => env('KAFKA_BOOTSTRAP_SERVERS'),
    'kafkaGroup' => env('KAFKA_GROUP_ID'),
    
/* PQE Examples 
    'leavingEmail' => env('LEAVING_EMAIL'),
    'hrAdmin' => env('HR_ADMIN'),
    'ldEmail' => env('LD_EMAIL'),
    'talentEmail' => env('TALENT_EMAIL'),

    'openAiMaxChars' => env('OPENAI_MAX_CHARS', 19000),
    'openAiGtpVersion' => env('OPENAI_GPT_VERSION', '3.5'),
    'openAiApiKey' => env('OPENAI_API_KEY', "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"),
    'openAiUrl' => env('OPENAI_API_URL'),

    'openAiTemperature' => doubleval(env('OPENAI_TEMPERATURE', 0.6)),
    'openAiMaxTokens' => intval(env('OPENAI_MAX_TOKENS', 300)),
    'openAiTopP' => doubleval(env('OPENAI_TOP_P', 0.6)),
     */

];
