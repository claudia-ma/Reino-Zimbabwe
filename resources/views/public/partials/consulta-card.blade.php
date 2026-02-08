@php
    // Teléfono limpio y URL base de WhatsApp
    $phone = preg_replace('/\D+/', '', config('app.whatsapp_phone', '34600111222'));
    $whats = "https://wa.me/{$phone}";

    // Mensaje dinámico (cachorro o camada)
    $texto = isset($cachorro)
        ? "Hola, estoy interesado/a en \"{$cachorro->nombre}\" de la camada {$camada->nombre}"
        : "Hola, quiero información sobre la camada \"{$camada->nombre}\"";

    $textoUrl = rawurlencode($texto);
@endphp

<div class="p-5 rounded-2xl border border-neutral-200 bg-white">
  {{-- Éxito --}}
  @if(session('success'))
      <p class="mb-3 text-sm text-emerald-700">{{ session('success') }}</p>
  @endif

  {{-- Errores --}}
  @if ($errors->any())
      <ul class="mb-3 text-sm text-rose-700 list-disc pl-5">
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  @endif

  <div class="font-semibold">
    ¿Te interesa @isset($cachorro) este cachorro @else esta camada @endisset?
  </div>
  <p class="text-sm text-neutral-600 mt-1">
    Escríbenos y te daremos toda la información. Precio bajo solicitud.
  </p>

  <form action="{{ route('consultas.store') }}" method="POST" class="mt-4 space-y-3" novalidate>
    @csrf

    <input type="hidden" name="camada_id" value="{{ $camada->id }}">
    @isset($cachorro)
      <input type="hidden" name="cachorro_id" value="{{ $cachorro->id }}">
    @endisset

    <div class="grid grid-cols-1 gap-3">
      <input
        type="text"
        name="nombre"
        value="{{ old('nombre') }}"
        required
        placeholder="Tu nombre"
        class="rounded-lg border-neutral-300 focus:border-[#03856C] focus:ring-[#03856C]"
        aria-label="Tu nombre"
      />

      <input
        type="tel"
        name="telefono"
        value="{{ old('telefono') }}"
        placeholder="Tu teléfono (opcional)"
        class="rounded-lg border-neutral-300 focus:border-[#03856C] focus:ring-[#03856C]"
        aria-label="Tu teléfono"
      />

      <input
        type="email"
        name="email"
        value="{{ old('email') }}"
        placeholder="Tu email (opcional)"
        class="rounded-lg border-neutral-300 focus:border-[#03856C] focus:ring-[#03856C]"
        aria-label="Tu email"
      />

      <textarea
        name="mensaje"
        rows="3"
        placeholder="Cuéntanos qué necesitas"
        class="rounded-lg border-neutral-300 focus:border-[#03856C] focus:ring-[#03856C]"
        aria-label="Mensaje"
      >{{ old('mensaje') }}</textarea>
    </div>

    <div class="flex gap-2 pt-2">
      <button type="submit" class="px-4 py-2 rounded-lg bg-[#03856C] text-white hover:opacity-95">
        Enviar consulta
      </button>

      <a
        href="{{ $whats . '?text=' . $textoUrl }}"
        target="_blank" rel="noopener"
        class="px-4 py-2 rounded-lg border border-[#03856C] text-[#03856C] hover:bg-[#03856C] hover:text-white inline-flex items-center gap-2"
        aria-label="Abrir WhatsApp para consultar"
      >
        {{-- Icono WhatsApp SVG inline (sin dependencias) --}}
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" class="w-5 h-5" aria-hidden="true" focusable="false">
          <path fill="currentColor" d="M128 24a104 104 0 0 0-89.6 156.8L24 232l51.2-14.4A104 104 0 1 0 128 24m0 192a88 88 0 0 1-44.8-12.2l-3-.2l-30.2 8.6l8.6-30.2l-.2-3A88 88 0 1 1 128 216m51.1-61.8c-2.7-1.3-15.9-7.8-18.4-8.6s-4.3-1.3-6.1 1.3s-7 8.6-8.6 10.4s-3.2 1.9-5.9.6s-11.5-4.2-21.9-13.4c-8.1-7.2-13.6-16.1-15.2-18.8s-.2-4.2 1.1-5.5c1.1-1.1 2.6-2.8 3.8-4.2s1.7-2.3 2.6-3.9s.4-3-.2-4.2s-6.1-14.7-8.4-20.1c-2.2-5.3-4.5-4.6-6.1-4.7h-5.2a10 10 0 0 0-7.2 3.3a30.4 30.4 0 0 0-9.5 22.5c0 13.3 9.6 26.2 10.9 28s19 29 45.9 40.6c27 11.6 27 7.7 31.9 7.2s15.6-6.4 17.8-12.6s2.2-11.6 1.5-12.6s-2.4-1.8-5.1-3.1"/>
        </svg>
        WhatsApp
      </a>
    </div>
  </form>
</div>