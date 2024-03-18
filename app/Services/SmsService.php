<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class SmsService
{
    protected $username;
    protected $password;
    protected $senderId = "GFSMANAGER";

    public function __construct()
    {
        $this->username = env('SMS_USERNAME');
        $this->password = env('SMS_PASSWORD');
    }

    public function sendSms($message, $phone)
    {
        $baseUrl = "https://smsvas.com/bulk/public/index.php/api/v1/sendsms";

        $response = Http::get($baseUrl, [
            'user' => $this->username,
            'password' => $this->password,
            'senderid' => $this->senderId,
            'sms' => $message,
            'mobiles' => $phone,
        ]);

        if ($response->successful()) {
            // SMS sent successfully
        } else {
            $error = ["status" => $response->status, "body" => $response->body() ];
            Log::error("Error sending sms");
            Log::error($error);
        }
    }
}
