<?php

namespace App\Http\Controllers;

use App\Models\Camada;
use Illuminate\Http\Request;

class PublicCamadasController extends Controller
{
    public function home()
    {
        $camadas = Camada::where('activa', true)
            ->with('cachorros')
            ->latest('fecha_nacimiento')
            ->take(3)
            ->get();

        return view('public.home', compact('camadas'));
    }

    public function index()
    {
        $camadas = Camada::latest('fecha_nacimiento')->paginate(6);
        return view('public.camadas.index', compact('camadas'));
    }

    public function show(Request $request, Camada $camada)
{
    // Parámetros de filtro/orden
    $estado = $request->get('estado');                 // disponible | reservado | entregado | null
    $sexo   = $request->get('sexo');                   // macho | hembra | null
    $q      = (string) $request->string('q');          // búsqueda por nombre o color
    $orden  = $request->get('orden', 'recientes');     // recientes | nombre

    // Query de cachorros de la camada con filtros
    $cachorros = $camada->cachorros()
        ->when($estado, fn ($qq) => $qq->where('estado', $estado))
        ->when($sexo,   fn ($qq) => $qq->where('sexo', $sexo))
        ->when($q, function ($qq) use ($q) {
            $qq->where(function ($w) use ($q) {
                $w->where('nombre', 'like', '%' . $q . '%')
                  ->orWhere('color', 'like', '%' . $q . '%');
            });
        })
        ->with(['imagenes' => fn ($qi) => $qi->orderBy('orden')])
        ->when($orden === 'nombre', fn ($qq) => $qq->orderBy('nombre'),
                                fn ($qq) => $qq->latest('created_at'))
        ->paginate(9)
        ->withQueryString();

    return view('public.camadas.show', compact('camada', 'estado', 'sexo', 'q', 'orden', 'cachorros'));
}
}