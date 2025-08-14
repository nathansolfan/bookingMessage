<?php

namespace App\Services;

use Twilio\Rest\Client;


class WhatsappService
{
    public function sendNotification($customerName, $customerPhone, $service)
    {
        $api = env('twilio_sid');
        $token = env('twilio_token');

        $twilio = new Client($api, $token);

        $message = "Hi {$customerName}! We now have avaibility for your {$service}. Please confirm your appointment.";

        $result = $twilio->messages->create(
            "whatsapp:{$customerPhone}",
            [
                'from' => env('twilio_whatsapp_from'),
                'body' => $message
            ]
        );
        return $result->sid;

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
