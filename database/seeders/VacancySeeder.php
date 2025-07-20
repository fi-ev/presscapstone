<?php

namespace Database\Seeders;

use App\Models\Position;
use App\Models\Vacancy;
use Illuminate\Database\Seeder;

class VacancySeeder extends Seeder
{
    public function run(): void
    {

        Vacancy::create([
            'vacancy_code' => '2024-08-001',
            'position_id' => 1,
            'posting_date' => '2024-08-03',
            'closing_date'=> '2025-03-30', 
            'remarks' => 'Urgent Hiring',
            'filepath' => 'vacancies/test1.pdf',
            'filename' => 'test1.pdf'
        ]);

        Vacancy::create([
            'vacancy_code' => '2024-08-002',
            'position_id' => 2,
            'posting_date' => '2024-08-24',
            'closing_date'=> '2025-04-24',
            'remarks' => 'Plantilla',
            'filepath' => 'vacancies/test2.pdf',
            'filename' => 'test2.pdf'
        ]);

        Vacancy::create([
            'vacancy_code' => '2024-09-003',
            'position_id' => 3,
            'posting_date' => '2024-09-31',
            'closing_date'=> '2025-04-10',
            'remarks' => 'Project-based',
            'filepath' => 'vacancies/test3.pdf',
            'filename' => 'test3.pdf'
        ]);

        
    }
}
