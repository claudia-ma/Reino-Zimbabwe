<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Cachorros
            </h2>

            <a href="{{ route('dashboard') }}" class="text-sm text-gray-600 hover:text-gray-900">
                ← Volver al panel
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white border rounded-xl shadow-sm overflow-hidden">
                <div class="p-4 border-b">
                    <p class="text-sm text-gray-600">
                        Total mostrados: {{ $cachorros->total() }}
                    </p>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="bg-gray-50 text-gray-600">
                            <tr>
                                <th class="text-left px-4 py-3">Nombre</th>
                                <th class="text-left px-4 py-3">Sexo</th>
                                <th class="text-left px-4 py-3">Color</th>
                                <th class="text-left px-4 py-3">Estado</th>
                                <th class="text-left px-4 py-3">Camada</th>
                                <th class="text-left px-4 py-3">Destacado</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @forelse($cachorros as $c)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-3 font-medium text-gray-900">{{ $c->nombre }}</td>
                                    <td class="px-4 py-3 text-gray-700">{{ $c->sexo ?? '—' }}</td>
                                    <td class="px-4 py-3 text-gray-700">{{ $c->color ?? '—' }}</td>
                                    <td class="px-4 py-3 text-gray-700">{{ $c->estado }}</td>
                                    <td class="px-4 py-3 text-gray-700">
                                        {{ $c->camada->id ?? '—' }}
                                    </td>
                                    <td class="px-4 py-3 text-gray-700">
                                        {{ $c->destacado ? 'Sí' : 'No' }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                                        No hay cachorros todavía.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="p-4">
                    {{ $cachorros->links() }}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>