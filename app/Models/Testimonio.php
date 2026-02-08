<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonio extends Model
{
    protected $fillable = [
        'nombre',
        'ubicacion',
        'estrellas',
        'mensaje',
        'foto_url',
        'publicado',
    ];

    protected $casts = [
        'publicado' => 'boolean',
        'estrellas' => 'integer',
    ];

    // Scope para reutilizarlo en público/admin si quieres
    public function scopePublicados($query)
    {
        return $query->where('publicado', true);
    }
}