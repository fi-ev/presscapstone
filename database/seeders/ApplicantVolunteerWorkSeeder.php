<?php

namespace Database\Seeders;

use App\Models\ApplicantVolunteerWork;
use App\Models\User;
use Illuminate\Database\Seeder;

class ApplicantVolunteerWorkSeeder extends Seeder
{
    public function run(): void
    {
        ApplicantVolunteerWork::create([
            'user_id' => User::where('email','press-user1@protonmail.com')->first()->id,
            'organization_name' => 'XYZ',
            'organization_address' => 'Taiwan',
            'start_date' => '2022-11-12',
            'end_date' => '2022-12-12',
            'hours_no' => '240',
            'position' => 'Secretariat',
            'application_id' => 1,
            'is_latest' => 0,
            'version' => 1,        
        ]);


        // latest version

        ApplicantVolunteerWork::create([
            'user_id' => User::where('email','press-user1@protonmail.com')->first()->id,
            'organization_name' => 'XYZ',
            'organization_address' => 'Taiwan',
            'start_date' => '2022-11-12',
            'end_date' => '2022-12-12',
            'hours_no' => '240',
            'position' => 'Secretariat',
            'application_id' => null,
            'is_latest' => 1,
            'version' => 2,        
        ]);

    }
}
