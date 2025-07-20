<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicantEligibility extends Model
{
    protected $fillable = [
        'user_id',
        'type_eligibility_id',
        'rating',
        'date_taken',
        'place_taken',
        'license_no',
        'validity',
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

    public function type_eligibility()
    {
        return $this->belongsTo(TypeEligibility::class);
    }

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

}
