@props(['estado'])

@php
    $estado = strtolower($estado);

    switch ($estado) {
        case 'disponible':
            $color = 'bg-emerald-50 text-emerald-700 border-emerald-100';
            $label = 'Disponible';
            break;

        case 'reservado':
            $color = 'bg-amber-50 text-amber-700 border-amber-100';
            $label = 'Reservado';
            break;

        case 'vendido':
        case 'entregado':
            $color = 'bg-rose-50 text-rose-700 border-rose-100';
            $label = 'Entregado';
            break;

        default:
            $color = 'bg-neutral-50 text-neutral-700 border-neutral-100';
            $label = ucfirst($estado);
            break;
    }
@endphp

<span class="inline-flex items-center text-xs px-2.5 py-1 rounded-full border font-medium {{ $color }}">
    {{ $label }}
</span>