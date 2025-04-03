<?php

namespace App\Livewire;
use Livewire\Attributes\On; // Para manejar eventos JavaScript

use Livewire\Component;
use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Material;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ArticuloCreate extends Component
{
    use WithFileUploads;

    public $nombre, $descripcion, $dimensiones, $categoria_id;
    public $materialesSeleccionados = []; // Para almacenar IDs de materiales seleccionados
    public $fotos = [];
    public $categorias, $todosMateriales; // Cambiado a $todosMateriales para mejor claridad

    protected $rules = [
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'dimensiones' => 'nullable|string',
        'categoria_id' => 'required|exists:categorias,id',
        'fotos.*' => 'image|max:2048', // 2MB max
        'materialesSeleccionados' => 'required|array|min:1', // Obligatorio al menos 1 material
    ];

    protected $messages = [
        'materialesSeleccionados.required' => 'Debe seleccionar al menos un material.',
        'materialesSeleccionados.min' => 'Debe seleccionar al menos un material.',
    ];

    public function mount()
    {
        $this->categorias = Categoria::all();
        $this->todosMateriales = Material::all(); // Todos los materiales disponibles
    }

    public function save()
    {
        $this->validate();

        // Crear artículo
        $articulo = Articulo::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'dimensiones' => $this->dimensiones,
            'categoria_id' => $this->categoria_id,
        ]);

        // Sincronizar materiales (mejor que attach para evitar duplicados)
        $articulo->materiales()->sync($this->materialesSeleccionados);

        // Guardar fotos con manejo de errores
        foreach ($this->fotos as $foto) {
            try {
                $path = $foto->store('articulos', 'public');
                $articulo->fotos()->create(['url' => $path]);
            } catch (\Exception $e) {
                $this->dispatch('notify', 
                    type: 'error', 
                    message: 'Error al subir imagen: '.$e->getMessage()
                );
            }
        }

        // Resetear campos
        $this->reset([
            'nombre', 
            'descripcion', 
            'dimensiones', 
            'categoria_id', 
            'fotos', 
            'materialesSeleccionados'
        ]);

        // Notificación Toastr
        $this->dispatch('notify', 
            type: 'success', 
            message: 'Artículo creado exitosamente'
        );

        // Opcional: Resetear solo las fotos para permitir nuevo registro rápido
        $this->fotos = [];
    }
        public function updatedFotos()
    {
        $this->validate([
            'fotos.*' => 'image|max:2048',
        ]);
    }

    public function removeFoto($index)
    {
        array_splice($this->fotos, $index, 1);
    }
    public function render()
    {
        return view('livewire.articulo-create');
    }
}