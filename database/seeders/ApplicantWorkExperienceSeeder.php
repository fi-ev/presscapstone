<?php

namespace Database\Seeders;

use App\Models\ApplicantWorkExperience;
use App\Models\User;
use Illuminate\Database\Seeder;

class ApplicantWorkExperienceSeeder extends Seeder
{
    public function run(): void
    {
        ApplicantWorkExperience::create([
            'user_id' => User::where('email','press-user1@protonmail.com')->first()->id,
            'start_date' => '2021-04-27',
            'end_date' => '2022-01-03',
            'position' => 'Intern',
            'company' => 'Q Company',
            'monthly_salary' => 5000.00,
            'salary_grade' => 25,
            'appointment_status' => 'Temporary',
            'is_govt_service' => 0,
            'application_id' => 1,
            'is_latest' => 0,
            'version' => 1,        
        ]);

        ApplicantWorkExperience::create([
            'user_id' => User::where('email','press-user2@proton.me')->first()->id,
            'start_date' => '2020-01-25',
            'end_date' => '2024-05-22',
            'position' => 'Sales Manager',
            'company' => 'Q Company',
            'monthly_salary' => 45000.00,
            'salary_grade' => 24,
            'appointment_status' => 'Permanent',
            'is_govt_service' => 0,
            'application_id' => 2,
            'is_latest' => 0,
            'version' => 1, 
        ]);


        // latest version

        ApplicantWorkExperience::create([
            'user_id' => User::where('email','press-user1@protonmail.com')->first()->id,
            'start_date' => '2021-04-27',
            'end_date' => '2022-01-03',
            'position' => 'Intern',
            'company' => 'Q Company',
            'monthly_salary' => 5000.00,
            'salary_grade' => 25,
            'appointment_status' => 'Temporary',
            'is_govt_service' => 0,
            'application_id' => null,
            'is_latest' => 1,
            'version' => 2,        
        ]);

        ApplicantWorkExperience::create([
            'user_id' => User::where('email','press-user2@proton.me')->first()->id,
            'start_date' => '2020-01-25',
            'end_date' => '2024-05-22',
            'position' => 'Sales Manager',
            'company' => 'Q Company',
            'monthly_salary' => 45000.00,
            'salary_grade' => 24,
            'appointment_status' => 'Permanent',
            'is_govt_service' => 0,
            'application_id' => null,
            'is_latest' => 1,
            'version' => 2, 
        ]);
    }
}
