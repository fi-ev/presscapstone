<?php

namespace Database\Seeders;

use App\Models\ApplicantFamily;
use App\Models\User;
use Illuminate\Database\Seeder;

class ApplicantFamilySeeder extends Seeder
{
    public function run(): void
    {
        ApplicantFamily::create([
            'user_id' => User::where('email','press-user1@protonmail.com')->first()->id,
            'spouse_first_name' => 'Theo',
            'spouse_middle_name' => 'Lancaster',
            'spouse_last_name' => 'J',
            'spouse_name_ext' => 'II',
            'spouse_occupation' => 'CEO',
            'spouse_work_employer' => 'TLJ Corp',
            'spouse_work_address' => 'PH',
            'spouse_work_phone' => '777',
            'father_first_name' => 'Harold',
            'father_middle_name' => 'Griffin',
            'father_last_name' => 'R',
            'father_name_ext' => 'N/A',
            'mother_first_name' => 'Florence',
            'mother_maiden_middle_name' => 'Keats',
            'mother_maiden_last_name' => 'N',
            'application_id' => 1,
            'is_latest' => 0,
            'version' => 1,
        ]);

        ApplicantFamily::create([
            'user_id' => User::where('email','press-user2@proton.me')->first()->id,
            'spouse_first_name' => 'Seraphina',
            'spouse_middle_name' => 'Locke',
            'spouse_last_name' => 'F',
            'spouse_name_ext' => 'N/A',
            'spouse_occupation' => 'Flight Attendant',
            'spouse_work_employer' => 'Emirates',
            'spouse_work_address' => 'PH',
            'spouse_work_phone' => '888',
            'father_first_name' => 'Augustus ',
            'father_middle_name' => 'A',
            'father_last_name' => 'Steele',
            'father_name_ext' => 'I',
            'mother_first_name' => 'Vivienne',
            'mother_maiden_middle_name' => 'A',
            'mother_maiden_last_name' => 'Fairmont',
            'application_id' => 2,
            'is_latest' => 0,
            'version' => 1,
        ]);

        // latest version
        
        ApplicantFamily::create([
            'user_id' => User::where('email','press-user1@protonmail.com')->first()->id,
            'spouse_first_name' => 'Theo',
            'spouse_middle_name' => 'Lancaster',
            'spouse_last_name' => 'J',
            'spouse_name_ext' => 'II',
            'spouse_occupation' => 'CEO',
            'spouse_work_employer' => 'TLJ Corp',
            'spouse_work_address' => 'PH',
            'spouse_work_phone' => '777',
            'father_first_name' => 'Harold',
            'father_middle_name' => 'Griffin',
            'father_last_name' => 'R',
            'father_name_ext' => 'N/A',
            'mother_first_name' => 'Florence',
            'mother_maiden_middle_name' => 'Keats',
            'mother_maiden_last_name' => 'N',
            'application_id' => null,
            'is_latest' => 1,
            'version' => 2,
        ]);

        ApplicantFamily::create([
            'user_id' => User::where('email','press-user2@proton.me')->first()->id,
            'spouse_first_name' => 'Seraphina',
            'spouse_middle_name' => 'Locke',
            'spouse_last_name' => 'F',
            'spouse_name_ext' => 'N/A',
            'spouse_occupation' => 'Flight Attendant',
            'spouse_work_employer' => 'Emirates',
            'spouse_work_address' => 'PH',
            'spouse_work_phone' => '888',
            'father_first_name' => 'Augustus ',
            'father_middle_name' => 'A',
            'father_last_name' => 'Steele',
            'father_name_ext' => 'I',
            'mother_first_name' => 'Vivienne',
            'mother_maiden_middle_name' => 'A',
            'mother_maiden_last_name' => 'Fairmont',
            'application_id' => null,
            'is_latest' => 1,
            'version' => 2,
        ]);
    }
}
