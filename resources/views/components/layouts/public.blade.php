@props(['title' => null])

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? config('app.name', 'Reino Zimbabwe') }}</title>

    {{-- Material Symbols --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-white text-slate-900">

<header
    x-data="{ open: false }"
    class="sticky top-0 z-50 bg-white/80 backdrop-blur-xl border-b border-white/40 shadow-[0_4px_30px_rgba(15,23,42,0.03)]"
>
    <div class="max-w-6xl mx-auto px-4 md:px-6 h-16 flex items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center gap-2.5">
            <img
                src="{{ asset('images/logo-reino-zimbabwe.jpg') }}"
                alt="Reino Zimbabwe"
                class="h-10 w-auto object-contain"
            >

            <div class="leading-tight">
                <p class="text-sm font-black tracking-tight text-[#0d1b10]">
                    Reino Zimbabwe
                </p>

                <p class="text-[10px] sm:text-[11px] uppercase tracking-[0.16em] text-slate-500">
                    Chihuahua Kennel
                </p>
            </div>
        </a>

        <nav class="hidden md:flex items-center gap-7 text-sm font-semibold text-slate-700">
            <a href="{{ route('home') }}" class="hover:text-emerald-700 transition">Inicio</a>
            <a href="{{ route('etica') }}" class="hover:text-emerald-700 transition">Ética</a>
            <a href="{{ route('cachorros.destacados') }}" class="hover:text-emerald-700 transition">Cachorros</a>
            <a href="{{ route('familia') }}" class="hover:text-emerald-700 transition">Nuestra familia</a>
            <a href="{{ route('testimonios') }}" class="hover:text-emerald-700 transition">Testimonios</a>
            <a href="{{ route('contacto') }}" class="hover:text-emerald-700 transition">Contacto</a>
        </nav>

        <div class="flex items-center gap-2">
            <a href="{{ route('contacto') }}"
               class="hidden sm:inline-flex h-10 items-center justify-center rounded-full bg-emerald-600 px-5 text-sm font-bold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-emerald-700 hover:shadow-md">
                Contactar
            </a>

            <a href="{{ route('login') }}"
               class="hidden sm:inline-flex h-10 items-center justify-center rounded-full border border-slate-200 bg-white/70 px-5 text-sm font-bold text-slate-700 shadow-sm transition hover:-translate-y-0.5 hover:border-emerald-100 hover:bg-emerald-50 hover:text-emerald-800">
                Login
            </a>

            <button
                type="button"
                @click="open = !open"
                class="md:hidden inline-flex h-10 w-10 items-center justify-center rounded-full border border-emerald-100 bg-white/80 text-[#0d1b10] shadow-sm transition hover:bg-emerald-50"
                aria-label="Abrir menú"
            >
                <span x-show="!open" class="material-symbols-outlined text-[22px]">menu</span>
                <span x-show="open" x-cloak class="material-symbols-outlined text-[22px]">close</span>
            </button>
        </div>
    </div>

    {{-- MENÚ MÓVIL --}}
    <div
        x-show="open"
        x-transition
        x-cloak
        @click.outside="open = false"
        class="md:hidden border-t border-emerald-100 bg-white/95 backdrop-blur-xl"
    >
        <nav class="max-w-6xl mx-auto px-4 py-4 space-y-2 text-sm font-bold text-slate-700">
            <a href="{{ route('home') }}" class="block rounded-2xl px-4 py-3 hover:bg-emerald-50 hover:text-emerald-800 transition">Inicio</a>
            <a href="{{ route('etica') }}" class="block rounded-2xl px-4 py-3 hover:bg-emerald-50 hover:text-emerald-800 transition">Ética</a>
            <a href="{{ route('cachorros.destacados') }}" class="block rounded-2xl px-4 py-3 hover:bg-emerald-50 hover:text-emerald-800 transition">Cachorros</a>
            <a href="{{ route('familia') }}" class="block rounded-2xl px-4 py-3 hover:bg-emerald-50 hover:text-emerald-800 transition">Nuestra familia</a>
            <a href="{{ route('testimonios') }}" class="block rounded-2xl px-4 py-3 hover:bg-emerald-50 hover:text-emerald-800 transition">Testimonios</a>
            <a href="{{ route('contacto') }}" class="block rounded-2xl px-4 py-3 hover:bg-emerald-50 hover:text-emerald-800 transition">Contacto</a>

            <div class="grid grid-cols-2 gap-3 pt-3">
                <a href="{{ route('contacto') }}"
                   class="inline-flex h-11 items-center justify-center rounded-full bg-emerald-600 px-4 text-sm font-bold text-white shadow-sm">
                    Contactar
                </a>

                <a href="{{ route('login') }}"
                   class="inline-flex h-11 items-center justify-center rounded-full border border-slate-200 bg-white px-4 text-sm font-bold text-slate-700 shadow-sm">
                    Login
                </a>
            </div>
        </nav>
    </div>
</header>

<main>
    {{ $slot }}
</main>

{{-- FOOTER --}}
<footer class="relative overflow-hidden border-t border-emerald-100 bg-gradient-to-b from-white to-[#f4f8f5]">
    <div class="absolute -left-24 top-10 h-56 w-56 rounded-full bg-emerald-100/50 blur-3xl"></div>
    <div class="absolute -right-24 bottom-0 h-56 w-56 rounded-full bg-emerald-50 blur-3xl"></div>

    <div class="relative max-w-6xl mx-auto px-4 md:px-6 py-8 md:py-14 grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-10">
        <div class="space-y-4">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-3">
                <img
                    src="{{ asset('images/logo-reino-zimbabwe.jpg') }}"
                    alt="Reino Zimbabwe"
                    class="h-12 w-auto object-contain"
                >

                <div class="leading-tight">
                    <p class="text-base font-black tracking-tight text-[#0d1b10]">
                        Reino Zimbabwe
                    </p>

                    <p class="text-[11px] uppercase tracking-[0.18em] text-slate-500">
                        Chihuahua Kennel
                    </p>
                </div>
            </a>

            <p class="max-w-xs text-sm text-slate-600 leading-relaxed">
                Crianza responsable de Chihuahua cabeza de manzana en Canarias, con ética,
                cuidado familiar y seguimiento cercano.
            </p>
        </div>

        <div class="space-y-4">
            <p class="text-sm font-black text-[#0d1b10]">
                Secciones
            </p>

            <div class="grid grid-cols-2 gap-3 text-sm">
                <a class="text-slate-600 transition hover:translate-x-1 hover:text-emerald-700" href="{{ route('home') }}">Inicio</a>
                <a class="text-slate-600 transition hover:translate-x-1 hover:text-emerald-700" href="{{ route('etica') }}">Ética</a>
                <a class="text-slate-600 transition hover:translate-x-1 hover:text-emerald-700" href="{{ route('cachorros.destacados') }}">Cachorros</a>
                <a class="text-slate-600 transition hover:translate-x-1 hover:text-emerald-700" href="{{ route('familia') }}">Nuestra familia</a>
                <a class="text-slate-600 transition hover:translate-x-1 hover:text-emerald-700" href="{{ route('testimonios') }}">Testimonios</a>
                <a class="text-slate-600 transition hover:translate-x-1 hover:text-emerald-700" href="{{ route('contacto') }}">Contacto</a>
            </div>
        </div>

        <div class="space-y-4">
            <p class="text-sm font-black text-[#0d1b10]">
                Contacto
            </p>

            <div class="space-y-3 text-sm text-slate-600">
                <p>¿Quieres información sobre próximas camadas?</p>

                <a href="{{ route('contacto') }}"
                   class="inline-flex items-center justify-center rounded-full bg-emerald-600 px-5 py-2.5 text-sm font-bold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-emerald-700 hover:shadow-md">
                    Contactar
                </a>

                <div class="pt-3 space-y-2">
                    <a href="#" class="block transition hover:text-emerald-700">Aviso legal</a>
                    <a href="#" class="block transition hover:text-emerald-700">Política de privacidad</a>
                </div>
            </div>
        </div>
    </div>

    <div class="relative border-t border-emerald-100/80">
        <div class="max-w-6xl mx-auto px-4 md:px-6 py-4 text-xs text-slate-500 flex flex-col md:flex-row gap-2 md:items-center md:justify-between">
            <span>© {{ date('Y') }} Reino Zimbabwe. Todos los derechos reservados.</span>
            <span class="text-slate-400">Diseñado y desarrollado con Laravel + Tailwind</span>
        </div>
    </div>
</footer>

</body>
</html>