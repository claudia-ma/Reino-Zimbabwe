<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Editar camada
            </h2>

            <a href="{{ route('admin.camadas.index') }}"
               class="text-sm text-gray-600 hover:text-gray-900">
                ← Volver a camadas
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            @if ($errors->any())
                <div class="mb-4 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-red-800">
                    <ul class="list-disc pl-5 space-y-1 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.camadas.update', $camada) }}"
                  class="bg-white border rounded-xl shadow-sm p-6 space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium text-gray-700">Nombre *</label>
                    <input type="text" name="nombre" value="{{ old('nombre', $camada->nombre) }}" required
                           class="mt-1 w-full rounded-lg border-gray-300 focus:border-gray-900 focus:ring-gray-900">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Padre</label>
                        <input type="text" name="padre" value="{{ old('padre', $camada->padre) }}"
                               class="mt-1 w-full rounded-lg border-gray-300 focus:border-gray-900 focus:ring-gray-900">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Madre</label>
                        <input type="text" name="madre" value="{{ old('madre', $camada->madre) }}"
                               class="mt-1 w-full rounded-lg border-gray-300 focus:border-gray-900 focus:ring-gray-900">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Fecha de nacimiento</label>
                    <input type="date" name="fecha_nacimiento"
                           value="{{ old('fecha_nacimiento', optional($camada->fecha_nacimiento)->format('Y-m-d')) }}"
                           class="mt-1 w-full rounded-lg border-gray-300 focus:border-gray-900 focus:ring-gray-900">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Descripción</label>
                    <textarea name="descripcion" rows="4"
                              class="mt-1 w-full rounded-lg border-gray-300 focus:border-gray-900 focus:ring-gray-900">{{ old('descripcion', $camada->descripcion) }}</textarea>
                </div>

                <div class="flex items-center gap-2">
                    <input type="checkbox" name="activa" value="1"
                           {{ old('activa', $camada->activa) ? 'checked' : '' }}
                           class="rounded border-gray-300 text-gray-900 focus:ring-gray-900">
                    <label class="text-sm text-gray-700">Camada activa</label>
                </div>

                <div class="flex items-center justify-end gap-3">
                    <a href="{{ route('admin.camadas.index') }}"
                       class="px-4 py-2 rounded-lg border text-sm hover:bg-gray-50">
                        Cancelar
                    </a>
                    <button type="submit"
                            class="px-4 py-2 rounded-lg bg-gray-900 text-white text-sm hover:bg-gray-800 transition">
                        Guardar cambios
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>