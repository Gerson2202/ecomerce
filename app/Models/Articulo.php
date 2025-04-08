<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Articulo extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'categoria_id'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

     // Relación con Materiales (muchos a muchos)
     public function materiales()
     {
         return $this->belongsToMany(Material::class, 'articulo_materials')
                     ->withTimestamps();
     }

    public function fotos()
    {
        return $this->hasMany(Foto::class);
    }

    // Método para obtener la primera foto (para la vista principal)
    public function fotoPrincipal()
    {
        return $this->fotos()->first();
    }
    
    public function getFotosUrlsAttribute()
    {
        return $this->fotos->map(function ($foto) {
            return asset('storage/'.$foto->url);
        });
    }

 
    public function numerales()
    {
        
        return $this->belongsToMany(Numeral::class);
        
    }
    /**
     * Acceso directo a los registros pivote
     */
    public function articuloNumerales()
    {
        return $this->hasMany(ArticuloNumeral::class);
    }
}
