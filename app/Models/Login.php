<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Login extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "login";

    protected $guarded = [];

    public function roles($roles)
    {
        if ($roles) {
            return 'Admin';
        } else {
            return 'User';
        }
    }
}
