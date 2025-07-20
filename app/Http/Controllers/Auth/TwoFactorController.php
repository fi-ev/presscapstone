<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SMS\VonageOTP;
use Illuminate\Support\Facades\Auth;

class TwoFactorController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        if (!$user->mobile_no) {
            return response()->json(['message' => 'No phone number registered.'], 400);
        }
        $maskedPhone = '******' . substr($user->mobile_no, -4);

        return view('auth.two-factor-sms-challenge', [
            'maskedPhone' => $maskedPhone
        ]);
    }

    public function sendCode(Request $request, VonageOTP $VonageOTP)
    {
        $user = Auth::user();
        
        if (!$user->mobile_no) {
            return response()->json(['message' => 'No phone number registered.'], 400);
        }

        $code = rand(100000, 999999);
        $request->session()->put('two_factor_code_' . $user->id, $code);
        $request->session()->put('two_factor_expires_at_' . $user->id, now()->addMinutes(5));
        $VonageOTP->sendSms('+63' . $user->mobile_no, "Your 2FA code is: $code");

        session()->flash('message', 'OTP sent successfully!');
        session()->flash('message-type', 'success');
        session()->flash('action-type', 'send');

        return redirect()->back();
    }

    public function verifyCode(Request $request)
    {
        $request->validate(['code' => 'required|numeric']);
    
        $user = Auth::user();
        
        $storedCode = $request->session()->get('two_factor_code_' . $user->id);
        $expiresAt = $request->session()->get('two_factor_expires_at_' . $user->id);
    
        if ($expiresAt && now()->greaterThan($expiresAt)) {
            $request->session()->forget('two_factor_code_' . $user->id);
            $request->session()->forget('two_factor_expires_at_' . $user->id);

            session()->flash('message', '2FA code has expired!');
            session()->flash('message-type', 'success');
            session()->flash('action-type', 'send');
            return redirect()->back();
        }
    
        if ($storedCode && $request->code == $storedCode) {
            $request->session()->forget('two_factor_code_' . $user->id);
            $request->session()->forget('two_factor_expires_at_' . $user->id);
            $request->session()->forget('login.id');

            $user->update([
                'sms_two_factor_verified' => true,
            ]);
            
            $user->sms_two_factor_verified = true;
            $user->save();
            $user->refresh();
            
            session()->flash('message', '2FA verified successfully!');
            session()->flash('message-type', 'success');
            session()->flash('action-type', 'send');

            return redirect()->route('dashboard');
        }
    
        session()->flash('message', 'Invalid 2FA Code.');
        session()->flash('message-type', 'error');
        session()->flash('action-type', 'send');
        return redirect()->back();

    }
}
