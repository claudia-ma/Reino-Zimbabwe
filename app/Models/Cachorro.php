<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cachorro extends Model
{
    use HasFactory;

    protected $fillable = [
        'camada_id',
        'nombre',
        'sexo',
        'color',
        'estado',
        'video_url',
        'destacado',
    ];

    /**
     * 🔗 Relación con la camada
     */
    public function camada()
    {
        return $this->belongsTo(\App\Models\Camada::class);
    }

    /**
     * 🐶 Relación con imágenes (1 cachorro → muchas imágenes)
     */
    public function imagenes()
    {
    return $this->hasMany(\App\Models\CachorroImagen::class, 'cachorro_id');
    }

    /**
     * 🏷️ Scopes y helpers (opcional)
     */
    public function scopeDisponibles($query)
    {
        return $query->where('estado', 'disponible');
    }

    public function getFotoPrincipalAttribute()
    {
        return $this->imagenes()->first()?->ruta
            ? asset('storage/' . $this->imagenes()->first()->ruta)
            : asset('images/cachorros/default.jpg');
    }
}