<x-layouts.public :title="'Reino Zimbabwe — Home'">
    
{{-- HERO CON FOTO DE FONDO --}}
<section class="pt-8 pb-16">
    <div class="max-w-6xl mx-auto px-4 md:px-6">
        <div
            class="relative overflow-hidden rounded-[32px] shadow-[0_30px_90px_rgba(15,23,42,0.38)] bg-black"
        >
            {{-- Fondo con foto del chihuahua --}}
            <div
                class="absolute inset-0 bg-cover bg-top scale-105"
                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCPsCChfwF_CmVOAlfeVW6ccb_8rQMv_-Uu0zjrfeS3uAk_R5e4qqvCEfGZQas83z09iAbbFyJEIaGjGd3CPHB3YduNbmL4np1JJNML16Z7SPlM_LQ4ONvNcAu0EBlojo_VpL3IF5HvWSH183Up8serYaTr-_oToJVHIOY52g0w8_KxKHf9JYORFwcKKrTv8hGO_ammYjLWcHb1UpjC18G64Wchh107y705uYI59tmWAgHa_Wf653Pm6GDqNDnWSvPoviloTWunaj8x");'
            ></div>

            {{-- Capa oscura más suave --}}
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/50 to-black/20"></div>
            <div class="absolute inset-0 bg-emerald-950/10"></div>

            {{-- Contenido del hero --}}
            <div
                class="relative px-8 pt-14 pb-28 md:px-16 md:pt-16 md:pb-32 flex flex-col items-center text-center gap-6 text-white"
            >
                <p class="text-xs md:text-sm font-semibold tracking-[0.25em] uppercase text-white/90">
                    Criadero familiar en Islas Canarias
                </p>

                <h1 class="text-2xl md:text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight max-w-3xl">
                    Chihuahuas cabeza de manzana criados con ética y amor
                </h1>

                <p class="max-w-xl text-sm md:text-lg text-white/85 leading-relaxed">
                    Especializados en chihuahuas sanos, equilibrados y socializados en un entorno familiar,
                    listos para formar parte de tu hogar.
                </p>

                <div class="mt-4 flex flex-col sm:flex-row items-center gap-4">

    <a
        href="{{ route('cachorros.destacados') }}"
        class="inline-flex items-center justify-center rounded-full h-11 md:h-12 px-6 md:px-8
               bg-primary text-text-light font-bold text-sm md:text-base
               shadow-[0_18px_45px_rgba(34,197,94,0.45)]
               hover:brightness-110 hover:-translate-y-0.5 transition-all duration-200"
    >
        Ver cachorros disponibles
    </a>

    <a
        href="{{ route('contacto') }}"
        class="inline-flex items-center justify-center rounded-full h-11 md:h-12 px-6 md:px-8
               bg-white/5 border border-white/15
               text-sm md:text-base font-semibold text-white
               hover:bg-white/10 hover:-translate-y-0.5
               transition-all duration-200"
    >

        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-5 h-5 mr-2"
             fill="currentColor"
             viewBox="0 0 24 24">

            <path d="M20.52 3.48A11.79 11.79 0 0 0 12.04 0C5.5 0 .16 5.34.16 11.88c0 2.1.55 4.15 1.6 5.97L0 24l6.33-1.66a11.8 11.8 0 0 0 5.71 1.46h.01c6.54 0 11.88-5.34 11.88-11.88 0-3.17-1.24-6.14-3.41-8.44zM12.05 21.7a9.8 9.8 0 0 1-5-1.37l-.36-.21-3.76.99 1-3.67-.24-.38a9.78 9.78 0 0 1-1.5-5.18c0-5.43 4.42-9.85 9.86-9.85 2.63 0 5.1 1.02 6.96 2.89a9.77 9.77 0 0 1 2.88 6.96c0 5.44-4.42 9.86-9.84 9.86zm5.4-7.36c-.3-.15-1.77-.87-2.04-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.95 1.17-.17.2-.35.22-.65.07-.3-.15-1.27-.47-2.42-1.5-.9-.8-1.5-1.8-1.67-2.1-.18-.3-.02-.46.13-.6.13-.13.3-.35.45-.52.15-.18.2-.3.3-.5.1-.2.05-.37-.02-.52-.08-.15-.67-1.62-.92-2.22-.24-.58-.48-.5-.67-.5h-.57c-.2 0-.52.07-.8.37-.27.3-1.05 1.02-1.05 2.5 0 1.47 1.07 2.9 1.22 3.1.15.2 2.1 3.2 5.08 4.48.7.3 1.25.48 1.67.62.7.22 1.34.19 1.85.12.56-.08 1.77-.72 2.02-1.42.25-.7.25-1.3.17-1.42-.07-.12-.27-.2-.57-.35z"/>
        </svg>

        <span>Contactar por WhatsApp</span>

    </a>

