<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CachorroImagen extends Model
{
    // 👇 Esta línea es la importante:
    protected $table = 'cachorro_imagenes';

    protected $fillable = [
        'ruta',
        'orden',
        'cachorro_id',
    ];

    public function cachorro(): BelongsTo
    {
        return $this->belongsTo(Cachorro::class);
    }
}