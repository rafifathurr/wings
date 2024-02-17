<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

/**
 * Helpers for return current timestamp
 */
class CurrentUser
{
    public static function userId()
    {
        return Auth::user()->id;
    }

    public static function userData()
    {
        return Auth::user();
    }
}
