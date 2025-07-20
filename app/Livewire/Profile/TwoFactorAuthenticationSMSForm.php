<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Illuminate\Support\Str;
use App\SMS\VonageOTP;
use Auth;

class TwoFactorAuthenticationSMSForm extends Component
{
    public $sendOTP = false;
    public $showingConfirmation = false;
    public $enabled = false;
    public $active2FA = false;
    public $otp;
    public $code;


    public function toggleTwoFactorSMSAuthentication()
    {
        $user = Auth::user();

        if ($user->mobile_no) {
            if ($this->sendSMSCode()) {
                $this->enabled = true;
                $this->sendOTP = true;
                $this->showingConfirmation = true;
            } 
        }
    }

    public function confirmTwoFactorAuthentication()
    {
        $user = Auth::user();
        $secret = Str::random(32);

        if ($this->verifySMSCode()) {
            if(!$this->active2FA) {
                $user->forceFill([
                    'sms_two_factor_secret' => $secret
                ]);
                $user->save();

                $this->enabled = true;
                $this->sendOTP = false; 
                $this->showingConfirmation = false;
                $this->active2FA = true;     
            } else {
                $user->forceFill([
                    'sms_two_factor_secret' => null
                ]);
                $user->save();
                
                $this->enabled = false;
                $this->sendOTP = false;
                $this->showingConfirmation = false;
                $this->active2FA = false;
            } 
        }
    }

    public function sendSMSCode()
    {
        $user = Auth::user();

        if (!$user->mobile_no) {
            $this->message = 'No phone number registered.';
            session()->flash('message', $this->message);
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'send');
            return false;
        }

        $code = rand(100000, 999999);
        
        session()->put('two_factor_code_' . $user->id, $code);
        session()->put('two_factor_expires_at_' . $user->id, now()->addMinutes(10));

        $otpService = new VonageOTP();
        $otpService->sendSMS('+63' . $user->mobile_no, "Your 2FA code is: $code");

        $this->message = 'OTP sent successfully!';
        session()->flash('message', $this->message);
        session()->flash('message-type', 'success');
        session()->flash('action-type', 'send');
        return true;
    }

    public function verifySMSCode()
    {
        $this->validate(['code' => 'required|numeric']);

        $user = Auth::user();

        $storedCode = session()->get('two_factor_code_' . $user->id);
        $expiresAt = session()->get('two_factor_expires_at_' . $user->id);

        if ($expiresAt && now()->greaterThan($expiresAt)) {
            session()->forget('two_factor_code_' . $user->id);
            session()->forget('two_factor_expires_at_' . $user->id);

            $this->message = '2FA code has expired!';
            session()->flash('message', $this->message);
            session()->flash('message-type', 'error');
            return false;
        }

        if ($storedCode && $this->code == $storedCode) {
            session()->forget('two_factor_code_' . $user->id);
            session()->forget('two_factor_expires_at_' . $user->id);

            $this->message = '2FA verified successfully!';
            session()->flash('message', $this->message);
            session()->flash('message-type', 'success');
            session()->flash('action-type', 'send');

            return true;
        } else {
            $this->message = 'Invalid 2FA Code.';
            session()->flash('message', $this->message);
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'send');

            return false;
        }
    }

    public function render()
    {
        $user = Auth::user();
        if ($user->sms_two_factor_secret) {
            $this->enabled = true;
            $this->active2FA = true;
        }
        if (!$user->mobile_no) {
            return response()->json(['message' => 'No phone number registered.'], 400);
        }
        $maskedPhone = '******' . substr($user->mobile_no, -4);

        return view('profile.two-factor-authentication-s-m-s-form', [
            'maskedPhone' => $maskedPhone
        ]);
    }
}
