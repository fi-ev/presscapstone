<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListProvince extends Model
{
    public function region()
    {
        return $this->belongsTo(ListRegion::class, 'region_code', 'code'); 
    }
}
