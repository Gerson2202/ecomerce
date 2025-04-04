<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Numeral extends Model
{
    protected $fillable = ['numero'];
    
    public function articulos(): BelongsToMany
    {
        return $this->belongsToMany(Articulo::class)
                   ->using(ArticuloNumeral::class)
                   ->withPivot([
                       'campo1',
                       'campo2'
                       // otros campos pivote
                   ])
                   ->withTimestamps();
    }
    
    /**
     * Relación uno a muchos con Dimensiones
     */
    public function dimensiones(): HasMany
    {
        return $this->hasMany(Dimension::class);
    }
    
    /**
     * Acceso directo a los registros pivote
     */
    public function articuloNumerales()
    {
        return $this->hasMany(ArticuloNumeral::class);
    }
}