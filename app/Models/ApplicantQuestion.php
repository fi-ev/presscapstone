<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicantQuestion extends Model
{
    protected $fillable = [
        'user_id',
        'consanguinity_third',
        'consanguinity_fourth',
        'consanguinity_details',
        'admin_offense',
        'admin_offense_details',
        'criminal_court',
        'criminal_court_details',
        'criminal_court_filed',
        'criminal_court_status',
        'convicted_crime',
        'convicted_crime_details',
        'service_separated',
        'service_separated_details',
        'candidate',
        'candidate_details',
        'campaign',
        'campaign_details',
        'immigrant',
        'immigrant_details',
        'ip',
        'ip_details',
        'pwd',
        'pwd_details',
        'solo_parent',
        'solo_parent_details',
        'reference1_name',
        'reference1_address',
        'reference1_contact_no',
        'reference2_name',
        'reference2_address',
        'reference2_contact_no',
        'reference3_name',
        'reference3_address',
        'reference3_contact_no',
        'govt_id',
        'govt_id_no',
        'govt_id_issuance',
        'application_id',
        'is_latest',
        'version'
    ];
    protected $hidden = [
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
