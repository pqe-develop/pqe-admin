<?php

class KafkaUtil
{

    public static function uniqKafkaId($length = 13)
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
}