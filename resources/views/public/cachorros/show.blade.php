@extends('layouts.app')
@section('title', $cachorro->nombre.' — Reino Zimbabwe')

@section('content')
<section class="max-w-6xl mx-auto px-4 py-12">

    {{-- Enlace de retorno --}}
    <a href="{{ route('camadas.show', $cachorro->camada) }}"
       class="text-sm text-[#03856C] hover:underline">
        ← Volver a la camada
    </a>

    {{-- Contenedor principal --}}
    <div class="mt-4 grid md:grid-cols-2 gap-8 items-start">

        {{-- COLUMNA IZQUIERDA: Galería --}}
        <div>

            {{-- Foto principal con fallback robusto --}}
            @php
                // 1) Imagen desde BD (puede existir o no en disco)
                $img = optional($cachorro->imagenes->sortBy('orden')->first())->ruta;

                // 2) Fallback determinista usando las 6 fotos locales
                $fallbacks = [
                    asset('images/chihuahua1.jpg'),
                    asset('images/chihuahua2.jpg'),
                    asset('images/chihuahua3.jpg'),
                    asset('images/chihuahua4.jpg'),
                    asset('images/chihuahua5.jpg'),
                    asset('images/chihuahua6.jpg'),
                ];
                $fallback = $fallbacks[($cachorro->id ?? 0) % 6];

                // 3) Solo usamos storage si el archivo EXISTE físicamente
                $storagePath = $img ? public_path('storage/'.$img) : null;
                $hasRealFile = $storagePath && file_exists($storagePath);

                // 4) SRC final
                $mainSrc = $hasRealFile ? asset('storage/'.$img) : $fallback;
            @endphp

            <div class="aspect-[4/3] rounded-2xl overflow-hidden border border-gray-200 bg-white">
                <img
                    src="{{ $mainSrc }}"
                    alt="{{ $cachorro->nombre }}"
                    class="w-full h-full object-cover"
                />
            </div>

            {{-- Miniaturas (si hay más de una) --}}
            @php
                $imagenesUnicas = $cachorro->imagenes->unique('ruta');
            @endphp

            @if($imagenesUnicas->count() > 1)
                <div class="flex gap-2 mt-3 overflow-x-auto">
                    @foreach($imagenesUnicas->sortBy('orden') as $im)
                        @php
                            $thumbPath   = $im->ruta ? public_path('storage/'.$im->ruta) : null;
                            $thumbHasFile = $thumbPath && file_exists($thumbPath);
                            $thumbSrc    = $thumbHasFile
                                ? asset('storage/'.$im->ruta)
                                : $fallback;
                        @endphp

                        <img
                            src="{{ $thumbSrc }}"
                            class="h-16 w-16 object-cover rounded-lg border hover:shadow-sm transition"
                            loading="lazy"
                        />
                    @endforeach
                </div>
            @endif
        </div>

        {{-- COLUMNA DERECHA: Información + contacto --}}
        <div>
            <h1 class="font-serif text-3xl flex items-center gap-3">
                {{ $cachorro->nombre }}
                <x-badge :estado="$cachorro->estado" />
            </h1>

            <p class="text-gray-600 mt-2">
                Camada: {{ $cachorro->camada->nombre }}
                — Nacidos {{ $cachorro->camada->fecha_nacimiento->format('d/m/Y') }}
            </p>

            <p class="text-gray-700 mt-1">
                Sexo: {{ strtoupper($cachorro->sexo) }}
                · Color: {{ $cachorro->color ?? '—' }}
            </p>

            {{-- Video embebido si existe --}}
            @if($cachorro->video_url)
                <div class="mt-6 aspect-video rounded-xl overflow-hidden border border-neutral-200">
                    <iframe
                        src="{{ $cachorro->video_url }}"
                        class="w-full h-full"
                        allowfullscreen
                        loading="lazy">
                    </iframe>
                </div>
            @endif

            {{-- Bloque de contacto / consulta --}}
            <div class="mt-8">
                @include('public.partials.consulta-card', [
                    'cachorro' => $cachorro,
                    'camada'   => $cachorro->camada
                ])
            </div>
        </div>
    </div>

    {{-- 🔒 Bloque “otros cachorros de esta camada” sigue desactivado por ahora --}}
    @if(false && isset($otros) && $otros->isNotEmpty())
        <div class="mt-12 border-t border-neutral-200 pt-8">
            <h2 class="text-2xl font-semibold mb-4">Otros cachorros de esta camada</h2>
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($otros as $o)
                    @php
                        $img0 = optional($o->imagenes->first())->ruta;
                        $fallbacks = [
                            asset('images/chihuahua1.jpg'),
                            asset('images/chihuahua2.jpg'),
                            asset('images/chihuahua3.jpg'),
                            asset('images/chihuahua4.jpg'),
                            asset('images/chihuahua5.jpg'),
                            asset('images/chihuahua6.jpg'),
                        ];
                        $fallback0 = $fallbacks[($o->id ?? 0) % 6];
                        $src0 = $img0 ? asset('storage/'.$img0) : $fallback0;
                    @endphp

                    <a href="{{ route('cachorros.show', $o) }}"
                       class="block rounded-2xl overflow-hidden border border-neutral-200 hover:shadow-md transition">
                        <div class="aspect-[4/3] bg-neutral-100">
                            <img
                                src="{{ $src0 }}"
                                alt="Foto de {{ $o->nombre }}"
                                class="w-full h-full object-cover"
                                loading="lazy"
                            >
                        </div>
                        <div class="p-4">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-medium">{{ $o->nombre }}</h3>
                                <span class="text-xs px-2 py-1 rounded-full bg-neutral-100">
                                    {{ strtoupper($o->sexo ?? '-') }}
                                </span>
                            </div>
                            <p class="text-sm text-neutral-600 mt-1">
                                Estado:
                                <span class="font-medium">
                                    {{ ucfirst($o->estado ?? 'disponible') }}
                                </span>
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif
</section>
@endsection