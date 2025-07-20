<?php

namespace Database\Seeders;

use App\Models\Template;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    public function run(): void
    {
        Template::create([
            'type' => 'Rejection',
            'message' => 'Thank you for your interest in the [position] position at Stark Industries. After careful consideration, we\'ve decided to move forward with another candidate.
[newline][newline]
We appreciate the time you took to apply and interview with us. While we won\'t be proceeding with your application, we were impressed with your qualifications and encourage you to apply for future opportunities.
[newline][newline]
Wishing you the best in your job search and career.
[newline][newline]
Sincerely,[newline]
Iron Man[newline]
CEO',
        ]);

        Template::create([
            'type' => 'Acceptance',
            'message' => 'We are pleased to inform you that you have been selected as the successful candidate for the [position]. Your qualifications and achievements greatly impressed our selection committee, and we are confident that you will make valuable contributions to our team. 
[newline][newline]
In the coming days, we will provide further information regarding the next steps. Should you have any questions in the meantime, please do not hesitate to reach out to us at 123-4567.
[newline][newline]
Once again, congratulations on this accomplishment. We look forward to welcoming you to Stark Industries.
[newline][newline]
Sincerely,[newline]
Iron Man[newline]
CEO',
        ]);

        Template::create([
            'type' => 'Invitation',
            'message' => 'We are pleased to inform you that, based on your application, we would like to invite you to an interview for the position of [position] at Stark Industries. The interview will be held on December 18, 2024 at 3:00 PM, and it will take place at Stark Technologies HQ, Davao City.
[newline][newline]
Please confirm your availability by November 30, 2024. If you are unable to attend at the scheduled time, kindly let us know, and we will do our best to accommodate an alternative time. We look forward to speaking with you and learning more about your qualifications. Should you have any questions or need further information, please do not hesitate to contact us at 123-4567.
[newline][newline]
Sincerely,[newline]
Iron Man[newline]
CEO',
        ]);
    }
}
