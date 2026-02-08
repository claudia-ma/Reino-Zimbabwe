<x-layouts.public :title="'Testimonios — Reino Zimbabwe'">
    <section class="bg-[#f1f3f4] py-10 md:py-14">
        <div class="max-w-6xl mx-auto px-4 md:px-6">

            {{-- CABECERA --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-black tracking-tight text-slate-900">
                    Testimonios reales 💚
                </h1>
                <p class="mt-3 text-sm md:text-base text-slate-600 max-w-2xl mx-auto">
                    Opiniones publicadas por familias que ya han vivido la experiencia Reino Zimbabwe.
                </p>
            </div>

            @if($testimonios->isEmpty())
                {{-- ESTADO VACÍO --}}
                <div class="rounded-3xl bg-white border border-slate-200 shadow-sm p-8 text-center">
                    <div class="text-4xl mb-3">🐾</div>
                    <h2 class="text-lg font-bold text-slate-900">Aún no hay testimonios publicados</h2>
                    <p class="text-sm text-slate-600 mt-2">
                        Si quieres información o unirte a lista de espera, escríbenos y te atendemos encantados.
                    </p>
                    <a href="{{ route('contacto') }}"
                       class="inline-flex mt-6 items-center justify-center rounded-full h-11 px-6 bg-emerald-600 text-white text-sm font-bold shadow-sm hover:bg-emerald-700 transition">
                        Ir a Contacto
                    </a>
                </div>
            @else

                {{-- GRID --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($testimonios as $t)
                        @php
                            $stars = (int)($t->estrellas ?? 0);
                            $stars = max(0, min(5, $stars));
                            $iniciales = mb_strtoupper(mb_substr($t->nombre ?? 'RZ', 0, 2));
                        @endphp

                        <article
                            class="rounded-3xl bg-white border border-slate-200 shadow-sm overflow-hidden hover:shadow-md transition">

                            {{-- HEADER --}}
                            <div class="p-6">
                                <div class="flex items-start gap-4">

                                    {{-- FOTO / AVATAR --}}
                                    <div class="shrink-0">
                                        @if(!empty($t->foto_url))
                                            <img
                                                src="{{ $t->foto_url }}"
                                                alt="Foto de {{ $t->nombre }}"
                                                class="h-14 w-14 rounded-2xl object-cover border border-slate-200"
                                            >
                                        @else
                                            <div
                                                class="h-14 w-14 rounded-2xl bg-slate-900 text-white flex items-center justify-center font-black">
                                                {{ $iniciales }}
                                            </div>
                                        @endif
                                    </div>

                                    {{-- TEXTO --}}
                                    <div class="min-w-0 flex-1">
                                        <div class="flex items-start justify-between gap-3">
                                            <div class="min-w-0">
                                                <h3 class="font-extrabold text-slate-900 leading-tight truncate">
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

                                        {{-- TAG --}}
                                        <div class="mt-4">
                                            <span
                                                class="inline-flex items-center gap-2 rounded-full bg-emerald-50 text-emerald-800 px-3 py-1 text-[11px] font-bold border border-emerald-100">
                                                <span class="inline-block w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                                Publicado
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                {{-- MENSAJE --}}
                                <p class="mt-5 text-sm text-slate-700 leading-relaxed">
                                    “{{ $t->mensaje }}”
                                </p>
                            </div>

                            {{-- FOOTER --}}
                            <div class="px-6 pb-6">
                                <div class="h-px bg-slate-100 mb-4"></div>

                                <div class="flex items-center justify-between text-xs text-slate-500">
                                    <span>Reino Zimbabwe</span>
                                    <span>{{ optional($t->created_at)->format('d/m/Y') }}</span>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                {{-- PAGINACIÓN --}}
                <div class="mt-10">
                    {{ $testimonios->links() }}
                </div>

            @endif

            {{-- CTA FINAL --}}
            <div class="mt-12 rounded-3xl border border-emerald-100 bg-emerald-50 p-8 md:p-10 text-center">
                <h2 class="text-xl md:text-2xl font-black text-slate-900">
                    ¿Quieres formar parte de la familia?
                </h2>
                <p class="mt-2 text-sm md:text-base text-slate-600 max-w-2xl mx-auto">
                    Escríbenos y te contamos disponibilidad, próximas camadas y cómo es el proceso.
                </p>

                <div class="mt-6 flex flex-col sm:flex-row gap-3 justify-center">
                    <a href="{{ route('contacto') }}"
                       class="inline-flex items-center justify-center rounded-full h-11 px-6 bg-emerald-600 text-white text-sm font-bold shadow-sm hover:bg-emerald-700 transition">
                        Contactar
                    </a>
                    <a href="{{ route('cachorros.destacados') }}"
                       class="inline-flex items-center justify-center rounded-full h-11 px-6 bg-white border border-slate-200 text-slate-800 text-sm font-bold hover:bg-slate-50 transition">
                        Ver cachorros
                    </a>
                </div>
            </div>

        </div>
    </section>
</x-layouts.public>