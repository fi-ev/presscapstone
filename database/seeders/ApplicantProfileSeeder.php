<?php

namespace Database\Seeders;

use App\Models\ApplicantProfile;
use App\Models\User;
use Illuminate\Database\Seeder;

class ApplicantProfileSeeder extends Seeder
{
    public function run(): void
    {
        ApplicantProfile::create([
            'user_id' => User::where('email','press-user1@protonmail.com')->first()->id,
            'first_name' => 'Astrid',
            'middle_name' => 'G',
            'last_name' => 'Valen',
            'birthdate' => '1995-01-01',
            'birthplace' => 'South Korea',
            'sex' => 'Female',
            'civil_status' => 'Married',
            'height' => 164.2,
            'weight' => 63.5,
            'blood_type' => 'O',
            'application_id' => 1,
            'is_latest' => 0,
            'version' => 1,
        ]);

        ApplicantProfile::create([
            'user_id' => User::where('email','press-user2@proton.me')->first()->id,
            'first_name' => 'Damien',
            'middle_name' => 'P',
            'last_name' => 'Cole',
            'birthdate' => '1992-05-23',
            'birthplace' => 'Germany',
            'sex' => 'Male',
            'civil_status' => 'Married',
            'height' => 175.8,
            'weight' => 65.5,
            'blood_type' => 'B+',
            'application_id' => 2,
            'is_latest' => 0,
            'version' => 1,
        ]);

        // latest version

        ApplicantProfile::create([
            'user_id' => User::where('email','press-user1@protonmail.com')->first()->id,
            'first_name' => 'Astrid',
            'middle_name' => 'G',
            'last_name' => 'Valen',
            'birthdate' => '1995-01-01',
            'birthplace' => 'South Korea',
            'sex' => 'Female',
            'civil_status' => 'Married',
            'height' => 164.2,
            'weight' => 63.5,
            'blood_type' => 'O',
            'application_id' => null,
            'is_latest' => 1,
            'version' => 2,
        ]);

        ApplicantProfile::create([
            'user_id' => User::where('email','press-user2@proton.me')->first()->id,
            'first_name' => 'Damien',
            'middle_name' => 'P',
            'last_name' => 'Cole',
            'birthdate' => '1992-05-23',
            'birthplace' => 'Germany',
            'sex' => 'Male',
            'civil_status' => 'Married',
            'height' => 175.8,
            'weight' => 65.5,
            'blood_type' => 'B+',
            'application_id' => null,
            'is_latest' => 1,
            'version' => 2,
        ]);
        
    }
}
