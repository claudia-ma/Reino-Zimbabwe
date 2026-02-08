@extends('layouts.app')
@section('title', $camada->nombre.' — Reino Zimbabwe')

@section('content')
<section class="max-w-6xl mx-auto px-4 py-12">

  {{-- Volver al listado --}}
  <a href="{{ route('camadas.index') }}" class="text-sm text-[#03856C] hover:underline">
    ← Volver a camadas
  </a>

  {{-- Cabecera de la camada --}}
  <div class="mt-4 flex flex-col gap-2">
    <h1 class="text-2xl md:text-3xl font-semibold">
      {{ $camada->nombre }}
    </h1>

    <p class="text-sm text-neutral-600">
      Nacidos: {{ $camada->fecha_nacimiento?->format('d/m/Y') ?? 'Fecha por confirmar' }}
      — Padres: {{ $camada->padre }} × {{ $camada->madre }}
    </p>

    @if($camada->descripcion)
      <p class="text-neutral-700">
        {{ $camada->descripcion }}
      </p>
    @endif

    @if($camada->activa)
      <span class="mt-2 inline-flex items-center px-3 py-1 rounded-full text-xs bg-emerald-50 text-emerald-700 border border-emerald-100">
        Activa
      </span>
    @endif
  </div>

  {{-- 👇 A partir de aquí SOLO listado de cachorros, sin foto gigante de cabecera --}}

  @if($cachorros->isEmpty())
    <p class="text-neutral-600 mt-8">
      No hay cachorros para esta camada en este momento.
    </p>
  @else
    <h2 class="mt-8 mb-4 text-lg font-semibold">Cachorros de esta camada</h2>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
      @foreach($cachorros as $c)
        @php
          // 🔹 Ignoramos las rutas de BD por ahora
          // y usamos SIEMPRE las 6 fotos locales.
          $fallbacks = [
              asset('images/chihuahua1.jpg'),
              asset('images/chihuahua2.jpg'),
              asset('images/chihuahua3.jpg'),
              asset('images/chihuahua4.jpg'),
              asset('images/chihuahua5.jpg'),
              asset('images/chihuahua6.jpg'),
          ];
          $src = $fallbacks[($c->id ?? 0) % 6];
        @endphp

        <a href="{{ route('cachorros.show', $c) }}"
           class="block rounded-2xl overflow-hidden border border-neutral-200 hover:shadow-sm transition">
          <div class="h-40 md:h-48 bg-neutral-100 overflow-hidden rounded-xl">
           <img
             src="{{ $src }}"
             alt="Foto de {{ $c->nombre }}"
             class="w-full h-full object-cover"
             loading="lazy"
           >
         </div>

          <div class="p-4">
            <div class="flex items-center justify-between">
              <h3 class="text-lg font-medium">{{ $c->nombre }}</h3>
              <span class="text-xs px-2 py-1 rounded-full bg-neutral-100">
                {{ strtoupper($c->sexo ?? '-') }}
              </span>
            </div>

            <p class="text-sm text-neutral-600 mt-1">
              Sexo: {{ strtoupper($c->sexo ?? '-') }}
              @if($c->color)
                · Color: {{ $c->color }}
              @endif
            </p>

            <div class="mt-2">
              <x-badge :estado="$c->estado ?? 'disponible'" />
            </div>
          </div>
        </a>
      @endforeach
    </div>
  @endif
</section>
@endsection