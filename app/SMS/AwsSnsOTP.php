<?php

namespace App\SMS;

use Aws\Sns\SnsClient;
use Aws\Exception\AwsException;

class VonageOTP
{
    protected $sns;

    public function __construct()
    {
        $this->sns = new SnsClient([
            'region' => config('app.aws_region', 'ap-southeast-1'),
            'version' => '2010-03-31',
            'credentials' => [
                'key'    => config('app.aws_key'),
                'secret' => config('app.aws_secret'),
            ],
        ]);
    }

    public function sendSms($phoneNumber, $message)
    {
        try {
            $result = $this->sns->publish([
                'Message' => $message,
                'PhoneNumber' => $phoneNumber,
                'MessageAttributes' => [
                    'AWS.SNS.SMS.SMSType' => [
                        'DataType' => 'String',
                        'StringValue' => 'Transactional',
                    ],
                ],
            ]);
            return $result;
        } catch (AwsException $e) {
            return $e->getMessage();
        }
    }
}
