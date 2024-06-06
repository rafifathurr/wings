<?php

namespace Database\Seeders;

use App\Models\Login;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Login::create([
            'user' => 'smit',
            'password' => Hash::make('_sm1t_OK'),
        ]);

        Login::create([
            'user' => 'user',
            'password' => Hash::make('user'),
        ]);
    }
}
