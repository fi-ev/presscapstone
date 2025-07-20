<?php

namespace Database\Seeders;

use App\Models\TypeTraining;
use Illuminate\Database\Seeder;

class TypeTrainingSeeder extends Seeder
{
    public function run(): void
    {

        TypeTraining::create([
            'name' => '40 Hours of Training',
        ]);

        TypeTraining::create([
            'name' => '120 Hours of Training',
        ]);

        
    }
}
