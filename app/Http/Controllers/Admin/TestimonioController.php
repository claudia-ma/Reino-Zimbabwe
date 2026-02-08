<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonio;
use Illuminate\Http\Request;

class TestimonioController extends Controller
{
    public function index()
    {
        $testimonios = Testimonio::latest()->paginate(10);
        return view('admin.testimonios.index', compact('testimonios'));
    }

    public function create()
    {
        return view('admin.testimonios.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'    => ['required', 'string', 'max:255'],
            'ubicacion' => ['nullable', 'string', 'max:255'],
            'estrellas' => ['required', 'integer', 'min:1', 'max:5'],
            'mensaje'   => ['required', 'string'],
            'foto_url'  => ['nullable', 'string', 'max:255'],
            'publicado' => ['nullable', 'boolean'],
        ]);

        $data['publicado'] = $request->boolean('publicado');

        Testimonio::create($data);

        return redirect()
            ->route('admin.testimonios.index')
            ->with('success', 'Testimonio creado correctamente.');
    }

    public function show(Testimonio $testimonio)
    {
        return redirect()->route('admin.testimonios.index');
    }

    public function edit(Testimonio $testimonio)
    {
        return view('admin.testimonios.edit', compact('testimonio'));
    }

    public function update(Request $request, Testimonio $testimonio)
    {
        $data = $request->validate([
            'nombre'    => ['required', 'string', 'max:255'],
            'ubicacion' => ['nullable', 'string', 'max:255'],
            'estrellas' => ['required', 'integer', 'min:1', 'max:5'],
            'mensaje'   => ['required', 'string'],
            'foto_url'  => ['nullable', 'string', 'max:255'],
            'publicado' => ['nullable', 'boolean'],
        ]);

        $data['publicado'] = $request->boolean('publicado');

        $testimonio->update($data);

        return redirect()
            ->route('admin.testimonios.index')
            ->with('success', 'Testimonio actualizado correctamente.');
    }

    public function destroy(Testimonio $testimonio)
    {
        $testimonio->delete();

        return redirect()
            ->route('admin.testimonios.index')
            ->with('success', 'Testimonio eliminado correctamente.');
    }

    public function toggle(\App\Models\Testimonio $testimonio)
{
    $testimonio->publicado = ! $testimonio->publicado;
    $testimonio->save();

    return back()->with(
        'success',
        $testimonio->publicado
            ? 'Testimonio publicado ✅'
            : 'Testimonio ocultado ✅'
    );
}
}