<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Material extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    
    // Relación con Artículos (muchos a muchos)
    public function articulos()
    {
        return $this->belongsToMany(Articulo::class, 'articulo_materials')
                    ->withTimestamps();
    }

}
