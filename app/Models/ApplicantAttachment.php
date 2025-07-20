<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicantAttachment extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'model',
        'path',
        'filename',
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
    protected $casts = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
