<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\ApplicantProfile;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CreateUserProfile implements ShouldQueue
{
    use Queueable, InteractsWithQueue, SerializesModels;

    protected $user;
    protected $input;

    /**
     * Create a new job instance.
     */
    public function __construct(User $user, array $input)
    {
        $this->user = $user;
        $this->input = $input;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        ApplicantProfile::insert([
            'user_id' => $this->user->id,
            'first_name' => $this->input['first_name'],
            'last_name' => $this->input['last_name'],
            'email' => $this->input['email'],
            'mobile_no' => $this->input['mobile_no'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
