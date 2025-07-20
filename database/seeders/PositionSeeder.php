<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    public function run(): void
    {

        Position::create([
            'title' => 'Project Officer V',
            'assignment_place' => 'Regional Office',
            'employment_type' => 'COS',
            'plantilla_no'=> null,
            'salary_grade' => 10,
            'monthly_salary' => '30756.45',
            'description' => 'Est ex quis nulla enim dolor velit exercitation deserunt laborum consectetur excepteur laborum irure officia. Dolore sunt sint labore aliqua labore fugiat aute elit laboris sit sunt. Laboris dolor reprehenderit aliqua incididunt do minim nostrud fugiat ea consequat labore ut ex.',
            'education' => 'BS Graduate',
            'work_experience' => 'Related to Project Management',
            'trainings' => "[\"1\"]",
            'competencies' => "[\"1\",\"2\"]",
            'eligibilities' => "[\"2\"]",
        ]);

        Position::create([
            'title' => 'Position A',
            'assignment_place' => 'Davao City',
            'employment_type' => 'Plantilla',
            'plantilla_no' => 'A111',
            'salary_grade' => 12,
            'monthly_salary' => '100000.00',
            'description' => 'Velit enim ex velit mollit eu amet tempor. Reprehenderit incididunt anim ipsum id fugiat id sit ad sunt sunt eu nostrud. Ad voluptate adipisicing proident eu incididunt deserunt reprehenderit laborum et aute deserunt dolor in.',
            'education' => 'MS Graduate',
            'work_experience' => 'Some Work Experience',
            'trainings' => "[\"2\"]",
            'competencies' => "[\"1\"]",
            'eligibilities' => "[\"1\"]",
        ]);

        Position::create([
            'title' => 'Position B',
            'assignment_place' => 'Cebu City',
            'employment_type' => 'COS',
            'plantilla_no' => null,
            'salary_grade' => 14,
            'monthly_salary' => '200000.00',
            'description' => 'Sit eiusmod laborum ullamco irure esse esse nulla eiusmod voluptate laboris commodo. Reprehenderit cupidatat fugiat nostrud occaecat mollit eiusmod est ea ut pariatur labore consectetur cupidatat quis. Deserunt quis qui deserunt amet culpa dolor veniam est. Laboris pariatur incididunt non minim voluptate amet aliqua mollit ullamco. Anim officia laboris nisi nisi nulla minim. Sunt quis magna incididunt elit tempor.',
            'education' => 'PhD Graduate',
            'work_experience' => 'Some Work Experience',
            'trainings' => "[\"1\"]",
            'competencies' => "[\"2\"]",
            'eligibilities' => "[\"1\",\"2\"]",
        ]);

        
    }
}
