<?php

use Database\Seeders\ApplicantChildSeeder;
use Database\Seeders\ApplicantEducationSeeder;
use Database\Seeders\ApplicantEligibilitySeeder;
use Database\Seeders\ApplicantFamilySeeder;
use Database\Seeders\ApplicantProfileSeeder;
use Database\Seeders\ApplicantTrainingSeeder;
use Database\Seeders\ApplicantVolunteerWorkSeeder;
use Database\Seeders\ApplicantWorkExperienceSeeder;
use Database\Seeders\ApplicantAttachmentSeeder;
use Database\Seeders\ApplicantQuestionSeeder;
use Database\Seeders\ApplicationSeeder;
use Database\Seeders\PositionSeeder;
use Database\Seeders\TemplateSeeder;
use Database\Seeders\TypeCompetencySeeder;
use Database\Seeders\TypeEligibilitySeeder;
use Database\Seeders\TypeTrainingSeeder;
use Database\Seeders\VacancySeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\ListCountrySeeder;
use Database\Seeders\ListRegionSeeder;
use Database\Seeders\ListProvinceSeeder;
use Database\Seeders\ListCitySeeder;
use Database\Seeders\ListBarangaySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            TemplateSeeder::class,
            
            // include these for testing
            TypeEligibilitySeeder::class,
            TypeCompetencySeeder::class,
            TypeTrainingSeeder::class,
            PositionSeeder::class,
            VacancySeeder::class,
            ApplicationSeeder::class,
            ApplicantProfileSeeder::class,
            ApplicantFamilySeeder::class,
            ApplicantChildSeeder::class,
            ApplicantEducationSeeder::class,
            ApplicantWorkExperienceSeeder::class,
            ApplicantEligibilitySeeder::class,
            ApplicantTrainingSeeder::class,
            ApplicantVolunteerWorkSeeder::class,
            ApplicantAttachmentSeeder::class,
            ApplicantQuestionSeeder::class,
            ListCountrySeeder::class,
            ListRegionSeeder::class,
            ListProvinceSeeder::class,
            ListCitySeeder::class,
            ListBarangaySeeder::class,
        ]);
    }
}
