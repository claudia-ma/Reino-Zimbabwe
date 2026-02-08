<x-layouts.public :title="'Contacto — Reino Zimbabwe'">

<section class="bg-[#f6f8f6] py-12 md:py-16">
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

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-start">

            {{-- IZQUIERDA (puedes poner tu imagen aquí si quieres) --}}
            <div class="bg-white rounded-2xl border shadow-sm p-6">
                <h1 class="text-2xl md:text-3xl font-black text-slate-900">Contacto</h1>
                <p class="text-slate-600 mt-2">
                    Escríbenos y te respondemos lo antes posible.
                </p>

                <div class="mt-6 space-y-2 text-sm text-slate-700">
                    <p><strong>Zona:</strong> Canarias</p>
                    <p><strong>Horario:</strong> 10:00–20:00</p>
                </div>
            </div>

            {{-- DERECHA: FORMULARIO REAL --}}
            <div class="bg-white rounded-2xl border shadow-sm p-6">
                <h2 class="text-lg font-bold text-slate-900">Enviar mensaje</h2>

                <form method="POST" action="{{ route('contacto.store') }}" class="mt-5 space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Nombre *</label>
                        <input type="text" name="nombre" required value="{{ old('nombre') }}"
                               class="w-full rounded-lg border-gray-200 focus:border-emerald-600 focus:ring-emerald-600">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Email *</label>
                        <input type="email" name="email" required value="{{ old('email') }}"
                               class="w-full rounded-lg border-gray-200 focus:border-emerald-600 focus:ring-emerald-600">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Teléfono</label>
                        <input type="text" name="telefono" value="{{ old('telefono') }}"
                               class="w-full rounded-lg border-gray-200 focus:border-emerald-600 focus:ring-emerald-600">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Asunto *</label>
                        <input type="text" name="asunto" required value="{{ old('asunto') }}"
                               class="w-full rounded-lg border-gray-200 focus:border-emerald-600 focus:ring-emerald-600"
                               placeholder="Lista de espera / Camadas / Precio / Dudas…">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Mensaje *</label>
                        <textarea name="mensaje" rows="5" required
                                  class="w-full rounded-lg border-gray-200 focus:border-emerald-600 focus:ring-emerald-600"
                                  placeholder="Cuéntanos qué estás buscando...">{{ old('mensaje') }}</textarea>
                    </div>

                    <button type="submit"
                            class="w-full inline-flex items-center justify-center rounded-lg h-12 bg-emerald-600 text-white font-bold hover:bg-emerald-700 transition">
                        Enviar
                    </button>
                </form>

                {{-- MINI FORM “Notificarme” (opcional) --}}
                <div class="mt-8 border-t pt-6">
                    <h3 class="font-bold text-slate-900">Recibir notificación de nuevas camadas</h3>
                    <p class="text-sm text-slate-600 mt-1">Sin spam. Solo avisos importantes.</p>

                    <form method="POST" action="{{ route('contacto.store') }}"
                          class="mt-4 flex flex-col sm:flex-row sm:items-center gap-3">
                        @csrf

                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Tu correo electrónico" required
                               class="flex w-full flex-1 rounded-lg border border-gray-200 bg-gray-50 h-11 px-4 text-sm focus:ring-2 focus:ring-emerald-600/40 focus:border-emerald-600">

                        <input type="hidden" name="nombre" value="Suscripción web">
                        <input type="hidden" name="mensaje" value="Quiero recibir notificación de nuevas camadas.">
                        <input type="hidden" name="asunto" value="Notificación nuevas camadas">
                        <input type="hidden" name="telefono" value="">

                        <button type="submit"
                                class="w-full sm:w-auto min-w-[140px] rounded-lg h-11 px-5 bg-emerald-600 text-white text-sm font-bold hover:bg-emerald-700 transition">
                            Notificarme
                        </button>
                    </form>
                </div>

            </div>

        </div>
    </div>
</section>

</x-layouts.public-layout>