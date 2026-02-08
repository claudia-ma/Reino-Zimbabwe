<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Camada;
use App\Models\Cachorro;
use App\Models\CachorroImagen;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        $camada = Camada::create([
            'nombre' => 'Camada Bella x Coco',
            'padre' => 'Coco',
            'madre' => 'Bella',
            'fecha_nacimiento' => now()->subDays(30),
            'descripcion' => 'Una camada preciosa de tres chihuahuas mini.',
            'activa' => true,
        ]);

        $cachorros = [
            ['nombre' => 'Luna', 'sexo' => 'f', 'color' => 'Crema', 'estado' => 'disponible'],
            ['nombre' => 'Max', 'sexo' => 'm', 'color' => 'Chocolate', 'estado' => 'reservado'],
            ['nombre' => 'Toby', 'sexo' => 'm', 'color' => 'Negro', 'estado' => 'entregado'],
        ];

        foreach ($cachorros as $data) {
            $c = $camada->cachorros()->create($data);
            $c->imagenes()->createMany([
                ['ruta' => 'demo/chihuahua1.jpg'],
                ['ruta' => 'demo/chihuahua2.jpg'],
            ]);
        }
    }
}