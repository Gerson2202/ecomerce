<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ArticuloMaterial extends Pivot
{
    protected $table = 'articulo_materials';

    // Si necesitas campos adicionales
    protected $fillable = [
        'articulo_id',
        'material_id',
        // Agrega aquí otros campos si existen
    ];

    // Relación con Artículo
    public function articulo()
    {
        return $this->belongsTo(Articulo::class);
    }

    // Relación con Material
    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
