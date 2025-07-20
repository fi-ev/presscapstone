<?php

namespace Database\Seeders;

use App\Models\ApplicantTraining;
use App\Models\User;
use Illuminate\Database\Seeder;

class ApplicantTrainingSeeder extends Seeder
{
    public function run(): void
    {
        ApplicantTraining::create([
            'user_id' => User::where('email','press-user1@protonmail.com')->first()->id,
            'activity_title' => 'Foundations of Robotics',
            'organizer' => 'AMP',
            'start_date' => '2024-07-08',
            'end_date' => '2024-07-10',
            'hours_no' => 24,
            'application_id' => 1,
            'is_latest' => 0,
            'version' => 1,        
        ]);

        ApplicantTraining::create([
            'user_id' => User::where('email','press-user2@proton.me')->first()->id,
            'activity_title' => 'Training on Sustainability',
            'organizer' => 'Green Solutions',
            'start_date' => '2023-01-14',
            'end_date' => '2023-01-15',
            'hours_no' => 16,
            'application_id' => 2,
            'is_latest' => 0,
            'version' => 1,        
        ]);

        ApplicantTraining::create([
            'user_id' => User::where('email','press-user2@proton.me')->first()->id,
            'activity_title' => 'Training on GIS',
            'organizer' => 'ESRI',
            'start_date' => '2022-04-02',
            'end_date' => '2022-04-02',
            'hours_no' => 8,
            'application_id' => 2,
            'is_latest' => 0,
            'version' => 1,        
        ]);

        
        // latest version

        ApplicantTraining::create([
            'user_id' => User::where('email','press-user1@protonmail.com')->first()->id,
            'activity_title' => 'Foundations of Robotics',
            'organizer' => 'AMP',
            'start_date' => '2024-07-08',
            'end_date' => '2024-07-10',
            'hours_no' => 24,
            'application_id' => null,
            'is_latest' => 1,
            'version' => 2,         
        ]);

        ApplicantTraining::create([
            'user_id' => User::where('email','press-user2@proton.me')->first()->id,
            'activity_title' => 'Training on Sustainability',
            'organizer' => 'Green Solutions',
            'start_date' => '2023-01-14',
            'end_date' => '2023-01-15',
            'hours_no' => 16,
            'application_id' => null,
            'is_latest' => 1,
            'version' => 2,        
        ]);

        ApplicantTraining::create([
            'user_id' => User::where('email','press-user2@proton.me')->first()->id,
            'activity_title' => 'Training on GIS',
            'organizer' => 'ESRI',
            'start_date' => '2022-04-02',
            'end_date' => '2022-04-02',
            'hours_no' => 8,
            'application_id' => null,
            'is_latest' => 1,
            'version' => 2,        
        ]);


    }
}
