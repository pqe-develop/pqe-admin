<?php

namespace App\Utils;

class CleanString {

    public static function clean($text) {
        return trim(preg_replace("/(\s*[\r\n]+\s*|\s+)/", ' ', $text));
    }
}

