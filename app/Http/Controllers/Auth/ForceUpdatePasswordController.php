<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password; 
use App\Http\Controllers\Controller;
use Exception;

class ForceUpdatePasswordController extends Controller
{
    
    public function index()
    {
        return view('auth.force-change-password');
    }

    public function update(Request $request)
    {
        try{
            $request->validate([
                'current_password' => 'required',
                'password' => $this->passwordRules(),
            ]);

            $user = Auth::user();

            if (!Hash::check($request->current_password, $user->password)) {
                session()->flash('message', 'Incorrect current password');
                session()->flash('message-type', 'error');
                session()->flash('action-type', 'update');
            }

            $user->password = Hash::make($request->password);
            $user->force_password_change = false;
            $user->save();
            $user->refresh();

            session()->flash('message', 'Password successfully changed!');
            session()->flash('message-type', 'success');
            session()->flash('action-type', 'update');
            return redirect()->route('dashboard');
        } catch (Exception $e) {
            session()->flash('message', 'Password not changed.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'update');
            return redirect()->route('dashboard');
        }
    }

    protected function passwordRules(): array
    {
        return ['required', 'string', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised(), Password::default(), 'confirmed'];
    }
}
