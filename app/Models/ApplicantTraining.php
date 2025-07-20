<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicantTraining extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'activity_title',
        'start_date',
        'end_date',
        'hours_no',
        'type',
        'organizer',
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
