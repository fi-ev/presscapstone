<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicantEducation extends Model
{
    protected $table = 'applicant_educations';
    protected $fillable = [
        'user_id',
        'level',
        'school_name',
        'degree',
        'start_date',
        'end_date',
        'units_earned',
        'year_graduated',
        'honors',
        'application_id',
        'is_latest',
        'version'
    ];
    protected $hidden = [
        'user_id',
        'application_id',
        'is_latest',
        'version',
        'created_at', 
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    public function min_education_info()
    {
        if ($this->level == 'College' && $this->year_graduated) {
            return "College: {$this->school_name}, Degree: {$this->degree}";
        }

        if ($this->level == 'High_School') {
            return "High School: {$this->school_name}";
        }

        return null;
    }

    public function addtl_education_info()
    {

        if ($this->level == 'Graduate Studies' && $this->year_graduated) {
            return "Graduate Studies: {$this->school_name}, Degree: {$this->degree}";
        }

        if ($this->level == 'Graduate Studies' && !$this->year_graduated) {
            return "Graduate Studies: {$this->school_name}, Degree: {$this->degree}, Ongoing";
        }

        return null;
    }

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

}
