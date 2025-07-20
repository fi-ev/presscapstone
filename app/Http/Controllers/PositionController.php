<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Position;
use App\Models\Vacancy;
use Exception;

class PositionController extends Controller
{
    public function index()
    {
        if (!Auth::user()->isHR()) abort(403);

        return view('hr.positions.index'); 
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

        $position = Position::where('id',$id)
                    ->first();

        return view('hr.positions.show' , [
                    'position' => $position,
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
