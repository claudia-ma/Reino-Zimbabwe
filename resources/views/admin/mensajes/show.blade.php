<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Mensaje
            </h2>

            <a href="{{ route('admin.mensajes.index') }}"
               class="text-sm text-gray-600 hover:text-gray-900">
                ← Volver a mensajes
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white border rounded-xl shadow-sm p-6 space-y-5">

                <div>
                    <div class="text-xs text-gray-500">Nombre</div>
                    <div class="font-semibold text-gray-900">{{ $mensaje->nombre }}</div>
                </div>

                <div>
                    <div class="text-xs text-gray-500">Email</div>
                    <div class="text-gray-800">{{ $mensaje->email }}</div>
                </div>

                @if($mensaje->telefono)
                    <div>
                        <div class="text-xs text-gray-500">Teléfono</div>
                        <div class="text-gray-800">{{ $mensaje->telefono }}</div>
                    </div>
                @endif

                @if($mensaje->asunto)
                    <div>
                        <div class="text-xs text-gray-500">Asunto</div>
                        <div class="text-gray-800">{{ $mensaje->asunto }}</div>
                    </div>
                @endif

                <div>
                    <div class="text-xs text-gray-500">Mensaje</div>
                    <div class="mt-2 rounded-lg border bg-gray-50 p-4 text-gray-800 text-sm leading-relaxed">
                        {{ $mensaje->mensaje }}
                    </div>
                </div>

                <div class="text-xs text-gray-500">
                    Recibido el {{ $mensaje->created_at->format('d/m/Y H:i') }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>