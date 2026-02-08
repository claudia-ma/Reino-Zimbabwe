<x-layouts.public :title="'Reino Zimbabwe — Home'">

{{-- HERO CON FOTO DE FONDO --}}
<section class="pt-10 pb-16">
    <div class="max-w-6xl mx-auto px-4 md:px-6">
        <div
            class="relative overflow-hidden rounded-[32px] shadow-[0_30px_90px_rgba(15,23,42,0.55)] bg-black"
        >
            {{-- Fondo con foto del chihuahua --}}
            <div
                class="absolute inset-0 bg-cover bg-center"
                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCPsCChfwF_CmVOAlfeVW6ccb_8rQMv_-Uu0zjrfeS3uAk_R5e4qqvCEfGZQas83z09iAbbFyJEIaGjGd3CPHB3YduNbmL4np1JJNML16Z7SPlM_LQ4ONvNcAu0EBlojo_VpL3IF5HvWSH183Up8serYaTr-_oToJVHIOY52g0w8_KxKHf9JYORFwcKKrTv8hGO_ammYjLWcHb1UpjC18G64Wchh107y705uYI59tmWAgHa_Wf653Pm6GDqNDnWSvPoviloTWunaj8x");'
            ></div>

            {{-- Capa oscura para que se lea el texto --}}
            <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/70 to-black/40"></div>

            {{-- Contenido del hero --}}
            <div
                class="relative px-8 py-16 md:px-16 md:py-20 flex flex-col items-center text-center gap-6 text-white"
            >
                <p class="text-xs md:text-sm font-semibold tracking-[0.25em] uppercase text-emerald-300">
                    Criadero familiar en Islas Canarias
                </p>

                <h1 class="text-3xl md:text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight max-w-3xl">
                    Cría responsable de Chihuahua cabeza de manzana en Canarias
                </h1>

                <p class="max-w-2xl text-sm md:text-lg text-emerald-100">
                    Especializados en chihuahuas cabeza de manzana, criados en hogar y bien socializados,
                    listos para ser parte de tu familia.
                </p>

                <div class="mt-4 flex flex-col sm:flex-row gap-4">
                    <a
                        href="{{ route('cachorros.destacados') }}"
                        class="inline-flex items-center justify-center rounded-full h-11 md:h-12 px-6 md:px-8
                               bg-primary text-text-light font-bold text-sm md:text-base
                               shadow-[0_18px_45px_rgba(34,197,94,0.45)]
                               hover:brightness-110 hover:-translate-y-0.5 transition-all duration-200"
                    >
                        Ver camadas disponibles
                    </a>

                    <a
                        href="{{ route('contacto') }}"
                        class="inline-flex items-center justify-center rounded-full h-11 md:h-12 px-6 md:px-8
                               bg-white/5 border border-white/25 text-sm md:text-base font-semibold
                               text-white hover:bg-white/10 hover:-translate-y-0.5 transition-all duration-200"
                    >
                        Hablar con nosotros
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
        <div>
            <h2 class="text-xl md:text-2xl font-extrabold text-[#0d1b10]">
                Nuestra Filosofía
            </h2>
            <p class="mt-2 text-sm md:text-base text-slate-600 max-w-3xl">
                En Reino Zimbabwe, nuestra pasión es criar chihuahuas sanos, felices y bien socializados.
                Cada cachorro nace y crece en el corazón de nuestro hogar, recibiendo cuidados constantes
                y mucho amor, preparándolos para ser el compañero perfecto.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- Crianza Ética --}}
            <article
                class="flex flex-col gap-4 rounded-2xl bg-white border border-[#e7f3e9] shadow-sm p-6 hover:shadow-md transition">
                <div class="h-10 w-10 flex items-center justify-center rounded-full bg-[#d6f5e5] text-[#2bee4b]">
                    <span class="material-symbols-outlined">volunteer_activism</span>
                </div>
                <div>
                    <h3 class="text-base font-bold text-[#0d1b10]">Crianza Ética</h3>
                    <p class="mt-1 text-sm text-slate-600">
                        Criamos desde la pasión con calma, priorizando la salud y el bienestar de las mamás
                        y los cachorros.
                    </p>
                </div>
            </article>

            {{-- Salud Garantizada --}}
            <article
                class="flex flex-col gap-4 rounded-2xl bg-white border border-[#e7f3e9] shadow-sm p-6 hover:shadow-md transition">
                <div class="h-10 w-10 flex items-center justify-center rounded-full bg-[#d6f5e5] text-[#2bee4b]">
                    <span class="material-symbols-outlined text-xl">health_and_safety</span>
                </div>
                <div>
                    <h3 class="text-base font-bold text-[#0d1b10]">Salud Garantizada</h3>
                    <p class="mt-1 text-sm text-slate-600">
                        Seguimiento veterinario, vacunación al día y control parasitario estricto.
                    </p>
                </div>
            </article>

            {{-- Ambiente Familiar --}}
            <article
                class="flex flex-col gap-4 rounded-2xl bg-white border border-[#e7f3e9] shadow-sm p-6 hover:shadow-md transition">
                <div class="h-10 w-10 flex items-center justify-center rounded-full bg-[#d6f5e5] text-[#2bee4b]">
                    <span class="material-symbols-outlined text-xl">home</span>
                </div>
                <div>
                    <h3 class="text-base font-bold text-[#0d1b10]">Ambiente Familiar</h3>
                    <p class="mt-1 text-sm text-slate-600">
                        Socialización desde el primer día para asegurar un carácter equilibrado y cariñoso.
                    </p>
                </div>
            </article>

        </div>
    </section>

    {{-- NUESTROS CACHORROS --}}
    <section class="space-y-8">
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
                        :class="filtro==='todos' ? 'bg-[#e7f3e9] text-[#0d1b10]' : 'bg-white text-slate-600 border border-[#e7f3e9] hover:bg-[#f4fbf6]'">
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
                    x-transition.opacity.duration.200ms
                    class="group overflow-hidden rounded-2xl bg-white border border-[#e7f3e9] shadow-sm hover:shadow-md transition flex flex-col">
                    <div class="relative overflow-hidden">
                        <img
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuByLiAhHsprkQZ2EVg0GZWfuKpaLsiayYox3SpRh89wEYLQft_mXUU3NdpttslwSyhjwkIDTnvkdSOOJKnWZ0eMEuYJaFOrHGVKPlvvcGTs9Ccf993-CNW4y5nR0hxuJyfNlkJuJ5lLBww6ymzFpK-2GSFvm9-cyv2tQBHZ6aMkN5GI30hpM9sTlkRC0g1d7PqQ2-dJisOehMiobhumEPXVk5eIJnYTaMKkv559uyFJ-IvrHycHBAhqBA4_wF3sbE6LRUUn_fQ57lrJ"
                            alt="Toby — disponible"
                            class="h-48 w-full object-cover transition-transform duration-300 group-hover:scale-105">
                        <span class="absolute top-3 left-3 rounded-full bg-[#2bee4b] text-[#0d1b10] text-[11px] font-semibold px-3 py-1 shadow">
                            Disponible
                        </span>
                    </div>
                    <div class="px-4 py-3 space-y-1 text-sm">
                        <p class="font-semibold text-[#0d1b10]">Toby</p>
                        <p class="text-[11px] uppercase tracking-wide text-slate-500">Camada Bella x Coco</p>
                    </div>
                </article>

                {{-- Luna --}}
                <article
                    x-show="filtro === 'todos' || filtro === 'reservado_entregado'"
                    x-transition.opacity.duration.200ms
                    class="group overflow-hidden rounded-2xl bg-white border border-[#e7f3e9] shadow-sm hover:shadow-md transition flex flex-col">
                    <div class="relative overflow-hidden">
                        <img
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuDbXYu7DEzmyLDor2ZiL6rcw-OpYIHtNbcrW20NbB6KlwisPjV3EaWYHzO7sr4vtIn6ESudoeWFiSrGz_-ZF78-uO2-u5j-dlffp1dAjvCHJpDdUfbhDt1o0ayFzEYoD6DI0V-58NtWXqT3a-Rl8O1J9VDLYm1j5W8rewMgSo5byfymxOsqsi-sJrGC7bV1eXAsJPuyBbn9M9cFlRg0Pk6VGaZJAyKhOUJumNtqPqnT1YG0_L-Ft-X2I3mal6KVysDob42ucDlJyJdE"
                            alt="Luna — reservada"
                            class="h-48 w-full object-cover transition-transform duration-300 group-hover:scale-105">
                        <span class="absolute top-3 left-3 rounded-full bg-amber-300 text-slate-900 text-[11px] font-semibold px-3 py-1 shadow">
                            Reservada
                        </span>
                    </div>
                    <div class="px-4 py-3 space-y-1 text-sm">
                        <p class="font-semibold text-[#0d1b10]">Luna</p>
                        <p class="text-[11px] uppercase tracking-wide text-slate-500">Camada Zeus x Cleopatra</p>
                    </div>
                </article>

                {{-- Coco --}}
                <article
                    x-show="filtro === 'todos' || filtro === 'disponible'"
                    x-transition.opacity.duration.200ms
                    class="group overflow-hidden rounded-2xl bg-white border border-[#e7f3e9] shadow-sm hover:shadow-md transition flex flex-col">
                    <div class="relative overflow-hidden">
                        <img
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCs-zydjdb44qXew4I3GB14xFul9FSU6nfENISM70zlxIXvnVCXpbT4A3CKhmivmEIQ8nDnXPiEdoqz_5GO873QQ7D9GupZv1AEwFmk7F1D_EV5l2i_2vNoJkC6H2yJwSdAffJhEV8mlJfhAfaiTmcmLfhgdUDjoXDWTHNRCclFpfFlfCyO0RNXrIExEa7vsYeWTWCckVbvsYpg5q6XMmIuINg8p8shYgiKzycI86Jr9qVshtjZEMVRJeqP3dTBNxJWspRfJMiwsTEF"
                            alt="Coco — disponible"
                            class="h-48 w-full object-cover transition-transform duration-300 group-hover:scale-105">
                        <span class="absolute top-3 left-3 rounded-full bg-[#2bee4b] text-[#0d1b10] text-[11px] font-semibold px-3 py-1 shadow">
                            Disponible
                        </span>
                    </div>
                    <div class="px-4 py-3 space-y-1 text-sm">
                        <p class="font-semibold text-[#0d1b10]">Coco</p>
                        <p class="text-[11px] uppercase tracking-wide text-slate-500">Camada Bella x Coco</p>
                    </div>
                </article>

                {{-- Rocky --}}
                <article
                    x-show="filtro === 'todos' || filtro === 'reservado_entregado'"
                    x-transition.opacity.duration.200ms
                    class="group overflow-hidden rounded-2xl bg-white border border-[#e7f3e9] shadow-sm hover:shadow-md transition flex flex-col">
                    <div class="relative overflow-hidden">
                        <img
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuDRWK_pbtCOoFpPS2YH66BHUoHIgFdudizoZERl7JhQOW6ClBH9hdc31ER1ljkqBTvWdnvvVOzG_xNWG02Fpy1WjAf_Qi4wBrHZ9Bxa_xJywwhHWK9hS1HxAbRmHQs4PIltuvvb95mlnx7a9syZvwbrbtEM3SE66NyrWGvhA77tcY9YuzQy4flTmUbs3Ewbb4MidrKCKVtD4nTbJIx1n4Wz5aPS7rDdKqoMG0b1QRzsgKRyraOU6ZLH3ezF-d-PIoTUg56P8KnXipOJ"
                            alt="Rocky — entregado"
                            class="h-48 w-full object-cover transition-transform duration-300 group-hover:scale-105">
                        <span class="absolute top-3 left-3 rounded-full bg-slate-900/80 text-white text-[11px] font-semibold px-3 py-1 shadow">
                            Entregado
                        </span>
                    </div>
                    <div class="px-4 py-3 space-y-1 text-sm">
                        <p class="font-semibold text-[#0d1b10]">Rocky</p>
                        <p class="text-[11px] uppercase tracking-wide text-slate-500">Camada Ramsés x Cleopatra</p>
                    </div>
                </article>

            </div>
        </div>
    </section>

    {{-- HISTORIAS REALES --}}
    <section class="space-y-8 pb-4">
        <div class="text-center max-w-3xl mx-auto">
            <h2 class="text-xl md:text-2xl font-extrabold text-[#0d1b10]">
                Historias reales de familias Reino Zimbabwe
            </h2>
            <p class="mt-2 text-sm md:text-base text-slate-600">
                Algunos de los hogares que ya disfrutan de un cachorro criado por nosotros.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- Testimonio 1 --}}
            <article class="rounded-2xl bg-white border border-[#e7f3e9] shadow-sm p-6 flex flex-col justify-between">
                <p class="text-sm text-slate-700 leading-relaxed">
                    “No podríamos estar más felices con nuestro pequeño. Llegó sano, feliz y muy bien socializado.
                    El proceso con Reino Zimbabwe fue maravilloso de principio a fin.”
                </p>
                <div class="mt-4 flex items-center gap-3">
                    <div class="h-9 w-9 rounded-full bg-[#d6f5e5] flex items-center justify-center text-xs font-bold text-[#0d1b10]">
                        LG
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-[#0d1b10]">Laura G.</p>
                        <p class="text-xs text-slate-500">Dueña de Toby</p>
                    </div>
                </div>
            </article>

            {{-- Testimonio 2 --}}
            <article class="rounded-2xl bg-white border border-[#e7f3e9] shadow-sm p-6 flex flex-col justify-between">
                <p class="text-sm text-slate-700 leading-relaxed">
                    “Se nota el amor y la dedicación que ponen en cada cachorro. Nuestra perrita es un
                    encanto dentro de casa y con nuestra familia, con un carácter increíblemente noble.”
                </p>
                <div class="mt-4 flex items-center gap-3">
                    <div class="h-9 w-9 rounded-full bg-[#d6f5e5] flex items-center justify-center text-xs font-bold text-[#0d1b10]">
                        CM
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-[#0d1b10]">Carlos M.</p>
                        <p class="text-xs text-slate-500">Dueño de Luna</p>
                    </div>
                </div>
            </article>

            {{-- Testimonio 3 --}}
            <article class="rounded-2xl bg-white border border-[#e7f3e9] shadow-sm p-6 flex flex-col justify-between">
                <p class="text-sm text-slate-700 leading-relaxed">
                    “La mejor decisión que hemos tomado. Un criadero familiar y responsable que nos acompañó
                    en todo el proceso de adopción y adaptación. Se nota que aman lo que hacen.”
                </p>
                <div class="mt-4 flex items-center gap-3">
                    <div class="h-9 w-9 rounded-full bg-[#d6f5e5] flex items-center justify-center text-xs font-bold text-[#0d1b10]">
                        AR
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-[#0d1b10]">Ana R.</p>
                        <p class="text-xs text-slate-500">Dueña de Coco</p>
                    </div>
                </div>
            </article>
        </div>
    </section>

</div>

</x-layouts.public>