<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Editar testimonio
            </h2>

            <a href="{{ route('admin.testimonios.index') }}"
               class="text-sm text-gray-600 hover:text-gray-900">
                ← Volver a testimonios
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            @if ($errors->any())
                <div class="mb-4 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-red-800">
                    <ul class="list-disc pl-5 space-y-1 text-sm">
                        @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST"
                  action="{{ route('admin.testimonios.update', $testimonio) }}"
                  class="bg-white border rounded-xl shadow-sm p-6 space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium text-gray-700">Nombre *</label>
                    <input name="nombre" value="{{ old('nombre', $testimonio->nombre) }}" required
                           class="mt-1 w-full rounded-lg border-gray-300 focus:border-gray-900 focus:ring-gray-900">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Ubicación</label>
                        <input name="ubicacion" value="{{ old('ubicacion', $testimonio->ubicacion) }}"
                               class="mt-1 w-full rounded-lg border-gray-300 focus:border-gray-900 focus:ring-gray-900">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Estrellas *</label>
                        <select name="estrellas" required
                                class="mt-1 w-full rounded-lg border-gray-300 focus:border-gray-900 focus:ring-gray-900">
                            @for($i=5; $i>=1; $i--)
                                <option value="{{ $i }}" @selected(old('estrellas', $testimonio->estrellas) == $i)>
                                    {{ $i }}/5
                                </option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Mensaje *</label>
                    <textarea name="mensaje" rows="4" required
                              class="mt-1 w-full rounded-lg border-gray-300 focus:border-gray-900 focus:ring-gray-900">{{ old('mensaje', $testimonio->mensaje) }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Foto URL (opcional)</label>
                    <input name="foto_url" value="{{ old('foto_url', $testimonio->foto_url) }}"
                           class="mt-1 w-full rounded-lg border-gray-300 focus:border-gray-900 focus:ring-gray-900">
                </div>

                <div class="flex items-center gap-2">
                    <input type="checkbox" name="publicado" value="1"
                           {{ old('publicado', $testimonio->publicado) ? 'checked' : '' }}
                           class="rounded border-gray-300 text-gray-900 focus:ring-gray-900">
                    <label class="text-sm text-gray-700">Publicado</label>
                </div>

                <div class="flex items-center justify-end gap-3">
                    <a href="{{ route('admin.testimonios.index') }}"
                       class="px-4 py-2 rounded-lg border text-sm hover:bg-gray-50">
                        Cancelar
                    </a>

                    <button class="px-4 py-2 rounded-lg bg-gray-900 text-white text-sm hover:bg-gray-800 transition">
                        Guardar cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>