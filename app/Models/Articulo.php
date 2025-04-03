<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Articulo extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'dimensiones', 'categoria_id'];

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

    public function getFotosUrlsAttribute()
    {
        return $this->fotos->map(function ($foto) {
            return asset('storage/'.$foto->url);
        });
    }
}
