<?php

namespace App\SMS;

use Vonage\Laravel\Facade\Vonage;
use Vonage\SMS\Message\SMS;
use Illuminate\Support\Facades\Log;
use Exception;

class VonageOTP
{
    public function __construct()
    {
        if (empty(env('VONAGE_KEY')) || empty(env('VONAGE_SECRET'))) {
            Log::error('Vonage credentials (VONAGE_KEY or VONAGE_SECRET) not set in .env file.');
        }
    }

    /**
     * Sends an SMS message using Vonage via the Laravel package.
     *
     * @param string $to The recipient's phone number in E.164 format (e.g., +639123456789).
     * @param string $message The message body.
     * @return bool True on success, false on failure.
     */
    public function sendSMS(string $to, string $message): bool
    {
        if (!str_starts_with($to, '+')) {
            Log::warning("Recipient number {$to} is not in E.164 format. Attempting to add +63.");
            $to = '+63' . ltrim($to, '0');
        }

        $fromNumber = env('VONAGE_PHONE_NUMBER');
        
        if (empty($fromNumber)) {
            Log::error('Vonage phone number (sender) not set in .env file (VONAGE_PHONE_NUMBER).');
            return false;
        }

        try {
            // Use the Vonage SMS Message class to create the message
            $messageObj = new SMS($to, $fromNumber, $message);

            // Send the message using Vonage
            $response = Vonage::sms()->send($messageObj);

            // The Vonage response is likely a collection, so we will handle it properly
            $status = $response->current();  // Get the current message response from the collection

            // Check if the status of the message is success (0 means success)
            if ($status->getStatus() == 0) {
                Log::info("Vonage SMS sent successfully to: {$to}", [
                    'message_id' => $status->getMessageId(),
                    'status' => $status->getStatus(),
                ]);
                return true;
            } else {
                Log::error("Vonage SMS failed to send to: {$to}", [
                    'status' => $status->getStatus(),
                    'error_text' => $status->getErrorText(),
                    'to' => $to
                ]);
                return false;
            }

        } catch (Exception $e) {
            Log::error("Vonage SMS Exception caught for {$to}: " . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'to' => $to
            ]);
            return false;
        }
    }
}
