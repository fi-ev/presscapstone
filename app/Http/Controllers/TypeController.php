<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::user()->isHR()) abort(403);

        $activeTab = $request->get('activeTab', 'tab1');
        
        return view('hr.types.index', [
            'activeTab' => $activeTab]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
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
