<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@press',
            'password'=> Hash::make('P1234@press'),
            'email_verified_at' => Carbon::now(),
            'is_active' => 1,
        ]);

        User::create([
            'first_name' => 'Human',
            'last_name' => 'Resource',
            'email' => 'hr@press',
            'password'=> Hash::make('P1234@press'),
            'email_verified_at' => Carbon::now(),
            'is_active' => 1,
        ]);

        User::create([
            'first_name' => 'Astrid',
            'last_name' => 'Valen',
            'email' => 'press-user1@protonmail.com',
            'mobile_no' => '+639111111111',
            'password'=> Hash::make('P1234@press'),
            'email_verified_at' => '2024-11-28 17:12:06',
            'created_at' => '2024-11-28 17:12:06',
            'updated_at' => '2024-11-28 17:12:06',
            'is_active' => 1,
        ]);

        User::create([
            'first_name' => 'Damien',
            'last_name' => 'Cole',
            'email' => 'press-user2@proton.me',
            'mobile_no' => '+639222222222',
            'password'=> Hash::make('P1234@press'),
            'email_verified_at' => '2024-12-02 03:34:12',
            'created_at' => '2024-12-02 03:34:12',
            'updated_at' => '2024-12-02 03:34:12',
            'is_active' => 1,
        ]);
    }
}
