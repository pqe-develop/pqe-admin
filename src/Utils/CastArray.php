<?php

namespace Pqe\Admin\Utils;

class CastArray {

    public static function toFloat($num) {
        $dotPos = strrpos($num, '.');
        $commaPos = strrpos($num, ',');
        $sep = (($dotPos > $commaPos) && $dotPos) ? $dotPos : ((($commaPos > $dotPos) && $commaPos) ? $commaPos : false);

        if (!$sep) {
            return floatval(preg_replace("/[^0-9]/", "", $num));
        }

        return floatval(
                preg_replace("/[^0-9]/", "", substr($num, 0, $sep)) . '.' .
                preg_replace("/[^0-9]/", "", substr($num, $sep + 1, strlen($num))));
    }

    public static function recursive_array_search($needle, array $haystack) {
        if (!is_array($haystack))
            return false;

        foreach ($haystack as $key => $value) {
            if ($value == $needle) {
                return $key;
            } else if (is_array($value)) {
                // multi search
                $key_result = self::recursive_array_search($needle, $value);
                if ($key_result !== false) {
                    return $key . '_' . $key_result;
                }
            }
        }

        return false;
    }
    
    public static function searchArray($search, $itemName, $arrayItems) {
        $returnKey = null;
        foreach ($arrayItems as $key => $items) {
            if ($search == $items[$itemName]) {
                $returnKey = $key;
                break;
            }
        }
        return $returnKey;
    }
    
    
}

