@props(['title' => null])

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? config('app.name', 'Reino Zimbabwe') }}</title>

    {{-- Material Symbols (iconos) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">

    {{-- CSS + JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-white text-slate-900">
    {{-- NAVBAR --}}
    <header class="sticky top-0 z-50 bg-white/80 backdrop-blur border-b border-slate-200">
        <div class="max-w-6xl mx-auto px-4 md:px-6 h-16 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-2 font-extrabold tracking-tight">
                <span class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-slate-900 text-white">
                    RZ
                </span>
                <span>Reino Zimbabwe</span>
            </a>

            <nav class="hidden md:flex items-center gap-6 text-sm font-medium">
                <a href="{{ route('home') }}" class="hover:text-emerald-700 transition">Inicio</a>
                <a href="{{ route('etica') }}" class="hover:text-emerald-700 transition">Ética</a>
                <a href="{{ route('cachorros.destacados') }}" class="hover:text-emerald-700 transition">Cachorros</a>
                <a href="{{ route('familia') }}" class="hover:text-emerald-700 transition">Nuestra familia</a>
                <a href="{{ route('testimonios') }}" class="hover:text-emerald-700 transition">Testimonios</a>
                <a href="{{ route('contacto') }}" class="hover:text-emerald-700 transition">Contacto</a>
            </nav>

            <div class="flex items-center gap-3">
                <a href="{{ route('contacto') }}"
                   class="hidden sm:inline-flex items-center justify-center rounded-full h-10 px-5 bg-emerald-600 text-white text-sm font-bold shadow-sm hover:bg-emerald-700 transition">
                    Contactar
                </a>

                <a href="{{ route('login') }}"
                   class="inline-flex items-center justify-center rounded-full h-10 px-5 border border-slate-300 text-slate-700 text-sm font-bold hover:bg-slate-50 transition">
                    Login
                </a>
            </div>
        </div>
    </header>

    {{-- CONTENIDO --}}
    <main>
        {{ $slot }}
    </main>

    {{-- FOOTER --}}
    <footer class="border-t border-slate-200 bg-slate-50">
        <div class="max-w-6xl mx-auto px-4 md:px-6 py-10 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="space-y-3">
                <div class="font-extrabold text-lg">Reino Zimbabwe</div>
                <p class="text-sm text-slate-600 leading-relaxed">
                    Crianza responsable de Chihuahua cabeza de manzana en Canarias.
                </p>
            </div>

            <div class="space-y-3">
                <div class="font-bold text-sm">Secciones</div>
                <div class="grid grid-cols-2 gap-2 text-sm">
                    <a class="text-slate-600 hover:text-emerald-700 transition" href="{{ route('etica') }}">Ética</a>
                    <a class="text-slate-600 hover:text-emerald-700 transition" href="{{ route('familia') }}">Nuestra familia</a>
                    <a class="text-slate-600 hover:text-emerald-700 transition" href="{{ route('cachorros.destacados') }}">Cachorros</a>
                    <a class="text-slate-600 hover:text-emerald-700 transition" href="{{ route('testimonios') }}">Testimonios</a>
                    <a class="text-slate-600 hover:text-emerald-700 transition" href="{{ route('contacto') }}">Contacto</a>
                </div>
            </div>

            <div class="space-y-3">
                <div class="font-bold text-sm">Legal</div>
                <div class="space-y-2 text-sm">
                    <a href="#" class="text-slate-600 hover:text-emerald-700 transition">Aviso legal</a>
                    <a href="#" class="text-slate-600 hover:text-emerald-700 transition">Política de privacidad</a>
                </div>
            </div>
        </div>

        <div class="border-t border-slate-200">
            <div class="max-w-6xl mx-auto px-4 md:px-6 py-4 text-xs text-slate-500 flex flex-col md:flex-row gap-2 md:items-center md:justify-between">
                <span>© {{ date('Y') }} Reino Zimbabwe. Todos los derechos reservados.</span>
                <span>Hecho con Laravel</span>
            </div>
        </div>
    </footer>
</body>
</html>