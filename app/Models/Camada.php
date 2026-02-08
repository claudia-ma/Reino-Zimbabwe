<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Camada extends Model
{
    // Qué campos se pueden guardar de golpe (create/update)
    protected $fillable = [
        'nombre','padre','madre','fecha_nacimiento','descripcion','activa'
    ];

    // Tipos de datos (para que Laravel los trate como boolean/fecha)
    protected $casts = [
        'activa' => 'boolean',
        'fecha_nacimiento' => 'date',
    ];

    /** RELACIONES */

    // Una camada TIENE MUCHOS cachorros
    public function cachorros()
    {
        return $this->hasMany(Cachorro::class);
    }
}