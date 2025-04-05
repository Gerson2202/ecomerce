<?php

namespace App\Livewire;

use App\Models\Articulo;
use App\Models\Categoria;
use Livewire\Component;

class Pagina extends Component
{
    public $categoriaSeleccionada = null;
    public $articuloSeleccionado = null;
    public $mostrarModal = false;

    public function render()
    {
        $articulos = Articulo::with(['categoria', 'fotos'])
            ->when($this->categoriaSeleccionada, function ($query) {
                return $query->where('categoria_id', $this->categoriaSeleccionada);
            })
            ->get();

        $categorias = Categoria::all();

        return view('livewire.pagina', [
            'articulos' => $articulos,
            'categorias' => $categorias,
        ]);
    }

    public function seleccionarCategoria($categoriaId)
    {
        $this->categoriaSeleccionada = $categoriaId;
    }

    public function mostrarArticulo($articuloId)
    {
        $this->articuloSeleccionado = Articulo::with(['categoria', 'fotos','materiales','numerales.dimensiones'])->find($articuloId);
        $this->mostrarModal = true;
    }

    public function cerrarModal()
    {
        $this->mostrarModal = false;
        $this->articuloSeleccionado = null;
    }
}
