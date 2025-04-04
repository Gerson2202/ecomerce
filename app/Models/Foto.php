<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'articulo_id'];

    public function articulo()
    {
        return $this->belongsTo(Articulo::class);
    }
}
