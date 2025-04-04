<?php

namespace App\Livewire\Articulo;

use Livewire\Component;
use App\Models\Articulo;

class ShowDetalle extends Component
{

    public $articulo;
    public $materiales;
    public $fotos;
    public $numerales;
    public $imagenAmpliada = null;

    public function mostrarImagen($rutaImagen)
    {
        $this->imagenAmpliada = $rutaImagen;
    }

    public function cerrarImagen()
    {
        $this->imagenAmpliada = null;
    }

    public function mount($id)
    {
        $this->articulo = Articulo::with(['materiales', 'fotos','numerales.dimensiones'])->findOrFail($id);
        $this->materiales = $this->articulo->materiales;
        $this->fotos = $this->articulo->fotos;
        $this->numerales= $this->articulo->articuloNumerales;
    }
    public function render()
    {
        return view('livewire.articulo.show-detalle');
    }
}
