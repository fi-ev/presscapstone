<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicantWorkExperience extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'start_date',
        'end_date',
        'position',
        'company',
        'monthly_salary',
        'salary_grade',
        'appointment_status',
        'is_govt_service',
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

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

}
