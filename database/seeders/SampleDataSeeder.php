<?php

namespace Database\Seeders;

use App\Models\Camada;
use App\Models\Cachorro;
use App\Models\CachorroImagen;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SampleDataSeeder extends Seeder
{
    public function run(): void
    {
        // Asegura el disco 'public' y carpeta destino
        Storage::disk('public')->makeDirectory('dogs');

        // Copiamos tus imágenes de /public/images a /storage/app/public/dogs
        $files = [
            'chihuahua1.jpeg',
            'chihuahua2.jpeg',
            'chihuahua3.jpeg',
            'chihuahua4.jpeg',
            'chihuahua5.jpeg',
            'chihuahua6.jpeg',
        ];

        foreach ($files as $f) {
            $src = public_path('images/'.$f);
            $dst = 'dogs/'.$f;

            if (file_exists($src) && !Storage::disk('public')->exists($dst)) {
                Storage::disk('public')->put($dst, file_get_contents($src));
            }
        }

        // ==== Camada 1 (Activa) ====
        $camada1 = Camada::create([
            'nombre'            => 'Camada Bella × Coco',
            'padre'             => 'Coco',
            'madre'             => 'Bella',
            'fecha_nacimiento'  => now()->subDays(30),
            'descripcion'       => 'Cachorros mini con carácter dulce y sociable.',
            'activa'            => true,
        ]);

        // 3 cachorros
        $c1 = Cachorro::create([
            'camada_id' => $camada1->id,
            'nombre'    => 'Luna',
            'sexo'      => 'hembra',
            'color'     => 'Chocolate y crema',
            'estado'    => 'disponible',
            'video_url' => null,
        ]);
        $c2 = Cachorro::create([
            'camada_id' => $camada1->id,
            'nombre'    => 'Rio',
            'sexo'      => 'macho',
            'color'     => 'Arena',
            'estado'    => 'reservado',
            'video_url' => null,
        ]);
        $c3 = Cachorro::create([
            'camada_id' => $camada1->id,
            'nombre'    => 'Mora',
            'sexo'      => 'hembra',
            'color'     => 'Negro y fuego',
            'estado'    => 'disponible',
            'video_url' => null,
        ]);

        // Imágenes
        $this->asignarImagenes($c1, ['dogs/chihuahua1.jpeg', 'dogs/chihuahua4.jpeg']);
        $this->asignarImagenes($c2, ['dogs/chihuahua2.jpeg']);
        $this->asignarImagenes($c3, ['dogs/chihuahua3.jpeg', 'dogs/chihuahua5.jpeg']);

        // ==== Camada 2 (Archivada) ====
        $camada2 = Camada::create([
            'nombre'            => 'Camada Nala × Leo',
            'padre'             => 'Leo',
            'madre'             => 'Nala',
            'fecha_nacimiento'  => now()->subMonths(6),
            'descripcion'       => 'Camada previa, ya entregada.',
            'activa'            => false,
        ]);

        $c4 = Cachorro::create([
            'camada_id' => $camada2->id,
            'nombre'    => 'Batu',
            'sexo'      => 'macho',
            'color'     => 'Crema',
            'estado'    => 'entregado',
            'video_url' => null,
        ]);
        $c5 = Cachorro::create([
            'camada_id' => $camada2->id,
            'nombre'    => 'Duna',
            'sexo'      => 'hembra',
            'color'     => 'Chocolate',
            'estado'    => 'entregado',
            'video_url' => null,
        ]);

        $this->asignarImagenes($c4, ['dogs/chihuahua6.jpeg']);
        $this->asignarImagenes($c5, ['dogs/chihuahua2.jpeg', 'dogs/chihuahua1.jpeg']);
    }

    private function asignarImagenes(Cachorro $cachorro, array $rutas): void
    {
        $orden = 1;
        foreach ($rutas as $ruta) {
            CachorroImagen::create([
                'cachorro_id' => $cachorro->id,
                'ruta'        => $ruta, // IMPORTANTE: relativo a storage/app/public
                'orden'       => $orden++,
            ]);
        }
    }
}