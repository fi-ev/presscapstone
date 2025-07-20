<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListCity extends Model
{
    public function province()
    {
        return $this->belongsTo(ListProvince::class, 'province_code', 'code'); 
    }
}
