<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Camadas
            </h2>

            <div class="flex items-center gap-4">
                <a href="{{ route('admin.camadas.create') }}"
                   class="inline-flex items-center px-4 py-2 rounded-lg bg-gray-900 text-white text-sm font-medium hover:bg-gray-800 transition">
                    + Nueva camada
                </a>

                <a href="{{ route('dashboard') }}"
                   class="text-sm text-gray-600 hover:text-gray-900">
                    ← Volver al panel
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-800">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white border rounded-xl shadow-sm overflow-hidden">
                <div class="p-4 border-b">
                    <p class="text-sm text-gray-600">
                        Total: {{ $camadas->total() }}
                    </p>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="bg-gray-50 text-gray-600">
                            <tr>
                                <th class="text-left px-4 py-3">Nombre</th>
                                <th class="text-left px-4 py-3">Padre</th>
                                <th class="text-left px-4 py-3">Madre</th>
                                <th class="text-left px-4 py-3">Fecha nac.</th>
                                <th class="text-left px-4 py-3">Activa</th>
                                <th class="text-right px-4 py-3">Acciones</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y">
                            @forelse($camadas as $camada)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-3 font-medium text-gray-900">{{ $camada->nombre }}</td>
                                    <td class="px-4 py-3 text-gray-700">{{ $camada->padre ?? '—' }}</td>
                                    <td class="px-4 py-3 text-gray-700">{{ $camada->madre ?? '—' }}</td>
                                    <td class="px-4 py-3 text-gray-700">
                                        {{ $camada->fecha_nacimiento?->format('d/m/Y') ?? '—' }}
                                    </td>
                                    <td class="px-4 py-3 text-gray-700">
                                        <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold
                                            {{ $camada->activa ? 'bg-emerald-100 text-emerald-800' : 'bg-gray-100 text-gray-700' }}">
                                            {{ $camada->activa ? 'Sí' : 'No' }}
                                        </span>
                                    </td>

                                    <td class="px-4 py-3 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="{{ route('admin.camadas.edit', $camada) }}"
                                               class="px-3 py-1 rounded-lg border text-sm hover:bg-gray-50">
                                                Editar
                                            </a>

                                            <form method="POST" action="{{ route('admin.camadas.destroy', $camada) }}"
                                                  onsubmit="return confirm('¿Seguro que quieres eliminar esta camada?');"
                                                  class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="px-3 py-1 rounded-lg border border-red-200 text-red-700 text-sm hover:bg-red-50">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                                        No hay camadas todavía.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="p-4">
                    {{ $camadas->links() }}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>