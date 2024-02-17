<?php

namespace App\Helpers;

use Carbon\Carbon;

/**
 * Helpers for return current timestamp
 */
class CurrentTimestamp
{
    public static function getCurrent($formatter = null)
    {
        $currentTimestamp = date('Y-m-d H:i:s');
        if (is_null($formatter)) {
            return $currentTimestamp;
        } else {
            return strtotime($currentTimestamp);
        }
    }

    public static function getDate($formatter = null)
    {
        $currentDate = date('Y-m-d');
        if (is_null($formatter)) {
            return $currentDate;
        } else {
            return strtotime($currentDate);
        }
    }

    public static function convertDate($date)
    {
        return Carbon::parse($date)->translatedFormat('d F Y');
    }
}
