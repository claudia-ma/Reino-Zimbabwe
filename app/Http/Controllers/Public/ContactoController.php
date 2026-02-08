<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Mensaje;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'   => ['required','string','max:255'],
            'email'    => ['required','email','max:255'],
            'telefono' => ['nullable','string','max:30'],
            'asunto'   => ['required','string','max:255'],
            'mensaje'  => ['required','string','max:5000'],
        ]);

        Mensaje::create($data);

        return back()->with('success', '¡Mensaje enviado! Te responderemos lo antes posible.');
    }
}