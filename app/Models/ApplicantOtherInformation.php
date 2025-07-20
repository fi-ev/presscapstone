<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicantOtherInformation extends Model
{
    protected $table = 'applicant_other_information';
    protected $fillable = [
        'user_id',
        'type',
        'information',
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

    public function recognition_info()
    {
        if ($this->type == 'Recognitions') {
            return "{$this->information}";
        }

        return null;
    }

    public function getPreviousVersion()
    {
        return ApplicantOtherInformation::where('id', $this->id)
            ->where('version', $this->version - 1)
            ->first();
    }

}
