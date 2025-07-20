<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'assignment_place',
        'employment_type',
        'plantilla_no',
        'salary_grade',
        'monthly_salary',
        'description',
        'education',
        'work_experience',
        'trainings',
        'competencies',
        'eligibilities'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    protected $casts = [
        'trainings' => 'array',
        'eligibilities' => 'array',
        'competencies' => 'array'
    ];

    public function vacancies()
    {
        return $this->belongsTo(Vacancy::class);
    }

    public function trainings()
    {
        return $this->belongsTo(TypeTraining::class, 'id', 'trainings.*');
    }

    public function getTrainings()
    {
        $trainings = json_decode($this->trainings, true);
        return TypeTraining::whereIn('id', $trainings)->pluck('name', 'id');
         
    }

    public function getTrainingsName()
    {
        $trainings = json_decode($this->trainings, true);
        return TypeTraining::whereIn('id', $trainings)->get()->implode('name', ', '); 
         
    }

    public function eligibilities()
    {
        return $this->belongsTo(TypeEligibility::class, 'id', 'eligibilities.*');
    }

    public function getEligibilities()
    {
        $eligibilities = json_decode($this->eligibilities, true);
        return TypeEligibility::whereIn('id', $eligibilities)->pluck('name', 'id'); 
    }

    public function getEligibilitiesName()
    {
        $eligibilities = json_decode($this->eligibilities, true);
        return TypeEligibility::whereIn('id', $eligibilities)->implode('name', ', '); 
    }

    public function competencies()
    {
        return $this->belongsTo(TypeCompetency::class, 'id', 'competencies.*');
    }

    public function getCompetencies()
    {
        $competencies = json_decode($this->competencies, true);
        return TypeCompetency::whereIn('id', $competencies)->pluck('name', 'id'); 
    }

    public function getCompetenciesName()
    {
        $competencies = json_decode($this->competencies, true);
        return TypeCompetency::whereIn('id', $competencies)->implode('name', ', '); 
    }

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
        ];
    }

    public function scopeSearch($query, $search)
    {
        $query->where('title', 'like', "%{$search}%");
    }
}
