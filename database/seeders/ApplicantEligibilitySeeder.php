<?php

namespace Database\Seeders;

use App\Models\ApplicantEligibility;
use App\Models\User;
use Illuminate\Database\Seeder;

class ApplicantEligibilitySeeder extends Seeder
{
    public function run(): void
    {
        ApplicantEligibility::create([
            'user_id' => User::where('email','press-user1@protonmail.com')->first()->id,
            'type_eligibility_id' => 2,
            'rating' => 89.1,
            'date_taken' => '2020-07-08',
            'place_taken' => 'Davao City',
            'license_no' => 'AWCYZU15KF',
            'validity' => '2050-01-01',
            'application_id' => 1,
            'is_latest' => 0,
            'version' => 1,     
        ]);

        ApplicantEligibility::create([
            'user_id' => User::where('email','press-user2@proton.me')->first()->id,
            'type_eligibility_id' => 1,
            'rating' => 88.1,
            'date_taken' => '2021-07-08',
            'place_taken' => 'Cebu City',
            'license_no' => 'PRC2-422435',
            'validity' => '2023-01-01',
            'application_id' => 2,
            'is_latest' => 0,
            'version' => 1,    
        ]);

        // latest version

        ApplicantEligibility::create([
            'user_id' => User::where('email','press-user1@protonmail.com')->first()->id,
            'type_eligibility_id' => 2,
            'rating' => 89.1,
            'date_taken' => '2020-07-08',
            'place_taken' => 'Davao City',
            'license_no' => 'AWCYZU15KF',
            'validity' => '2050-01-01',
            'application_id' => null,
            'is_latest' => 1,
            'version' => 2,     
        ]);

        ApplicantEligibility::create([
            'user_id' => User::where('email','press-user2@proton.me')->first()->id,
            'type_eligibility_id' => 1,
            'rating' => 88.1,
            'date_taken' => '2021-07-08',
            'place_taken' => 'Cebu City',
            'license_no' => 'PRC2-422435',
            'validity' => '2023-01-01',
            'application_id' => null,
            'is_latest' => 1,
            'version' => 2,    
        ]);
    }
}