</div>
            </div>
        </div>
    </div>
</section>

{{-- CONTENIDO PRINCIPAL (misma anchura que la home) --}}
<div class="max-w-6xl mx-auto px-4 md:px-6 pb-16 space-y-16">

    {{-- NUESTRA FILOSOFÍA --}}
<section class="space-y-8">
    <div class="max-w-3xl">
        <p class="mb-3 text-xs font-extrabold uppercase tracking-[0.24em] text-emerald-700">
            Cuidado, ética y hogar
        </p>

        <h2 class="text-2xl md:text-4xl font-extrabold text-[#0d1b10] tracking-tight">
            Nuestra Filosofía
        </h2>

        <p class="mt-4 text-sm md:text-base text-slate-600 leading-relaxed">
            En Reino Zimbabwe criamos chihuahuas desde el respeto, la calma y el amor por la raza.
            Cada cachorro crece en un entorno familiar, acompañado desde sus primeros días para
            desarrollarse sano, seguro y preparado para formar parte de un nuevo hogar.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <article class="group relative overflow-hidden rounded-[28px] bg-white border border-emerald-100 p-7 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_20px_45px_rgba(15,23,42,0.09)]">
            <div class="absolute -right-8 -top-8 h-24 w-24 rounded-full bg-emerald-50 transition-transform duration-300 group-hover:scale-125"></div>

            <div class="relative mb-6 flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-100 text-xl text-emerald-700 transition-transform duration-300 group-hover:scale-110">
                🌿
            </div>

            <h3 class="relative text-base font-extrabold text-[#0d1b10]">
                Crianza Ética
            </h3>

            <p class="relative mt-3 text-sm text-slate-600 leading-relaxed">
                Priorizamos el bienestar, los tiempos naturales y el cuidado responsable de cada mamá y cada cachorro.
            </p>
        </article>

        <article class="group relative overflow-hidden rounded-[28px] bg-white border border-emerald-100 p-7 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_20px_45px_rgba(15,23,42,0.09)]">
            <div class="absolute -right-8 -top-8 h-24 w-24 rounded-full bg-emerald-50 transition-transform duration-300 group-hover:scale-125"></div>

            <div class="relative mb-6 flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-100 text-xl text-emerald-700 transition-transform duration-300 group-hover:scale-110">
                🛡️
            </div>

            <h3 class="relative text-base font-extrabold text-[#0d1b10]">
                Salud Garantizada
            </h3>

            <p class="relative mt-3 text-sm text-slate-600 leading-relaxed">
                Seguimiento veterinario, vacunación al día y control sanitario para asegurar un crecimiento sano.
            </p>
        </article>

        <article class="group relative overflow-hidden rounded-[28px] bg-white border border-emerald-100 p-7 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_20px_45px_rgba(15,23,42,0.09)]">
            <div class="absolute -right-8 -top-8 h-24 w-24 rounded-full bg-emerald-50 transition-transform duration-300 group-hover:scale-125"></div>

            <div class="relative mb-6 flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-100 text-xl text-emerald-700 transition-transform duration-300 group-hover:scale-110">
                🏡
            </div>

            <h3 class="relative text-base font-extrabold text-[#0d1b10]">
                Ambiente Familiar
            </h3>

            <p class="relative mt-3 text-sm text-slate-600 leading-relaxed">
                Los cachorros conviven en casa desde pequeños para ganar confianza, seguridad y buen carácter.
            </p>
        </article>
    </div>
</section>

