<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $fillable = [
        'nombre','email','telefono','mensaje','origen',
        'camada_id','cachorro_id','estado'
    ];

    /** RELACIONES */

    // La consulta puede estar asociada a un cachorro concreto
    public function cachorro()
    {
        return $this->belongsTo(Cachorro::class);
    }

    // …o a una camada en general
    public function camada()
    {
        return $this->belongsTo(Camada::class);
    }
}