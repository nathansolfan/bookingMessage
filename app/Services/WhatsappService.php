<?php

namespace App\Services;

use Twilio\Rest\Client;


class WhatsappService
{
    public function sendNotification()
    {
        $api = env('twilio_sid');
        $token = env('twilio_token');

        $twilio = new Client($api, $token);

        $message = 'Test: Sending message, ';

        $result = $twilio->messages->create(
            'whatsapp:+447418443143',  // ← SEU NÚMERO REAL
            [
                'from' => env('twilio_whatsapp_from'),
                'body' => $message
            ]
        );
        return $result->sid;
    }w
}
