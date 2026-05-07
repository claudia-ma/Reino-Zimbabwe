<x-layouts.public :title="'Testimonios — Reino Zimbabwe'">
    <section class="bg-gradient-to-b from-[#f4f7f5] to-white pt-6 md:pt-8 pb-12 md:pb-16">
        <div class="max-w-6xl mx-auto px-4 md:px-6">

            <div class="relative overflow-hidden rounded-[34px] bg-white border border-emerald-100 shadow-[0_22px_60px_rgba(15,23,42,0.10)] px-5 sm:px-8 md:px-10 py-10 md:py-12 space-y-10">
                <div class="absolute -top-24 -right-24 h-56 w-56 rounded-full bg-emerald-100/50 blur-3xl"></div>
                <div class="absolute -bottom-28 -left-20 h-56 w-56 rounded-full bg-emerald-50 blur-3xl"></div>

                {{-- CABECERA --}}
                <div class="relative text-center max-w-3xl mx-auto">
                    <p class="mb-3 text-xs font-extrabold uppercase tracking-[0.24em] text-emerald-700">
                        Familias Reino Zimbabwe
                    </p>

                    <h1 class="text-3xl md:text-5xl font-black tracking-tight text-[#0d1b10]">
                        Testimonios reales
                    </h1>

                    <p class="mt-4 text-sm md:text-base text-slate-600 leading-relaxed max-w-2xl mx-auto">
                        Opiniones publicadas por familias que ya han vivido la experiencia Reino Zimbabwe
                        y han encontrado un nuevo compañero para su hogar.
                    </p>
                </div>

                @if($testimonios->isEmpty())
                    {{-- ESTADO VACÍO --}}
                    <div class="relative max-w-3xl mx-auto rounded-[30px] border border-emerald-100 bg-gradient-to-br from-white to-emerald-50/50 p-7 md:p-9 text-center shadow-sm">
                        <div class="mx-auto mb-5 flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-100 text-2xl">
                            🐾
                        </div>

                        <h2 class="text-xl md:text-2xl font-black text-[#0d1b10]">
                            Aún no hay testimonios publicados
                        </h2>

                        <p class="mt-3 text-sm md:text-base text-slate-600 leading-relaxed max-w-xl mx-auto">
                            Si quieres información o unirte a la lista de espera, escríbenos y te atendemos encantados.
                        </p>

                        <a href="{{ route('contacto') }}"
                           class="mt-6 inline-flex items-center justify-center rounded-full bg-emerald-600 px-6 py-3 text-sm font-bold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-emerald-700 hover:shadow-md">
                            Ir a contacto
                        </a>
                    </div>
                @else

                    {{-- GRID --}}
                    <div class="relative grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($testimonios as $t)
                            @php
                                $stars = (int)($t->estrellas ?? 0);
                                $stars = max(0, min(5, $stars));
                                $iniciales = mb_strtoupper(mb_substr($t->nombre ?? 'RZ', 0, 2));
                            @endphp

                            <article class="group relative overflow-hidden rounded-[28px] bg-white border border-emerald-100 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_20px_45px_rgba(15,23,42,0.08)]">
                                <div class="absolute right-0 top-0 h-24 w-24 rounded-full bg-emerald-50 blur-2xl"></div>

                                <div class="relative p-6">
                                    <div class="flex items-start gap-4">
                                        {{-- FOTO / AVATAR --}}
                                        <div class="shrink-0">
                                            @if(!empty($t->foto_url))
                                                <img
                                                    src="{{ $t->foto_url }}"
                                                    alt="Foto de {{ $t->nombre }}"
                                                    class="h-14 w-14 rounded-2xl object-cover border border-emerald-100 shadow-sm"
                                                >
                                            @else
                                                <div class="h-14 w-14 rounded-2xl bg-[#0d1b10] text-white flex items-center justify-center font-black shadow-sm">
                                                    {{ $iniciales }}
                                                </div>
                                            @endif
                                        </div>

                                        <div class="min-w-0 flex-1">
                                            <div class="flex items-start justify-between gap-3">
                                                <div class="min-w-0">
                                                    <h3 class="font-black text-[#0d1b10] leading-tight truncate">
                                                        {{ $t->nombre }}
                                                    </h3>

                                                    @if(!empty($t->ubicacion))
                                                        <p class="text-xs text-slate-500 mt-1 truncate">
                                                            {{ $t->ubicacion }}
                                                        </p>
                                                    @endif
                                                </div>

                                                {{-- ESTRELLAS --}}
                                                <div class="flex items-center gap-1 shrink-0">
                                                    @for($i=1; $i<=5; $i++)
                                                        <svg class="w-4 h-4 {{ $i <= $stars ? 'text-amber-400' : 'text-slate-200' }}"
                                                             viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                                        </svg>
                                                    @endfor
                                                </div>
                                            </div>

                                            <div class="mt-4">
                                                <span class="inline-flex items-center gap-2 rounded-full bg-emerald-50 text-emerald-800 px-3 py-1 text-[11px] font-bold border border-emerald-100">
                                                    <span class="inline-block w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                                    Publicado
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="mt-6 text-sm text-slate-700 leading-relaxed">
                                        “{{ $t->mensaje }}”
                                    </p>

                                    <div class="mt-6 h-px bg-slate-100"></div>

                                    <div class="mt-4 flex items-center justify-between text-xs text-slate-500">
                                        <span>Reino Zimbabwe</span>
                                        <span>{{ optional($t->created_at)->format('d/m/Y') }}</span>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    {{-- PAGINACIÓN --}}
                    <div class="relative mt-10">
                        {{ $testimonios->links() }}
                    </div>

                @endif

                {{-- CTA FINAL --}}
                <div class="relative rounded-[30px] border border-emerald-100 bg-gradient-to-br from-emerald-50 to-white p-8 md:p-10 text-center shadow-sm">
                    <h2 class="text-2xl md:text-3xl font-black text-[#0d1b10]">
                        ¿Quieres formar parte de la familia?
                    </h2>

                    <p class="mt-4 text-sm md:text-base text-slate-600 leading-relaxed max-w-2xl mx-auto">
                        Escríbenos y te contamos disponibilidad, próximas camadas y cómo es el proceso.
                    </p>

                    <div class="mt-6 flex flex-col sm:flex-row gap-3 justify-center">
                        <a href="{{ route('contacto') }}"
                           class="inline-flex items-center justify-center rounded-full bg-emerald-600 px-6 py-3 text-sm font-bold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-emerald-700 hover:shadow-md">
                            Contactar
                        </a>

                        <a href="{{ route('cachorros.destacados') }}"
                           class="inline-flex items-center justify-center rounded-full border border-emerald-100 bg-white px-6 py-3 text-sm font-bold text-emerald-800 shadow-sm transition hover:-translate-y-0.5 hover:bg-emerald-50">
                            Ver cachorros
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>
</x-layouts.public>