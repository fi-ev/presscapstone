<?php

namespace App\SMS;

use Twilio\Rest\Client;
use Illuminate\Support\Facades\Log;

class TwilioOTP
{
    protected $twilio;

    public function __construct()
    {
        $this->twilio = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
    }

    public function sendSMS($to, $message)
    {
        //Log::info("Attempting to send SMS to: {$to}");
        
        $response = $this->twilio->messages->create($to, [
            'from' => env('TWILIO_PHONE_NUMBER'),
            'body' => $message,
        ]);

        //Log::info('Twilio Response:', (array) $response);
    }
}
