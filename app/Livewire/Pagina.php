<?php

namespace App\Livewire;

use App\Models\Articulo;
use App\Models\Categoria;
use Livewire\Component;
use Livewire\WithPagination; // Importa el trait

class Pagina extends Component
{    
    use WithPagination;
    
    public $categoriaSeleccionada = null;
    public $articuloSeleccionado = null;
    public $mostrarModal = false;
    public $search = '';
    public $perPage = 12;
    
    protected $queryString = [
        'search' => ['except' => ''],
        'categoriaSeleccionada' => ['except' => ''],
    ];

    // Resetear página cuando cambia la búsqueda
    public function updatedSearch()
    {
        $this->resetPage();
    }
    
    // Resetear página cuando cambia la categoría
    public function updatedCategoriaSeleccionada()
    {
        $this->resetPage();
    }

    public function render()
    {
        $articulos = Articulo::with(['categoria', 'fotos'])
            ->when($this->categoriaSeleccionada, function ($query) {
                return $query->where('categoria_id', $this->categoriaSeleccionada);
            })
            ->when($this->search, function ($query) {
                return $query->where(function($q) {
                    $q->where('nombre', 'like', '%' . $this->search . '%')
                      ->orWhere('descripcion', 'like', '%' . $this->search . '%');
                });
            })
            ->paginate($this->perPage);

        $categorias = Categoria::all();

        return view('livewire.pagina', [
            'articulos' => $articulos,
            'categorias' => $categorias,
        ]);
    }

    public function seleccionarCategoria($categoriaId)
    {
        $this->categoriaSeleccionada = $categoriaId;
        $this->resetPage(); // También reseteamos la página aquí
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
