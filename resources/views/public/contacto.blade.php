<x-layouts.public :title="'Contacto — Reino Zimbabwe'">

<section class="bg-gradient-to-b from-[#f4f7f5] to-white pt-6 md:pt-8 pb-12 md:pb-16">
    <div class="max-w-6xl mx-auto px-4 md:px-6">

        @if(session('success'))
            <div class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-200 text-red-800">
                <div class="font-semibold mb-1">Revisa estos campos:</div>
                <ul class="list-disc pl-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="relative overflow-hidden rounded-[34px] bg-white border border-emerald-100 shadow-[0_22px_60px_rgba(15,23,42,0.10)] px-5 sm:px-8 md:px-10 py-10 md:py-12">
            <div class="absolute -top-24 -right-24 h-56 w-56 rounded-full bg-emerald-100/50 blur-3xl"></div>
            <div class="absolute -bottom-28 -left-20 h-56 w-56 rounded-full bg-emerald-50 blur-3xl"></div>

            <div class="relative grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-10 items-start">

                {{-- IZQUIERDA --}}
                <div class="rounded-[30px] border border-emerald-100 bg-gradient-to-br from-emerald-50 to-white p-7 md:p-8 shadow-sm">
                    <p class="mb-3 text-xs font-extrabold uppercase tracking-[0.24em] text-emerald-700">
                        Contacto
                    </p>

                    <h1 class="text-3xl md:text-5xl font-black tracking-tight text-[#0d1b10]">
                        Hablemos de tu futuro cachorro
                    </h1>

                    <p class="mt-4 text-sm md:text-base text-slate-600 leading-relaxed">
                        Escríbenos para resolver dudas sobre disponibilidad, próximas camadas,
                        lista de espera o proceso de reserva responsable.
                    </p>

                    <div class="mt-8 space-y-4">
                        <div class="rounded-2xl bg-white border border-emerald-100 p-4">
                            <p class="text-xs font-bold uppercase tracking-[0.18em] text-slate-400">
                                Zona
                            </p>
                            <p class="mt-1 text-sm font-bold text-[#0d1b10]">
                                Canarias
                            </p>
                        </div>

                        <div class="rounded-2xl bg-white border border-emerald-100 p-4">
                            <p class="text-xs font-bold uppercase tracking-[0.18em] text-slate-400">
                                Horario
                            </p>
                            <p class="mt-1 text-sm font-bold text-[#0d1b10]">
                                10:00–20:00
                            </p>
                        </div>

                        <div class="rounded-2xl bg-white border border-emerald-100 p-4">
                            <p class="text-xs font-bold uppercase tracking-[0.18em] text-slate-400">
                                Respuesta
                            </p>
                            <p class="mt-1 text-sm font-bold text-[#0d1b10]">
                                Lo antes posible
                            </p>
                        </div>
                    </div>
                </div>

                {{-- DERECHA: FORMULARIO --}}
                <div class="rounded-[30px] border border-emerald-100 bg-white p-7 md:p-8 shadow-sm">
                    <h2 class="text-2xl font-black text-[#0d1b10]">
                        Enviar mensaje
                    </h2>

                    <form method="POST" action="{{ route('contacto.store') }}" class="mt-6 space-y-4">
                        @csrf

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Nombre *</label>
                            <input type="text" name="nombre" required value="{{ old('nombre') }}"
                                   class="w-full h-12 rounded-2xl border-gray-200 bg-slate-50 focus:border-emerald-600 focus:ring-emerald-600">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Email *</label>
                            <input type="text" name="nombre" required value="{{ old('nombre') }}"
                                   class="w-full h-12 rounded-2xl border-gray-200 bg-slate-50 focus:border-emerald-600 focus:ring-emerald-600">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Teléfono</label>
                            <input type="text" name="nombre" required value="{{ old('nombre') }}"
                                   class="w-full h-12 rounded-2xl border-gray-200 bg-slate-50 focus:border-emerald-600 focus:ring-emerald-600">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Asunto *</label>
   
                        <input type="text"
                        name="asunto"
                        required
                        value="{{ old('asunto') }}"
                        placeholder="Lista de espera / Camadas / Precio / Dudas…"
                        class="w-full h-12 rounded-2xl border-gray-200 bg-slate-50 focus:border-emerald-600 focus:ring-emerald-600">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Mensaje *</label>
                            <textarea name="mensaje" rows="5" required
                                      class="w-full rounded-2xl border-gray-200 bg-slate-50 focus:border-emerald-600 focus:ring-emerald-600"
                                      placeholder="Cuéntanos qué estás buscando...">{{ old('mensaje') }}</textarea>
                        </div>

                        <button type="submit"
                                class="w-full inline-flex items-center justify-center rounded-full h-12 bg-emerald-600 text-white font-bold shadow-sm transition hover:-translate-y-0.5 hover:bg-emerald-700 hover:shadow-md">
                            Enviar mensaje
                        </button>
                    </form>

                    {{-- MINI FORM --}}
                    <div class="mt-8 border-t border-slate-100 pt-6">
                        <h3 class="font-black text-[#0d1b10]">
                            Recibir notificación de nuevas camadas
                        </h3>

                        <p class="text-sm text-slate-600 mt-1">
                            Sin spam. Solo avisos importantes.
                        </p>

                        <form method="POST" action="{{ route('contacto.store') }}"
                              class="mt-4 flex flex-col md:flex-row md:items-center gap-3">
                            @csrf

                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Tu correo electrónico" required
                                   class="flex w-full flex-1 rounded-full border border-gray-200 bg-slate-50 h-12 px-5 text-sm focus:ring-2 focus:ring-emerald-600/40 focus:border-emerald-600">

                            <input type="hidden" name="nombre" value="Suscripción web">
                            <input type="hidden" name="mensaje" value="Quiero recibir notificación de nuevas camadas.">
                            <input type="hidden" name="asunto" value="Notificación nuevas camadas">
                            <input type="hidden" name="telefono" value="">

                            <button type="submit"
                                    class="w-full sm:w-auto min-w-[150px] rounded-full h-12 px-5 bg-emerald-600 text-white text-sm font-bold shadow-sm transition hover:-translate-y-0.5 hover:bg-emerald-700 hover:shadow-md">
                                Notificarme
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

</x-layouts.public>