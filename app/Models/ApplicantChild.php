<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicantChild extends Model
{
    protected $fillable = [
        'user_id',
        'full_name',
        'birthdate',
        'application_id',
        'is_latest',
        'version',
        'created_at', 
        'updated_at'
    ];
    protected $hidden = [
        'user_id',
        'application_id',
        'is_latest',
        'version'
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

}
