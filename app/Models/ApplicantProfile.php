<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ApplicantProfile extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'name_ext',
        'birthdate',
        'birthplace',
        'sex',
        'civil_status',
        'height',
        'weight',
        'blood_type',
        'gsis_no',
        'philhealth_no',
        'pagibig_no',
        'sss_no',
        'tin_no',
        'employee_no',
        'citizenship',
        'dual_details',
        'dual_country',
        'residential_house_no',
        'residential_street',
        'residential_village',
        'residential_barangay',
        'residential_municity',
        'residential_province',
        'permanent_house_no',
        'permanent_street',
        'permanent_village',
        'permanent_barangay',
        'permanent_municity',
        'permanent_province',
        'phone_no',
        'mobile_no',
        'email',
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
    protected $casts = [
        'birthdate' => 'date'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    public function age($applicationDate)
    {
        $applicationDate = Carbon::parse($applicationDate);
        $birthdate = Carbon::parse($this->birthdate);
        $age = $birthdate->diffInYears($applicationDate);

        return floor($age);
    }

    public function getFullNameAttribute()
    {
        return trim($this->last_name . ', ' . $this->first_name . ' ' . $this->middle_name . '.');
    }

}
