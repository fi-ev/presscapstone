<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vacancy extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'position_id',
        'vacancy_code',
        'remarks',
        'status',
        'posting_date',
        'closing_date',
        'filepath',
        'filename',
        'url'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    protected $casts = [
        'posting_date' => 'date',
        'closing_date' => 'date',
    ];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function scopeSearch($query, $search)
    {
        
        $query->whereHas('position', function ($query) use ($search) {
            $query->where('title', 'like', "%{$search}%");
        });
        
        /*
        $query->whereHas('position', function ($subQuery) use ($search) {
            $subQuery->where('title', 'like', "%{$search}%");
        });
        */
    }
}
