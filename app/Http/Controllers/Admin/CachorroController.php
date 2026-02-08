<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cachorro;
use App\Models\Camada;

class CachorroController extends Controller
{
    public function index()
    {
        $camadas = Camada::orderByDesc('id')->paginate(10);

        return view('admin.camadas.index', compact('camadas'));
    }

    public function create()
    {
        return view('admin.camadas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'           => ['required', 'string', 'max:255'],
            'padre'            => ['nullable', 'string', 'max:255'],
            'madre'            => ['nullable', 'string', 'max:255'],
            'fecha_nacimiento' => ['nullable', 'date'],
            'descripcion'      => ['nullable', 'string'],
            'activa'           => ['nullable', 'boolean'],
        ]);

        $data['activa'] = $request->boolean('activa');

        Camada::create($data);

        return redirect()
            ->route('admin.camadas.index')
            ->with('success', 'Camada creada correctamente.');
    }

    public function show(Camada $camada)
    {
        return redirect()->route('admin.camadas.index');
    }

    public function edit(Camada $camada)
    {
        return view('admin.camadas.edit', compact('camada'));
    }

    public function update(Request $request, Camada $camada)
    {
        $data = $request->validate([
            'nombre'           => ['required', 'string', 'max:255'],
            'padre'            => ['nullable', 'string', 'max:255'],
            'madre'            => ['nullable', 'string', 'max:255'],
            'fecha_nacimiento' => ['nullable', 'date'],
            'descripcion'      => ['nullable', 'string'],
            'activa'           => ['nullable', 'boolean'],
        ]);

        $data['activa'] = $request->boolean('activa');

        $camada->update($data);

        return redirect()
            ->route('admin.camadas.index')
            ->with('success', 'Camada actualizada correctamente.');
    }

    public function destroy(Camada $camada)
    {
        // Si quieres impedir borrar camadas con cachorros, dímelo y lo blindamos.
        $camada->delete();

        return redirect()
            ->route('admin.camadas.index')
            ->with('success', 'Camada eliminada correctamente.');
    }
}