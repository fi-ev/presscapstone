<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicantFamily extends Model
{
    protected $fillable = [
        'user_id',
        'spouse_first_name',
        'spouse_middle_name',
        'spouse_last_name',
        'spouse_name_ext',
        'spouse_occupation',
        'spouse_work_employer',
        'spouse_work_address',
        'spouse_work_phone',
        'father_first_name',
        'father_middle_name',
        'father_last_name',
        'father_name_ext',
        'mother_first_name',
        'mother_maiden_middle_name',
        'mother_maiden_last_name',
        'mother_name_ext',
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

}
