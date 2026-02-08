<?php

namespace App\Http\Controllers;

use App\Models\Cachorro;
use App\Models\Camada;
use Illuminate\Http\Request;

class PublicCachorrosController extends Controller
{
    public function show(Cachorro $cachorro)
    {
        $cachorro->load([
            'camada',
            'imagenes' => fn ($q) => $q->orderBy('orden'),
        ]);

        // Foto principal (o placeholder)
        $fotoPrincipal = $cachorro->imagenes->first()->ruta ?? null;
        $fotoPrincipal = $fotoPrincipal
            ? asset('storage/' . $fotoPrincipal)
            : asset('images/chihuahua1.jpeg');

        // WhatsApp
        $phone = config('app.whatsapp_phone', '34600111222');
        $msg = rawurlencode("Hola, me interesa el cachorro {$cachorro->nombre} de la camada {$cachorro->camada->nombre}.");
        $whatsappUrl = "https://wa.me/{$phone}?text={$msg}";

        // Otros cachorros de la misma camada (máx. 6)
        $otros = $cachorro->camada
            ? $cachorro->camada->cachorros()
                ->where('id', '!=', $cachorro->id)
                ->with(['imagenes' => fn ($q) => $q->orderBy('orden')])
                ->latest('created_at')
                ->take(6)
                ->get()
            : collect();

        return view('public.cachorros.show', compact('cachorro', 'fotoPrincipal', 'whatsappUrl', 'otros'));
    }

    public function index(Request $request)
    {
        $estado   = $request->get('estado');              // disponible|reservado|entregado|null
        $sexo     = $request->get('sexo');                // macho|hembra|null
        $camadaId = $request->get('camada');              // id de camada (opcional)
        $q        = (string) $request->string('q');       // texto (nombre/color)
        $orden    = $request->get('orden', 'recientes');  // recientes|nombre

        $cachorros = Cachorro::query()
            ->when($camadaId, fn ($q2) => $q2->where('camada_id', $camadaId))
            ->when($estado,   fn ($q2) => $q2->where('estado', $estado))
            ->when($sexo,     fn ($q2) => $q2->where('sexo', $sexo))
            ->when($q, function ($q2) use ($q) {
                $q2->where(function ($w) use ($q) {
                    $w->where('nombre', 'like', "%{$q}%")
                      ->orWhere('color', 'like', "%{$q}%");
                });
            })
            ->with([
                'camada:id,nombre',
                'imagenes' => fn ($qi) => $qi->orderBy('orden'),
            ])
            ->when(
                $orden === 'nombre',
                fn ($q2) => $q2->orderBy('nombre'),
                fn ($q2) => $q2->latest('created_at')
            )
            ->paginate(12)
            ->withQueryString();

        // Para el filtro por camada (combo)
        $camadas = Camada::query()
            ->select('id', 'nombre')
            ->orderBy('nombre')
            ->get();

        return view('public.cachorros.index', compact('cachorros', 'estado', 'sexo', 'camadaId', 'q', 'orden', 'camadas'));
    }
}