<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Nuevo cachorro
            </h2>

            <a href="{{ route('admin.cachorros.index') }}" class="text-sm text-gray-600 hover:text-gray-900">
                ← Volver a cachorros
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white border rounded-xl shadow-sm p-6">

                @if ($errors->any())
                    <div class="mb-4 rounded-lg border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.cachorros.store') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Camada</label>
                        <select name="camada_id" class="mt-1 w-full rounded-lg border-gray-300">
                            <option value="">Selecciona una camada</option>
                            @foreach($camadas as $camada)
                                <option value="{{ $camada->id }}" @selected(old('camada_id') == $camada->id)>
                                    {{ $camada->nombre ?? ('Camada #'.$camada->id) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input name="nombre" value="{{ old('nombre') }}"
                               class="mt-1 w-full rounded-lg border-gray-300" />
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Sexo</label>
                            <select name="sexo" class="mt-1 w-full rounded-lg border-gray-300">
                                <option value="">—</option>
                                <option value="macho" @selected(old('sexo')==='macho')>macho</option>
                                <option value="hembra" @selected(old('sexo')==='hembra')>hembra</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Color</label>
                            <input name="color" value="{{ old('color') }}"
                                   class="mt-1 w-full rounded-lg border-gray-300" />
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Estado</label>
                        <select name="estado" class="mt-1 w-full rounded-lg border-gray-300">
                            <option value="disponible" @selected(old('estado','disponible')==='disponible')>disponible</option>
                            <option value="reservado" @selected(old('estado')==='reservado')>reservado</option>
                            <option value="entregado" @selected(old('estado')==='entregado')>entregado</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">URL vídeo (opcional)</label>
                        <input name="video_url" value="{{ old('video_url') }}"
                               class="mt-1 w-full rounded-lg border-gray-300" />
                    </div>

                    <label class="inline-flex items-center gap-2">
                        <input type="checkbox" name="destacado" value="1" class="rounded border-gray-300"
                               @checked(old('destacado'))>
                        <span class="text-sm text-gray-700">Destacado</span>
                    </label>

                    <div class="pt-2 flex items-center gap-3">
                        <button class="px-4 py-2 rounded-lg bg-gray-900 text-white text-sm hover:bg-gray-800">
                            Guardar
                        </button>
                        <a href="{{ route('admin.cachorros.index') }}" class="text-sm text-gray-600 hover:text-gray-900">
                            Cancelar
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>