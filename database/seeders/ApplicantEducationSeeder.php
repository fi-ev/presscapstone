<?php

namespace Database\Seeders;

use App\Models\ApplicantEducation;
use App\Models\User;
use Illuminate\Database\Seeder;

class ApplicantEducationSeeder extends Seeder
{
    public function run(): void
    {
        ApplicantEducation::create([
            'user_id' => User::where('email','press-user1@protonmail.com')->first()->id,
            'level' => 'College',
            'school_name' => 'Westbrook University',
            'degree' => 'BS Robotics Engineering',
            'start_date' => '2015-04-03',
            'end_date' => '2019-03-04',
            'units_earned' => 30,
            'year_graduated' => 2019,        
            'honors' => 'None',
            'application_id' => 1,
            'is_latest' => 0,
            'version' => 1,        
        ]);

        ApplicantEducation::create([
            'user_id' => User::where('email','press-user2@proton.me')->first()->id,
            'level' => 'College',
            'school_name' => 'The Oxford Grove College',
            'degree' => 'BS Environmental Science',
            'start_date' => '2015-04-03',
            'end_date' => '2020-03-04',
            'units_earned' => 35,
            'year_graduated' => 2020,        
            'honors' => 'Magna Cum Laude',    
            'application_id' => 2,
            'is_latest' => 0,
            'version' => 1,    
        ]);

        // latest version
        ApplicantEducation::create([
            'user_id' => User::where('email','press-user1@protonmail.com')->first()->id,
            'school_name' => 'Westbrook University',
            'degree' => 'BS Robotics Engineering',
            'start_date' => '2015-04-03',
            'end_date' => '2019-03-04',
            'units_earned' => 30,
            'year_graduated' => 2019,        
            'honors' => 'None',
            'application_id' => null,
            'is_latest' => 1,
            'version' => 2,        
        ]);

        ApplicantEducation::create([
            'user_id' => User::where('email','press-user2@proton.me')->first()->id,
            'school_name' => 'The Oxford Grove College',
            'degree' => 'BS Environmental Science',
            'start_date' => '2015-04-03',
            'end_date' => '2020-03-04',
            'units_earned' => 35,
            'year_graduated' => 2020,        
            'honors' => 'Magna Cum Laude',    
            'application_id' => null,
            'is_latest' => 1,
            'version' => 2,    
        ]);


    }
}
