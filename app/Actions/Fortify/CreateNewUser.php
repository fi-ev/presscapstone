<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\ApplicantProfile;
use App\Models\ApplicantFamily;
use App\Models\ApplicantQuestion;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile_no' => ['required', 'regex:/^9\d{9}$/', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        try 
        {
            $user = '';
            
            DB::transaction(function () use ($input, &$user) {
                $user = User::create([
                    'first_name' => $input['first_name'],
                    'last_name' => $input['last_name'],
                    'email' => $input['email'],
                    'mobile_no' => '+63' . $input['mobile_no'],
                    'password' => Hash::make($input['password'])
                ]);
                $userId = $user->id;

                // set role
                $user->assignRole('applicant');
                
                // set profile
                ApplicantProfile::create([
                    'user_id' => $userId,
                    'first_name' => $input['first_name'],
                    'last_name' => $input['last_name'],
                    'email' => $input['email'],
                    'mobile_no' => '+63' . $input['mobile_no'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                // set family
                ApplicantFamily::create([
                    'user_id' => $userId,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                // set questions
                ApplicantQuestion::create([
                    'user_id' => $userId,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            });

            return $user;

        } catch (Exception $e) { 
            Log::error('User registration failed: ' . $e->getMessage());
            
            throw ValidationException::withMessages([
                'error' => ['Failed to create a new user. Please try again.']
            ]);
        }
    }
}
