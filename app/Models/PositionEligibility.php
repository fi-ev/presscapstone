<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PositionEligibility extends Model
{
    use SoftDeletes;
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

}
