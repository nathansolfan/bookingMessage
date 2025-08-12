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

        $message = $twilio->messages->create(
            'whatsapp:+447481443143',
            [
                'from' => env('twilio_whatsapp_from'),
                'body' => 'Test: Sending message, '
            ]
        );
        return $message->sid;

    }

    // 1. Configurar Twilio client
    // 2. Montar mensagem personalizada
    // 3. Enviar WhatsApp
    // 4. Retornar resultado



}


//Como pegar credenciais do .env no PHP?
//Como criar cliente Twilio?
//Que dados precisa para enviar mensagem?
//Como tratar erros do Twilio?
