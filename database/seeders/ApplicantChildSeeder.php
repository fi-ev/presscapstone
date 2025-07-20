<?php

namespace Database\Seeders;

use App\Models\ApplicantChild;
use App\Models\User;
use Illuminate\Database\Seeder;

class ApplicantChildSeeder extends Seeder
{
    public function run(): void
    {

        ApplicantChild::create([
            'user_id' => User::where('email','press-user1@protonmail.com')->first()->id,
            'full_name' => 'Ezra Wilder',
            'birthdate' => '2023-01-25',
            'application_id' => 1,
            'is_latest' => 0,
            'version' => 1,   
        ]);

        ApplicantChild::create([
            'user_id' => User::where('email','press-user2@proton.me')->first()->id,
            'full_name' => 'Lila Storm',
            'birthdate' => '2020-11-03',
            'application_id' => 2,
            'is_latest' => 0,
            'version' => 1,   
        ]);

        // latest version

        ApplicantChild::create([
            'user_id' => User::where('email','press-user1@protonmail.com')->first()->id,
            'full_name' => 'Ezra Wilder',
            'birthdate' => '2023-01-25',
            'application_id' => null,
            'is_latest' => 1,
            'version' => 2,   
        ]);

        ApplicantChild::create([
            'user_id' => User::where('email','press-user2@proton.me')->first()->id,
            'full_name' => 'Lila Storm',
            'birthdate' => '2020-11-03',
            'application_id' => null,
            'is_latest' => 1,
            'version' => 2,   
        ]);
        
    }
}
