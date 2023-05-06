<?php

namespace Pqe\Admin\Utils;

use Carbon\Carbon;
use DateTime;
use DateTimeZone;

class Dates {

    public static function getDataHsTimestamp($hubspotTimestamp) {
        $date = $hubspotTimestamp;
        $datestamp = $date / 1000;
        $datestamp_string = '@' . intval($datestamp);
        $dt = new DateTime($datestamp_string);
        $dt->setTimezone(new DateTimeZone('Europe/Rome'));
        $dbDate = $dt->format('Y-m-d H:i:s');
        return $dbDate;
    }

    public static function getDataHsTimezone($hubspotDate) {
        $dt_string = substr(str_replace('T', ' ', $hubspotDate), 0, strlen($hubspotDate) - 5);
        $dt = new DateTime($dt_string);
        $dt->setTimezone(new DateTimeZone('Europe/Rome'));
        $dbDate = $dt->format('Y-m-d H:i:s');
        return $dbDate;
    }

    public static function getDataHsDatabase($hubspotDate) {
        $dt_string = substr(str_replace('T', ' ', $hubspotDate), 0, strlen($hubspotDate) - 6);
        $dt = new DateTime($dt_string);
        $dt->setTimezone(new DateTimeZone('Europe/Rome'));
        $dbDate = $dt->format('Y-m-d H:i:s');
        return $dbDate;
    }

    public static function getDataFromSuite($suiteDate) {
        if (empty($suiteDate)) {
            return Carbon::now();
        } else {
            $date = $suiteDate;
            if (strpos($date, "-") !== false) {
                $format = 'Y-m-d H:i:s';
            } else {
                $format = 'd/m/Y H:i';
            }
            return Carbon::createFromFormat($format, $date);
        }
    }

    public static function getDataToInfinity($suiteDate) {
        $date = $suiteDate;
        if (strpos($date, "-") !== false) {
            $returnDate = $date;
        } else {
            $returnDate = substr($date, -4) . "-" . substr($date, 3, 2) . "-" . substr($date, 0, 2);
        }
        return $returnDate;
    }

    public static function getDataFromDmyToYmd($originDate) {
        $date = $originDate;
        $returnDate = substr($date, -4) . "-" . substr($date, 3, 2) . "-" . substr($date, 0, 2);
        return $returnDate;
    }
    
    public static function getDataFromHrzComplete($hrzDate) {
        $dt_string = substr(str_replace('T', ' ', $hrzDate), 0, strlen($hrzDate) - 6);
        $dt = new DateTime($dt_string);
        $dt->setTimezone(new DateTimeZone('Europe/Rome'));
        $dbDate = $dt->format('Y-m-d H:i:s');
        return $dbDate;
    }

    public static function getDataFromHrzYmd($hrzDate) {
        $dt_string = substr(str_replace('T', ' ', $hrzDate), 0, strlen($hrzDate) - 6);
        $dt = new DateTime($dt_string);
        $dt->setTimezone(new DateTimeZone('Europe/Rome'));
        $dbDate = $dt->format('Y-m-d');
        return $dbDate;
    }

    public static function getDataFromHrzYm($hrzDate) {
        $dt_string = substr(str_replace('T', ' ', $hrzDate), 0, strlen($hrzDate) - 6);
        $dt = new DateTime($dt_string);
        $dt->setTimezone(new DateTimeZone('Europe/Rome'));
        $dbDate = $dt->format('Ym');
        return $dbDate;
    }
    
    public static function getDataFromHrmsYmdYmd($hrzDate) {
        $dt_string = substr($hrzDate, -4) . "-" . substr($hrzDate, 3, 2) . "-" . substr($hrzDate, 0, 2);
        $dt = new DateTime($dt_string);
        $dt->setTimezone(new DateTimeZone('Europe/Rome'));
        $dbDate = $dt->format('Y-m-d');
        return $dbDate;
    }

    public static function getDataFromHrzHrmsToMap($hrzDate) {
        $dt_string = substr(str_replace('T', ' ', $hrzDate), 0, strlen($hrzDate) - 6);
        $dt = new DateTime($dt_string);
        $dt->setTimezone(new DateTimeZone('Europe/Rome'));
        $dbDate = $dt->format('d/m/Y');
        return $dbDate;
    }
}

