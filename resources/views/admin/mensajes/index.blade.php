<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Mensajes recibidos
            </h2>

            <a href="{{ route('dashboard') }}"
               class="text-sm text-gray-600 hover:text-gray-900">
                ← Volver al panel
            </a>
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
                        Total: <span class="font-semibold">{{ $mensajes->total() }}</span>
                    </p>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="bg-gray-50 text-gray-600">
                            <tr>
                                <th class="text-left px-4 py-3">Nombre</th>
                                <th class="text-left px-4 py-3">Email</th>
                                <th class="text-left px-4 py-3">Asunto</th>
                                <th class="text-left px-4 py-3">Fecha</th>
                                <th class="text-right px-4 py-3">Acciones</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y">
                            @forelse($mensajes as $m)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-3 font-medium text-gray-900">
                                        {{ $m->nombre }}
                                    </td>

                                    <td class="px-4 py-3 text-gray-700">
                                        {{ $m->email }}
                                    </td>

                                    <td class="px-4 py-3 text-gray-700">
                                        {{ $m->asunto ?? '—' }}
                                    </td>

                                    <td class="px-4 py-3 text-gray-500 text-xs">
                                        {{ $m->created_at->format('d/m/Y H:i') }}
                                    </td>

                                    <td class="px-4 py-3 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="{{ route('admin.mensajes.show', $m) }}"
                                               class="px-3 py-1.5 rounded-lg border text-sm hover:bg-gray-50">
                                                Ver
                                            </a>

                                            <form method="POST"
                                                  action="{{ route('admin.mensajes.destroy', $m) }}"
                                                  onsubmit="return confirm('¿Eliminar este mensaje?');"
                                                  class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="px-3 py-1.5 rounded-lg border border-red-200 text-red-700 text-sm hover:bg-red-50">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-10 text-center text-gray-500">
                                        No hay mensajes todavía.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="p-4">
                    {{ $mensajes->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>