<?php

namespace App\Helpers;

use App\Models\Purchase;

/**
 * Helpers for return format
 */
class NumberFormat
{
    public static function numberCurrencyFormat($number)
    {
       return number_format($number, 0, ',', '.');
    }
}
