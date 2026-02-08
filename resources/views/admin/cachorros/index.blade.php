<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Cachorros
            </h2>

            <div class="flex items-center gap-4">
                <a href="{{ route('admin.cachorros.create') }}"
                   class="inline-flex items-center px-4 py-2 rounded-lg bg-gray-900 text-white text-sm font-medium hover:bg-gray-800 transition">
                    + Nuevo cachorro
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
                <div class="p-4 border-b flex items-center justify-between gap-4">
                    <p class="text-sm text-gray-600">
                        Total: <span class="font-semibold text-gray-900">{{ $cachorros->total() }}</span>
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
                                <th class="text-right px-4 py-3">Acciones</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y">
                            @forelse($cachorros as $c)
                                @php
                                    $estado = $c->estado ?? '—';

                                    $estadoBadge = match($estado) {
                                        'disponible' => 'bg-emerald-50 text-emerald-800 border-emerald-200',
                                        'reservado'  => 'bg-amber-50 text-amber-800 border-amber-200',
                                        'entregado'  => 'bg-slate-100 text-slate-700 border-slate-200',
                                        default      => 'bg-slate-50 text-slate-700 border-slate-200',
                                    };

                                    $estadoLabel = $estado !== '—' ? ucfirst($estado) : '—';
                                @endphp

                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-3">
                                        <div class="font-medium text-gray-900">
                                            {{ $c->nombre }}
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            ID #{{ $c->id }}
                                        </div>
                                    </td>

                                    <td class="px-4 py-3 text-gray-700">
                                        {{ $c->sexo ?? '—' }}
                                    </td>

                                    <td class="px-4 py-3 text-gray-700">
                                        {{ $c->color ?? '—' }}
                                    </td>

                                    <td class="px-4 py-3">
                                        <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-bold border {{ $estadoBadge }}">
                                            {{ $estadoLabel }}
                                        </span>
                                    </td>

                                    <td class="px-4 py-3 text-gray-700">
                                        {{ $c->camada?->nombre ?? '—' }}
                                    </td>

                                    <td class="px-4 py-3">
                                        @if($c->destacado)
                                            <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-bold border bg-amber-50 text-amber-800 border-amber-200">
                                                ⭐ Sí
                                            </span>
                                        @else
                                            <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold border bg-slate-50 text-slate-600 border-slate-200">
                                                No
                                            </span>
                                        @endif
                                    </td>

                                    <td class="px-4 py-3 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="{{ route('admin.cachorros.edit', $c) }}"
                                               class="px-3 py-1.5 rounded-lg border text-sm hover:bg-gray-50">
                                                Editar
                                            </a>

                                            <form method="POST" action="{{ route('admin.cachorros.destroy', $c) }}"
                                                  onsubmit="return confirm('¿Seguro que quieres eliminar este cachorro?');"
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
                                    <td colspan="7" class="px-4 py-10 text-center text-gray-500">
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