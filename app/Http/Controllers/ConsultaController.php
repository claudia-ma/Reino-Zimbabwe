<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ConsultaController extends Controller
{
    /**
     * Guarda o envía una consulta desde el formulario público.
     */
    public function store(Request $request)
    {
        // Validamos los campos del formulario
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'email' => 'nullable|email',
            'telefono' => 'nullable|string|max:30',
            'mensaje' => 'required|string|max:1000',
        ]);

        // Construimos el mensaje para WhatsApp
        $telefonoDestino = config('app.whatsapp_phone', '34600111222');
        $texto = rawurlencode(
            "Hola 👋, soy {$data['nombre']}.\n\n" .
            "Mensaje: {$data['mensaje']}\n" .
            "📧 Email: " . ($data['email'] ?? 'No indicado') . "\n" .
            "📱 Teléfono: " . ($data['telefono'] ?? 'No indicado')
        );

        $whatsappUrl = "https://wa.me/{$telefonoDestino}?text={$texto}";

        // (Opcional) Enviar también por email
        if (config('mail.mailers.smtp')) {
            try {
                Mail::raw($data['mensaje'], function ($message) use ($data) {
                    $message->to('info@reinozimbabwe.test')
                            ->subject('Nueva consulta desde la web')
                            ->replyTo($data['email'] ?? 'no-reply@reinozimbabwe.test', $data['nombre']);
                });
            } catch (\Exception $e) {
                // Evitamos error si el mail no está configurado
            }
        }

        // Redirigimos a WhatsApp directamente
        return redirect($whatsappUrl);
    }
}