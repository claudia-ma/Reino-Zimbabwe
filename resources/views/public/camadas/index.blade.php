@extends('layouts.app')
@section('title', 'Camadas — Reino Zimbabwe')
@section('content')
<section class="max-w-6xl mx-auto px-4 py-16 md:py-20">

  {{-- Título principal --}}
  <div class="mb-10">
    <h1 class="text-3xl md:text-4xl font-semibold tracking-tight">Nuestras camadas</h1>
    <p class="mt-2 text-neutral-600">
      Camadas activas y recientes del criadero. Entra para ver los cachorros disponibles.
    </p>
  </div>

  {{-- Listado de camadas --}}
  <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
    @forelse($camadas as $camada)
      <a href="{{ route('camadas.show', $camada) }}"
         class="block rounded-2xl border border-neutral-200 hover:shadow-sm transition">
        <div class="p-5">
          <h3 class="text-lg font-semibold">{{ $camada->nombre }}</h3>
          <p class="mt-1 text-sm text-neutral-600">
            {{ $camada->fecha_nacimiento?->format('d/m/Y') ?? 'Fecha por confirmar' }}
            · Cachorros:
            <span class="font-medium">{{ $camada->cachorros_count ?? $camada->cachorros->count() }}</span>
          </p>

          @if($camada->activa)
            <span class="inline-flex mt-3 text-xs px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-100">
              Activa
            </span>
          @endif
        </div>
      </a>
    @empty
      <div class="col-span-full text-center text-neutral-600 py-10 border rounded-2xl">
        Actualmente no hay camadas publicadas.
      </div>
    @endforelse
  </div>

  {{-- Paginación --}}
  <div class="mt-10">{{ $camadas->withQueryString()->links() }}</div>
</section>
@endsection