{{-- NUESTROS CACHORROS --}}
<section class="space-y-6 mt-10 md:mt-12">
    <div x-data="{ filtro: 'todos' }" class="space-y-6">
        {{-- CABECERA + FILTROS --}}
        <div class="flex flex-wrap items-center justify-between gap-4">
            <h2 class="text-xl md:text-2xl font-extrabold text-[#0d1b10]">
                Nuestros Cachorros
            </h2>
            <div class="flex flex-wrap items-center gap-2 text-xs">
                <button
                    type="button"
                    @click="filtro='todos'"
                    class="inline-flex items-center justify-center rounded-full px-3 py-1 font-medium transition"
                    :class="filtro==='todos' 
                    ? 'bg-[#0d1b10] text-white shadow-sm border border-[#0d1b10]' 
                    : 'bg-white text-slate-600 border border-[#e7f3e9] hover:bg-[#f4fbf6]'">
                    Todos
                </button>
                <button
                    type="button"
                    @click="filtro='disponible'"
                    class="inline-flex items-center justify-center rounded-full px-3 py-1 font-medium transition"
                    :class="filtro==='disponible' ? 'bg-[#e7f3e9] text-[#0d1b10]' : 'bg-white text-slate-600 border border-[#e7f3e9] hover:bg-[#f4fbf6]'">
                    Disponibles
                </button>
                <button
                    type="button"
                    @click="filtro='reservado_entregado'"
                    class="inline-flex items-center justify-center rounded-full px-3 py-1 font-medium transition"
                    :class="filtro==='reservado_entregado' ? 'bg-[#e7f3e9] text-[#0d1b10]' : 'bg-white text-slate-600 border border-[#e7f3e9] hover:bg-[#f4fbf6]'">
                    Reservados / Entregados
                </button>
            </div>
        </div>
        {{-- GRID --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            {{-- Toby --}}
            <article
                x-show="filtro === 'todos' || filtro === 'disponible'"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-2"
                x-transition:enter-end="opacity-100 translate-y-0"
                class="group overflow-hidden rounded-[24px] bg-white border border-[#e7f3e9] shadow-sm hover:shadow-[0_20px_45px_rgba(15,23,42,0.12)] hover:-translate-y-2 hover:border-[#d7eadb] transition-all duration-300 flex flex-col">
                <div class="relative overflow-hidden">
                    <img
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuByLiAhHsprkQZ2EVg0GZWfuKpaLsiayYox3SpRh89wEYLQft_mXUU3NdpttslwSyhjwkIDTnvkdSOOJKnWZ0eMEuYJaFOrHGVKPlvvcGTs9Ccf993-CNW4y5nR0hxuJyfNlkJuJ5lLBww6ymzFpK-2GSFvm9-cyv2tQBHZ6aMkN5GI30hpM9sTlkRC0g1d7PqQ2-dJisOehMiobhumEPXVk5eIJnYTaMKkv559uyFJ-IvrHycHBAhqBA4_wF3sbE6LRUUn_fQ57lrJ"
                        alt="Toby — disponible"
                        class="h-56 w-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <span class="absolute top-3 left-3 rounded-full bg-emerald-100 text-emerald-800 text-[11px] font-bold px-3 py-1 shadow-sm border border-emerald-200">
                        Disponible
                    </span>
                </div>
                <div class="px-5 py-4 space-y-1.5 text-sm">
                    <p class="font-semibold text-[#0d1b10]">Toby</p>
                    <p class="text-[11px] uppercase tracking-wide text-slate-500">Camada Bella x Coco</p>
                </div>
            </article>
            {{-- Luna --}}
            <article
                x-show="filtro === 'todos' || filtro === 'reservado_entregado'"
                x-transition.opacity.duration.200ms
                class="group overflow-hidden rounded-[24px] bg-white border border-[#e7f3e9] shadow-sm hover:shadow-[0_20px_45px_rgba(15,23,42,0.12)] hover:-translate-y-1 transition-all duration-300 flex flex-col">
                <div class="relative overflow-hidden">
                    <img
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDbXYu7DEzmyLDor2ZiL6rcw-OpYIHtNbcrW20NbB6KlwisPjV3EaWYHzO7sr4vtIn6ESudoeWFiSrGz_-ZF78-uO2-u5j-dlffp1dAjvCHJpDdUfbhDt1o0ayFzEYoD6DI0V-58NtWXqT3a-Rl8O1J9VDLYm1j5W8rewMgSo5byfymxOsqsi-sJrGC7bV1eXAsJPuyBbn9M9cFlRg0Pk6VGaZJAyKhOUJumNtqPqnT1YG0_L-Ft-X2I3mal6KVysDob42ucDlJyJdE"
                        alt="Luna — reservada"
                        class="h-56 w-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <span class="absolute top-3 left-3 rounded-full bg-amber-100 text-amber-800 text-[11px] font-bold px-3 py-1 shadow-sm border border-amber-200">
                        Reservada
                    </span>
                </div>
                <div class="px-5 py-4 space-y-1.5 text-sm">
                    <p class="font-semibold text-[#0d1b10]">Luna</p>
                    <p class="text-[11px] uppercase tracking-wide text-slate-500">Camada Zeus x Cleopatra</p>
                </div>
            </article>
            {{-- Coco --}}
            <article
                x-show="filtro === 'todos' || filtro === 'disponible'"
                x-transition.opacity.duration.200ms
                class="group overflow-hidden rounded-[24px] bg-white border border-[#e7f3e9] shadow-sm hover:shadow-[0_20px_45px_rgba(15,23,42,0.12)] hover:-translate-y-1 transition-all duration-300 flex flex-col">
                <div class="relative overflow-hidden">
                    <img
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCs-zydjdb44qXew4I3GB14xFul9FSU6nfENISM70zlxIXvnVCXpbT4A3CKhmivmEIQ8nDnXPiEdoqz_5GO873QQ7D9GupZv1AEwFmk7F1D_EV5l2i_2vNoJkC6H2yJwSdAffJhEV8mlJfhAfaiTmcmLfhgdUDjoXDWTHNRCclFpfFlfCyO0RNXrIExEa7vsYeWTWCckVbvsYpg5q6XMmIuINg8p8shYgiKzycI86Jr9qVshtjZEMVRJeqP3dTBNxJWspRfJMiwsTEF"
                        alt="Coco — disponible"
                        class="h-56 w-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <span class="absolute top-3 left-3 rounded-full bg-emerald-100 text-emerald-800 text-[11px] font-bold px-3 py-1 shadow-sm border border-emerald-200">
                        Disponible
                    </span>
                </div>
                <div class="px-5 py-4 space-y-1.5 text-sm">
                    <p class="font-semibold text-[#0d1b10]">Coco</p>
                    <p class="text-[11px] uppercase tracking-wide text-slate-500">Camada Bella x Coco</p>
                </div>
            </article>
            {{-- Rocky --}}
            <article
                x-show="filtro === 'todos' || filtro === 'reservado_entregado'"
                x-transition.opacity.duration.200ms
                class="group overflow-hidden rounded-[24px] bg-white border border-[#e7f3e9] shadow-sm hover:shadow-[0_20px_45px_rgba(15,23,42,0.12)] hover:-translate-y-1 transition-all duration-300 flex flex-col">
                <div class="relative overflow-hidden">
                    <img
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDRWK_pbtCOoFpPS2YH66BHUoHIgFdudizoZERl7JhQOW6ClBH9hdc31ER1ljkqBTvWdnvvVOzG_xNWG02Fpy1WjAf_Qi4wBrHZ9Bxa_xJywwhHWK9hS1HxAbRmHQs4PIltuvvb95mlnx7a9syZvwbrbtEM3SE66NyrWGvhA77tcY9YuzQy4flTmUbs3Ewbb4MidrKCKVtD4nTbJIx1n4Wz5aPS7rDdKqoMG0b1QRzsgKRyraOU6ZLH3ezF-d-PIoTUg56P8KnXipOJ"
                        alt="Rocky — entregado"
                        class="h-56 w-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <span class="absolute top-3 left-3 rounded-full bg-slate-900/85 text-white text-[11px] font-bold px-3 py-1 shadow-sm border border-white/10">
                        Entregado
                    </span>
                </div>
                <div class="px-5 py-4 space-y-1.5 text-sm">
                    <p class="font-semibold text-[#0d1b10]">Rocky</p>
                    <p class="text-[11px] uppercase tracking-wide text-slate-500">Camada Ramsés x Cleopatra</p>
                </div>
            </article>
        </div>
    </div>
</section>

    {{-- HISTORIAS REALES --}}
<section class="space-y-10 pb-20 pt-10">
    <div class="max-w-3xl mx-auto text-center">
        <p class="mb-3 text-xs font-extrabold uppercase tracking-[0.24em] text-emerald-700">
            Familias Reino Zimbabwe
        </p>

        <h2 class="text-2xl md:text-4xl font-extrabold text-[#0d1b10] tracking-tight">
            Historias reales
        </h2>

        <p class="mt-4 text-sm md:text-base text-slate-600 leading-relaxed">
            Familias que confiaron en nosotros para encontrar un compañero sano, equilibrado
            y criado en un entorno lleno de amor.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        {{-- Testimonio 1 --}}
        <article class="group relative overflow-hidden rounded-[28px] border border-emerald-100 bg-white p-7 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_20px_45px_rgba(15,23,42,0.08)]">
            <div class="absolute right-0 top-0 h-24 w-24 rounded-full bg-emerald-50 blur-2xl"></div>

            <div class="relative flex items-center gap-1 text-amber-400 text-sm">
                ★ ★ ★ ★ ★
            </div>

            <p class="relative mt-5 text-sm leading-relaxed text-slate-700">
                “No podríamos estar más felices con nuestro pequeño. Llegó sano, feliz y muy bien socializado.
                El proceso con Reino Zimbabwe fue maravilloso de principio a fin.”
            </p>

            <div class="relative mt-6 flex items-center gap-3 border-t border-slate-100 pt-4">
                <div class="flex h-11 w-11 items-center justify-center rounded-full bg-emerald-100 text-xs font-bold text-[#0d1b10]">
                    LG
                </div>

                <div>
                    <p class="text-sm font-bold text-[#0d1b10]">
                        Laura G.
                    </p>

                    <p class="text-xs text-slate-500">
                        Dueña de Toby
                    </p>
                </div>
            </div>
        </article>

        {{-- Testimonio 2 --}}
        <article class="group relative overflow-hidden rounded-[28px] border border-emerald-100 bg-white p-7 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_20px_45px_rgba(15,23,42,0.08)]">
            <div class="absolute right-0 top-0 h-24 w-24 rounded-full bg-emerald-50 blur-2xl"></div>

            <div class="relative flex items-center gap-1 text-amber-400 text-sm">
                ★ ★ ★ ★ ★
            </div>

            <p class="relative mt-5 text-sm leading-relaxed text-slate-700">
                “Se nota el amor y la dedicación que ponen en cada cachorro. Nuestra perrita es un encanto
                dentro de casa y con nuestra familia, con un carácter increíblemente noble.”
            </p>

            <div class="relative mt-6 flex items-center gap-3 border-t border-slate-100 pt-4">
                <div class="flex h-11 w-11 items-center justify-center rounded-full bg-emerald-100 text-xs font-bold text-[#0d1b10]">
                    CM
                </div>

                <div>
                    <p class="text-sm font-bold text-[#0d1b10]">
                        Carlos M.
                    </p>

                    <p class="text-xs text-slate-500">
                        Dueño de Luna
                    </p>
                </div>
            </div>
        </article>

        {{-- Testimonio 3 --}}
        <article class="group relative overflow-hidden rounded-[28px] border border-emerald-100 bg-white p-7 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_20px_45px_rgba(15,23,42,0.08)]">
            <div class="absolute right-0 top-0 h-24 w-24 rounded-full bg-emerald-50 blur-2xl"></div>

            <div class="relative flex items-center gap-1 text-amber-400 text-sm">
                ★ ★ ★ ★ ★
            </div>

            <p class="relative mt-5 text-sm leading-relaxed text-slate-700">
                “La mejor decisión que hemos tomado. Un criadero familiar y responsable que nos acompañó
                en todo el proceso de adaptación. Se nota que aman profundamente lo que hacen.”
            </p>

            <div class="relative mt-6 flex items-center gap-3 border-t border-slate-100 pt-4">
                <div class="flex h-11 w-11 items-center justify-center rounded-full bg-emerald-100 text-xs font-bold text-[#0d1b10]">
                    AR
                </div>

                <div>
                    <p class="text-sm font-bold text-[#0d1b10]">
                        Ana R.
                    </p>

                    <p class="text-xs text-slate-500">
                        Dueña de Coco
                    </p>
                </div>
            </div>
        </article>

    </div>
</section>

</div>

</x-layouts.public>