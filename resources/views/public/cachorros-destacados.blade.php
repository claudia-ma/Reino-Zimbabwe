<x-layouts.public :title="'Cachorros Destacados — Reino Zimbabwe'">

<section class="bg-gradient-to-b from-[#f4f7f5] to-white py-12 md:py-16">
    <div class="max-w-6xl mx-auto px-4 md:px-6">

        <div class="relative overflow-hidden rounded-[34px] bg-white border border-emerald-100 shadow-[0_22px_60px_rgba(15,23,42,0.10)] px-5 sm:px-8 md:px-10 py-10 md:py-12 space-y-10">

            <div class="absolute -top-24 -right-24 h-56 w-56 rounded-full bg-emerald-100/50 blur-3xl"></div>
            <div class="absolute -bottom-28 -left-20 h-56 w-56 rounded-full bg-emerald-50 blur-3xl"></div>

            {{-- TÍTULO --}}
            <div class="relative text-center max-w-3xl mx-auto">
                <p class="mb-3 text-xs font-extrabold uppercase tracking-[0.24em] text-emerald-700">
                    Cachorros Reino Zimbabwe
                </p>

                <h1 class="text-3xl md:text-5xl font-black tracking-tight text-[#0d1b10]">
                    Cachorros destacados
                </h1>

                <p class="mt-4 text-sm md:text-base text-slate-600 leading-relaxed max-w-2xl mx-auto">
                    Chihuahuas cabeza de manzana criados en un entorno familiar, con seguimiento,
                    socialización temprana y mucho cariño desde sus primeros días.
                </p>
            </div>

            {{-- CHIPS --}}
            <div class="relative flex flex-wrap justify-center gap-3">
                <span class="inline-flex items-center gap-2 rounded-full bg-emerald-50 border border-emerald-100 px-4 py-2 text-xs md:text-sm font-bold text-emerald-800">
                    <span class="h-2 w-2 rounded-full bg-emerald-600"></span>
                    Disponibles
                </span>

                <span class="inline-flex items-center gap-2 rounded-full bg-amber-50 border border-amber-100 px-4 py-2 text-xs md:text-sm font-bold text-amber-800">
                    <span class="h-2 w-2 rounded-full bg-amber-500"></span>
                    Reservados
                </span>

                <span class="inline-flex items-center gap-2 rounded-full bg-slate-50 border border-slate-200 px-4 py-2 text-xs md:text-sm font-bold text-slate-600">
                    <span class="h-2 w-2 rounded-full bg-slate-500"></span>
                    Entregados
                </span>
            </div>

            {{-- GRID DINÁMICA --}}
            <div class="relative">
                @if($cachorros->isEmpty())
                    <div class="max-w-3xl mx-auto rounded-[30px] border border-emerald-100 bg-gradient-to-br from-white to-emerald-50/50 p-7 md:p-9 text-center shadow-sm">
                        <div class="mx-auto mb-5 flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-100 text-2xl">
                            🐾
                        </div>

                        <h2 class="text-xl md:text-2xl font-black text-[#0d1b10]">
                            Próximas camadas en camino
                        </h2>

                        <p class="mt-3 text-sm md:text-base text-slate-600 leading-relaxed max-w-xl mx-auto">
                            Actualmente no tenemos cachorros destacados disponibles, pero puedes unirte
                            a nuestra lista prioritaria y te avisaremos cuando haya nuevas camadas.
                        </p>

                        <a href="{{ route('contacto') }}"
                           class="mt-6 inline-flex items-center justify-center rounded-full bg-emerald-600 px-6 py-3 text-sm font-bold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-emerald-700 hover:shadow-md">
                            Unirme a la lista de espera
                        </a>
                    </div>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-7">
                        @foreach($cachorros as $c)
                            <article class="group overflow-hidden rounded-[28px] border border-emerald-100 bg-white shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_20px_45px_rgba(15,23,42,0.08)]">

                                <div class="relative overflow-hidden">
                                    <div
                                        class="h-64 w-full bg-cover bg-center transition-transform duration-500 group-hover:scale-[1.05]"
                                        style='background-image:url("https://placehold.co/600x800?text={{ urlencode($c->nombre) }}");'>
                                    </div>

                                    <span
                                        class="absolute left-4 top-4 inline-flex items-center rounded-full px-3 py-1 text-[11px] font-bold shadow-sm
                                        @if($c->estado === 'disponible') bg-emerald-50 text-emerald-800 border border-emerald-100
                                        @elseif($c->estado === 'reservado') bg-amber-50 text-amber-800 border border-amber-100
                                        @else bg-slate-50 text-slate-600 border border-slate-200 @endif">
                                        {{ ucfirst($c->estado) }}
                                    </span>
                                </div>

                                <div class="p-5">
                                    <p class="text-lg font-black text-[#0d1b10]">
                                        {{ $c->nombre }}
                                    </p>

                                    <p class="mt-2 text-xs font-semibold uppercase tracking-[0.14em] text-emerald-700">
                                        {{ $c->sexo ? ucfirst($c->sexo) : 'Sexo no indicado' }} · {{ $c->color ?? 'Color no indicado' }}
                                    </p>

                                    <p class="mt-2 text-sm text-slate-500">
                                        Camada {{ $c->camada?->nombre ?? 'por confirmar' }}
                                    </p>

                                    @if($c->video_url)
                                        <a href="{{ $c->video_url }}" target="_blank" rel="noopener noreferrer"
                                           class="mt-4 inline-flex text-sm font-bold text-emerald-700 hover:text-emerald-900">
                                            Ver vídeo →
                                        </a>
                                    @endif
                                </div>
                            </article>
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- BLOQUE PRÓXIMAS CAMADAS --}}
            <div class="relative rounded-[30px] border border-emerald-100 bg-[#f9fbfa] p-6 md:p-8 shadow-sm">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                    <div class="max-w-2xl">
                        <div class="flex flex-wrap items-center gap-3">
                            <h3 class="text-xl md:text-2xl font-black text-[#0d1b10]">
                                Próximas camadas
                            </h3>

                            <span class="inline-flex items-center rounded-full bg-emerald-50 border border-emerald-100 px-3 py-1 text-[11px] font-bold text-emerald-800">
                                Previstas próximamente
                            </span>
                        </div>

                        <p class="mt-3 text-sm md:text-base text-slate-600 leading-relaxed">
                            Contacta con nosotros para recibir información sobre próximas camadas,
                            disponibilidad y proceso de reserva responsable.
                        </p>
                    </div>

                    <a href="{{ route('contacto') }}"
                       class="inline-flex items-center justify-center rounded-full bg-emerald-600 px-6 py-3 text-sm font-bold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-emerald-700 hover:shadow-md">
                        Contactar
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

</x-layouts.public>