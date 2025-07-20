<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasRoles;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mobile_no',
        'password',
        'profile_photo_path',
        'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
        'sms_two_factor_secret',
        'two_factor_method',
        'profile_photo_path',
        'email_verified_at',
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];
    

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_path',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    
    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    public function isHR()
    {
        return $this->hasRole('hr');
    }

    public function isApplicant()
    {
        return $this->hasRole('applicant');
    }
    public function applicant_profile()
    {
        return $this->hasOne(ApplicantProfile::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function getFullNameAttribute()
    {
        return "{$this->last_name}, {$this->first_name} {$this->middle_initial}";
    }

    public function getFullNameSimpleAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function defaultProfilePhotoUrl()
    {
        $name = $this->first_name . " " . $this->last_name;
        $initials = trim(collect(explode(' ', $name))->map(fn($segment) => mb_substr($segment, 0, 1))->join(''));

        return 'https://ui-avatars.com/api/?name=' . urlencode($initials) . '&color=2C5282&background=FFFFFF&bold=true';
    }

    public function hasEnabledTwoFactorAuthentication()
    {
        $hasApp2FA = !is_null($this->two_factor_secret) && !is_null($this->two_factor_confirmed_at);
        $hasSMS2FA = !is_null($this->sms_two_factor_secret) && !is_null($this->mobile_no);

        return $hasApp2FA || $hasSMS2FA;
    }
    
    public function getMobileNoAttribute($value)
    {
        return Str::replaceFirst('+63', '', $value);
    }
    
    public function scopeSearch($query, $search)
    {
        $query->where('first_name', 'like', "%{$search} %")
            ->orWhere('last_name', 'like', "%{$search} %")
            ->orWhere('email', 'like', "%{$search}%");
    }

}
