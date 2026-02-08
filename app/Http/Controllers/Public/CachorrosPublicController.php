<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Cachorro;

class CachorrosPublicController extends Controller
{
    public function index()
    {
        $cachorros = Cachorro::query()
            ->where('destacado', 1)
            ->orderByRaw("FIELD(estado, 'disponible','reservado','entregado')") // opcional
            ->latest()
            ->get();

        return view('public.cachorros-destacados', compact('cachorros'));
    }
}