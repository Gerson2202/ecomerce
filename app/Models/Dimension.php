<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Model;

class Dimension extends Model
{
    protected $fillable = ['medida', 'numeral_id'];
    
     /**
     * Relación inversa con Numeral
     */
    public function numeral(): BelongsTo
    {
        return $this->belongsTo(Numeral::class);
    }
    
    /**
     * Acceso indirecto al Articulo a través del Numeral
     */
    public function articulos()
    {
        return $this->hasManyThrough(
            Articulo::class,
            ArticuloNumeral::class,
            'numeral_id', // Foreign key on articulo_numeral table...
            'id', // Foreign key on articulo table...
            'numeral_id', // Local key on dimension table...
            'articulo_id' // Local key on articulo_numeral table...
        );
    }
}
