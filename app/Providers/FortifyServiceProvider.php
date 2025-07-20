<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        Fortify::authenticateUsing(function (Request $request) {
            $user = \App\Models\User::where(Fortify::username(), $request->{Fortify::username()})->first();
    
            if (! $user || ! \Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {
                return null;
            }
    
            if (! $user->is_active) {
                throw \Illuminate\Validation\ValidationException::withMessages([
                    Fortify::username() => __('Your account is inactive. Please contact support.'),
                ]);
            }
    
            return $user;
        });
        
        Validator::extend('password', function ($attribute, $value, $parameters, $validator) {
            return Password::min(8)
                ->mixedCase()  // uppercase and lowercase letters
                ->numbers()    // at least one number
                ->symbols()    // at least one symbol
                ->uncompromised() // checks against data breaches
                ->passes($attribute, $value);
        });

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
