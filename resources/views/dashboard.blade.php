<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Panel de administración
    </h2>
  </x-slot>

  <div class="py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        {{-- Cachorros --}}
        <a href="{{ route('admin.cachorros.index') }}"
           class="group rounded-2xl border bg-white p-6 shadow-sm hover:shadow-md transition">
          <div class="flex items-center justify-between">
            <div class="text-lg font-extrabold text-slate-900">Cachorros</div>
            <div class="h-10 w-10 rounded-xl bg-slate-900 text-white flex items-center justify-center">🐾</div>
          </div>
          <p class="mt-3 text-sm text-slate-600">
            Crear, editar y marcar destacados / estado.
          </p>
          <div class="mt-4 text-sm font-bold text-emerald-700 group-hover:underline">
            Gestionar →
          </div>
        </a>

        {{-- Camadas --}}
        <a href="{{ route('admin.camadas.index') }}"
           class="group rounded-2xl border bg-white p-6 shadow-sm hover:shadow-md transition">
          <div class="flex items-center justify-between">
            <div class="text-lg font-extrabold text-slate-900">Camadas</div>
            <div class="h-10 w-10 rounded-xl bg-slate-900 text-white flex items-center justify-center">👶</div>
          </div>
          <p class="mt-3 text-sm text-slate-600">
            Gestionar próximas camadas y datos principales.
          </p>
          <div class="mt-4 text-sm font-bold text-emerald-700 group-hover:underline">
            Gestionar →
          </div>
        </a>

        {{-- Testimonios --}}
        <a href="{{ route('admin.testimonios.index') }}"
           class="group rounded-2xl border bg-white p-6 shadow-sm hover:shadow-md transition">
          <div class="flex items-center justify-between">
            <div class="text-lg font-extrabold text-slate-900">Testimonios</div>
            <div class="h-10 w-10 rounded-xl bg-slate-900 text-white flex items-center justify-center">💚</div>
          </div>
          <p class="mt-3 text-sm text-slate-600">
            Publicar/ocultar opiniones verificadas.
          </p>
          <div class="mt-4 text-sm font-bold text-emerald-700 group-hover:underline">
            Gestionar →
          </div>
        </a>

        {{-- Mensajes --}}
        <a href="{{ route('admin.mensajes.index') }}"
           class="group rounded-2xl border bg-white p-6 shadow-sm hover:shadow-md transition">
          <div class="flex items-center justify-between">
            <div class="text-lg font-extrabold text-slate-900">Mensajes</div>
            <div class="h-10 w-10 rounded-xl bg-slate-900 text-white flex items-center justify-center">✉️</div>
          </div>
          <p class="mt-3 text-sm text-slate-600">
            Ver solicitudes de contacto y suscripciones.
          </p>
          <div class="mt-4 text-sm font-bold text-emerald-700 group-hover:underline">
            Gestionar →
          </div>
        </a>

      </div>
    </div>
  </div>
</x-app-layout>