<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeTraining extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function scopeSearch($query, $search)
    {
        $query->where('name', 'like', "%{$search}%");
    }

}
