<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Vacancy;
use Carbon\Carbon;
use Exception;

class VacancyController extends Controller
{
    
    public function index()
    {   
        if (!Auth::user()->isHR()) abort(403);

        return view('hr.vacancies.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($encodedId)
    {
        if (!Auth::user()->isHR()) abort(403);

        $id = hashid_decode($encodedId)[0] ?? null;

        $vacancy = Vacancy::with('position',
                                            'applications',
                                            'applications.applicant_profile',   
                                            'applications.attachment'
                    )->where('id',$id)
                    ->first();

        $applicants = $vacancy->applications()->paginate(5);

        $now = Carbon::now()->format('Y-m-d');

        return view('hr.vacancies.show' , [
                    'vacancy' => $vacancy,
                    'applicants' => $applicants,
                    'now' => $now,
                    ]);
        
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function card()
    {
        if (!Auth::user()->isApplicant()) abort(403);

        return view('applicant.vacancy.card');
    }

    public function matrix($encodedId)
    {
        if (!Auth::user()->isHR()) abort(403);

        $id = hashid_decode($encodedId)[0] ?? null;
        $vacancy = Vacancy::with('position')->where('id', $id)->first();

        return view('hr.qualification-matrix.index', [
            'vacancyId' => $id,
            'position' => $vacancy->position->title
        ]);
    }


    public function notices($encodedId = null)
    {
        if (!Auth::user()->isHR()) abort(403);

        $id = hashid_decode($encodedId)[0] ?? null;

        $vacancy = Vacancy::with('position')->where('id', $id)->first();
        $position = $vacancy->position->title;

        return view('hr.notices.index', [
                                'vacancyId' => $id,
                                'position' => $position,
        ]);
    }
    
}
