<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ApplicantController extends Controller
{
    public function index()
    {
        if (!Auth::user()->isHR()) abort(403);
       
        return view('hr.applicants.index');

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

        $applicant = User::with('applications.vacancy.position')
                        ->where('id',$id)
                        ->first();

        return view('hr.applicants.show' , [
                    'applicant' => $applicant,
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
}
