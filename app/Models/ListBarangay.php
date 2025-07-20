<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListBarangay extends Model
{
    public function city()
    {
        return $this->belongsTo(ListCity::class, 'city_code', 'code'); 
    }
}
