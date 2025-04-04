<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ArticuloNumeral extends Pivot
{
    protected $table = 'articulo_numeral';
    
    protected $fillable = [
        'articulo_id',  
        'numeral_id',
        // Agrega aquí cualquier campo adicional que necesites
    ];
    
    public function articulo()
    {
        return $this->belongsTo(Articulo::class);
    }
    
    public function numeral()
    {
        return $this->belongsTo(Numeral::class);
    }
}
