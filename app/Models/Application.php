<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',        
        'vacancy_id',
        'email_type',
        'email_content',
        'emailed_at', 
        'status'
    ];
    protected $hidden = [
        'user_id',         
        'vacancy_id',
        'created_at', 
        'updated_at',
        'deleted_at'
    ];
    protected $casts = [
        'emailed_at' => 'datetime',
        'created_at' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }

    public function applicant_profile()
    {
        return $this->hasOne(ApplicantProfile::class);
    }

    public function applicant_family()
    {
        return $this->hasMany(ApplicantFamily::class);
    }

    public function applicant_child()
    {
        return $this->hasMany(ApplicantChild::class);
    }

    public function applicant_work_experience()
    {
        return $this->hasMany(ApplicantWorkExperience::class);
    }

    public function applicant_education()
    {
        return $this->hasMany(ApplicantEducation::class);
    }

    public function applicant_eligibility()
    {
        return $this->hasMany(ApplicantEligibility::class);
    }

    public function applicant_training()
    {
        return $this->hasMany(ApplicantTraining::class);
    }

    public function applicant_volunteer_work()
    {
        return $this->hasMany(ApplicantVolunteerWork::class);
    }

    public function applicant_other()
    {
        return $this->hasMany(ApplicantOtherInformation::class);
    }
    
    public function attachment()
    {
        return $this->hasMany(ApplicantAttachment::class);
    }
    
    public function email()
    {
        return $this->hasMany(Email::class);
    }

    public function scopeSearch($query, $search)
    {
        $query->where('first_name', 'like', "%{$search} %")
            ->orWhere('last_name', 'like', "%{$search} %")
            ->orWhere('email', 'like', "%{$search} %");
    }
    
}
