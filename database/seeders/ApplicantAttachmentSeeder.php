<?php

namespace Database\Seeders;

use App\Models\ApplicantAttachment;
use App\Models\User;
use Illuminate\Database\Seeder;

class ApplicantAttachmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ApplicantAttachment::create([
            'user_id' => User::where('email','press-user1@protonmail.com')->first()->id,
            'type' => 'Application Letter',
            'model' => 'applicationLetter',    
            'path' => 'application-letter/test1.pdf',
            'filename' => 'test1.pdf',
            'application_id' => 1,
            'is_latest' => 0,
            'version' => 1,
        ]);

        ApplicantAttachment::create([
            'user_id' => User::where('email','press-user1@protonmail.com')->first()->id,
            'type' => 'Passport Photo',
            'model' => 'passportPhoto',   
            'path' => 'passport-photo/test2.pdf',
            'filename' => 'test2.pdf',
            'application_id' => 1,
            'is_latest' => 0,
            'version' => 1,
        ]);

        ApplicantAttachment::create([
            'user_id' => User::where('email','press-user1@protonmail.com')->first()->id,
            'type' => 'Notarized PDS',
            'model' => 'notarizedPDS',    
            'path' => 'pds/test3.pdf',
            'filename' => 'test3.pdf',
            'application_id' => 1,
            'is_latest' => 0,
            'version' => 1,
        ]);

        ApplicantAttachment::create([
            'user_id' => User::where('email','press-user1@protonmail.com')->first()->id,
            'type' => 'Work Experience Sheet',
            'model' => 'workExperienceSheet',  
            'path' => 'work-experience/test4.pdf',
            'filename' => 'test4.pdf',
            'application_id' => 1,
            'is_latest' => 0,
            'version' => 1,
        ]);

        ApplicantAttachment::create([
            'user_id' => User::where('email','press-user1@protonmail.com')->first()->id,
            'type' => 'Performance Rating',
            'model' => 'performanceRating',   
            'path' => 'performance-rating/test5.pdf',
            'filename' => 'test5.pdf',
            'application_id' => 1,
            'is_latest' => 0,
            'version' => 1,
        ]);

        ApplicantAttachment::create([
            'user_id' => User::where('email','press-user1@protonmail.com')->first()->id,
            'type' => 'Diploma / Transcript of Records',
            'model' => 'diploma',    
            'path' => 'diploma/test6.pdf',
            'filename' => 'test6.pdf',
            'application_id' => 1,
            'is_latest' => 0,
            'version' => 1,
        ]);

        // latest version
        ApplicantAttachment::create([
            'user_id' => User::where('email','press-user1@protonmail.com')->first()->id,
            'type' => 'Application Letter',
            'model' => 'applicationLetter', 
            'path' => 'application-letter/test1.pdf',
            'filename' => 'test1.pdf',
            'application_id' => null,
            'is_latest' => 1,
            'version' => 2,
        ]);

        ApplicantAttachment::create([
            'user_id' => User::where('email','press-user1@protonmail.com')->first()->id,
            'type' => 'Passport Photo',
            'model' => 'passportPhoto',   
            'path' => 'passport-photo/test2.pdf',
            'filename' => 'test2.pdf',
            'application_id' => null,
            'is_latest' => 1,
            'version' => 2,
        ]);

        ApplicantAttachment::create([
            'user_id' => User::where('email','press-user1@protonmail.com')->first()->id,
            'type' => 'Notarized PDS',
            'model' => 'notarizedPDS',    
            'path' => 'pds/test3.pdf',
            'filename' => 'test3.pdf',
            'application_id' => null,
            'is_latest' => 1,
            'version' => 2,
        ]);

        ApplicantAttachment::create([
            'user_id' => User::where('email','press-user1@protonmail.com')->first()->id,
            'type' => 'Work Experience Sheet',
            'model' => 'workExperienceSheet', 
            'path' => 'work-experience/test4.pdf',
            'filename' => 'test4.pdf',
            'application_id' => null,
            'is_latest' => 1,
            'version' => 2,
        ]);

        ApplicantAttachment::create([
            'user_id' => User::where('email','press-user1@protonmail.com')->first()->id,
            'type' => 'Performance Rating',
            'model' => 'performanceRating',  
            'path' => 'performance-rating/test5.pdf',
            'filename' => 'test5.pdf',
            'application_id' => null,
            'is_latest' => 1,
            'version' => 2,
        ]);

        ApplicantAttachment::create([
            'user_id' => User::where('email','press-user1@protonmail.com')->first()->id,
            'type' => 'Certificate of Eligibility',
            'model' => 'eligibilityCert',  
            'path' => 'eligibility-certificate/test6.pdf',
            'filename' => 'test6.pdf',
            'application_id' => null,
            'is_latest' => 1,
            'version' => 2,
        ]);

        ApplicantAttachment::create([
            'user_id' => User::where('email','press-user1@protonmail.com')->first()->id,
            'type' => 'Training Certificates',
            'model' => 'trainingCertificate',
            'path' => 'training-certificate/test7.pdf',
            'filename' => 'test7.pdf',
            'application_id' => null,
            'is_latest' => 1,
            'version' => 2,
        ]);

        ApplicantAttachment::create([
            'user_id' => User::where('email','press-user1@protonmail.com')->first()->id,
            'type' => 'Others',
            'model' => 'others',    
            'path' => 'others/test8.pdf',
            'filename' => 'test8.pdf',
            'application_id' => null,
            'is_latest' => 1,
            'version' => 2,
        ]);

    }
}
