<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Cachorro;
use App\Models\CachorroImagen;

class TempImagesSeeder extends Seeder
{
    public function run(): void
    {
        // Rutas de imágenes que acabas de copiar
        $base = storage_path('app/public/cachorros');
        if (!File::exists($base)) {
            $this->command->warn('No existe storage/app/public/cachorros');
            return;
        }

        $archivos = collect(File::files($base))
            ->map(fn($f) => 'cachorros/' . $f->getFilename())   // ruta relativa para /storage/
            ->filter(fn($ruta) => preg_match('/\.(jpg|jpeg|png|webp)$/i', $ruta))
            ->values();

        if ($archivos->isEmpty()) {
            $this->command->warn('No hay imágenes en storage/app/public/cachorros');
            return;
        }

        // Asigna 1 imagen a cada cachorro (o varias si quieres)
        $cachorros = Cachorro::with('imagenes')->get();
        if ($cachorros->isEmpty()) {
            $this->command->warn('No hay cachorros en BD para asignar imágenes.');
            return;
        }

        $orden = 0;
        foreach ($cachorros as $c) {
            // Si ya tiene imágenes, salta (para no duplicar)
            if ($c->imagenes()->exists()) continue;

            // Elige una al azar de tu set
            $ruta = $archivos->random();

            CachorroImagen::create([
                'cachorro_id' => $c->id,
                'ruta'        => $ruta,   // importante: sin /storage al inicio
                'orden'       => $orden++,
            ]);
        }

        $this->command->info('Imágenes asignadas a cachorros 👍');
    }
}