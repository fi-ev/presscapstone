<?php

namespace Database\Seeders;

use App\Models\TypeEligibility;
use Illuminate\Database\Seeder;

class TypeEligibilitySeeder extends Seeder
{
    public function run(): void
    {

        TypeEligibility::create([
            'name' => 'Bar/Board Eligibility (RA 1080)',
        ]);

        TypeEligibility::create([
            'name' => 'Career Service Eligibility - Preference Rating (CSE-PR)',
        ]);

        
    }
}
