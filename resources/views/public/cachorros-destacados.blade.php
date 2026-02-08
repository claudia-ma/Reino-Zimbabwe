<x-layouts.public :title="'Cachorros Destacados — Reino Zimbabwe'">

<section class="bg-[#f1f3f4] py-10 md:py-14">
  <div class="max-w-6xl mx-auto px-4 md:px-6">

    {{-- CONTENEDOR PRINCIPAL --}}
    <div
      class="rounded-[32px] bg-white border border-[#e3ece4] shadow-[0_18px_45px_rgba(15,23,42,0.12)] px-4 sm:px-6 md:px-10 pt-10 pb-12 space-y-10">

      {{-- TÍTULO --}}
      <div class="text-center space-y-3">
        <h1 class="text-3xl md:text-4xl font-black tracking-tight text-slate-900">
          Cachorros Destacados
        </h1>
        <p class="text-sm md:text-base text-[#6da476] max-w-xl mx-auto">
          Descubre la alegría y belleza de nuestros chihuahuas cabeza de manzana criados con amor.
        </p>
      </div>

      {{-- CHIPS --}}
      <div class="flex flex-wrap justify-center gap-3">
        <span class="inline-flex items-center gap-2 rounded-full bg-[#e1f8dc] px-4 py-1.5 text-xs md:text-sm font-semibold text-[#1a3b22]">
          ● Disponibles
        </span>
        <span class="inline-flex items-center gap-2 rounded-full bg-[#ffe9a9] px-4 py-1.5 text-xs md:text-sm font-semibold text-[#5b4a18]">
          ● Reservados
        </span>
        <span class="inline-flex items-center gap-2 rounded-full bg-[#eceff1] px-4 py-1.5 text-xs md:text-sm font-semibold text-[#4b5563]">
          ● Entregados
        </span>
      </div>

      {{-- GRID DINÁMICA --}}
      @if($cachorros->isEmpty())
        <div class="text-center py-10 text-slate-600">
          Actualmente no hay cachorros destacados disponibles.
          Puedes contactarnos para unirte a la lista de espera.
        </div>
      @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-7">
          @foreach($cachorros as $c)
            <article
              class="group overflow-hidden rounded-3xl border border-[#e3ece4] bg-[#f9fbfa] shadow-sm transition-shadow duration-300 hover:shadow-lg">

              <div class="relative overflow-hidden rounded-t-3xl">
                {{-- Imagen (placeholder si no tienes fotos aún) --}}
                <div
                  class="h-60 w-full bg-cover bg-center transition-transform duration-500 group-hover:scale-[1.05]"
                  style='background-image:url("https://placehold.co/600x800?text={{ urlencode($c->nombre) }}");'>
                </div>

                {{-- Estado --}}
                <span
                  class="absolute left-4 top-4 inline-flex items-center rounded-full px-3 py-0.5 text-[11px] font-semibold shadow-sm
                  @if($c->estado === 'disponible') bg-[#e1f8dc] text-[#14532d]
                  @elseif($c->estado === 'reservado') bg-[#fff2bf] text-[#854d0e]
                  @else bg-[#eceff1] text-[#4b5563] @endif">
                  {{ ucfirst($c->estado) }}
                </span>
              </div>

              <div class="px-5 py-4 space-y-1.5">
                <p class="text-base font-semibold text-slate-900">{{ $c->nombre }}</p>

                <p class="text-[11px] text-[#6da476]">
                  Sexo: {{ $c->sexo ? ucfirst($c->sexo) : '—' }} · Color: {{ $c->color ?? '—' }}
                </p>

                <p class="text-xs text-[#9ca3af]">
                  Camada: {{ $c->camada?->nombre ?? '—' }}
                </p>

                @if($c->video_url)
                  <a href="{{ $c->video_url }}" target="_blank" rel="noopener noreferrer"
                     class="inline-block mt-3 text-xs font-bold text-emerald-700 hover:underline">
                    Ver vídeo →
                  </a>
                @endif
              </div>
            </article>
          @endforeach
        </div>
      @endif

      {{-- BLOQUE PRÓXIMAS CAMADAS (FIJO, CLIENTE) --}}
      <div
        class="mt-6 rounded-3xl border border-[#e3ece4] bg-[#f9fbfa] px-4 sm:px-6 md:px-8 py-6 md:py-7 flex flex-col md:flex-row gap-6 md:gap-8 items-center">

        <div class="flex-1 text-left space-y-3">
          <div class="flex flex-wrap items-center gap-3">
            <h3 class="text-lg md:text-xl font-bold text-slate-900">
              Próximas Camadas 👶🐾
            </h3>
            <span
              class="inline-flex items-center rounded-full bg-[#eceff1] px-3 py-1 text-[11px] font-semibold text-[#4b5563]">
              Prevista próximamente
            </span>
          </div>

          <p class="text-sm text-slate-600 max-w-xl">
            Si estás interesado en futuras camadas, puedes ponerte en contacto con nosotros
            y te avisaremos cuando haya disponibilidad.
          </p>

          <a href="{{ route('contacto') }}"
             class="mt-3 inline-flex items-center gap-2 rounded-full bg-[#2bee4b] px-5 py-2.5 text-sm font-bold text-[#05301a] shadow hover:brightness-110 transition">
            Contactar
          </a>
        </div>
      </div>

    </div>
  </div>
</section>

</x-layouts.public>