<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mensaje;

class MensajeController extends Controller
{
    /**
     * Listado de mensajes
     */
    public function index()
    {
        $mensajes = Mensaje::latest()->paginate(10);

        return view('admin.mensajes.index', compact('mensajes'));
    }

    /**
     * Ver un mensaje
     */
    public function show(Mensaje $mensaje)
    {
        return view('admin.mensajes.show', compact('mensaje'));
    }

    /**
     * Eliminar mensaje
     */
    public function destroy(Mensaje $mensaje)
    {
        $mensaje->delete();

        return redirect()
            ->route('admin.mensajes.index')
            ->with('success', 'Mensaje eliminado correctamente');
    }
}