<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Application;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Application::create([
            'vacancy_id' => 1,
            'user_id' => User::where('email','press-user1@protonmail.com')->first()->id,      
        ]);

        Application::create([
            'vacancy_id' => 2,
            'user_id' => User::where('email','press-user2@proton.me')->first()->id,
        ]);
    }
}
