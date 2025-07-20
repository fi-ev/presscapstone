<?php

namespace Database\Seeders;

use App\Models\TypeCompetency;
use Illuminate\Database\Seeder;

class TypeCompetencySeeder extends Seeder
{
    public function run(): void
    {

        TypeCompetency::create([
            'name' => 'Officia excepteur qui exercitation id qui Lorem tempor incididunt.',
        ]);

        TypeCompetency::create([
            'name' => 'Lorem cupidatat eiusmod sit amet proident labore.',
        ]);

        
    }
}
