<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Material;
// Reemplaza cualquier import incorrecto con:
use Illuminate\Support\Facades\Storage; // Este es el correcto
use Livewire\WithFileUploads;


class ArticuloEdit extends Component
{
    use WithFileUploads;

    public $articulo_id;
    public $nombre;
    public $descripcion;
    public $dimensiones;
    public $categoria_id;
    public $materialesSeleccionados = []; // Array para checkboxes
    public $fotos = [];
    public $fotosExistentes = [];
    public $categorias;
    public $todosMateriales; // Todos los materiales disponibles

    protected $rules = [
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'dimensiones' => 'nullable|string',
        'categoria_id' => 'required|exists:categorias,id',
        'fotos.*' => 'image|max:2048',
        'materialesSeleccionados' => 'required|array|min:1',
    ];

    public function mount($articuloId)
    {
        $articulo = Articulo::with(['fotos', 'materiales'])->findOrFail($articuloId);
        
        $this->articulo_id = $articulo->id;
        $this->nombre = $articulo->nombre;
        $this->descripcion = $articulo->descripcion;
        $this->dimensiones = $articulo->dimensiones;
        $this->categoria_id = $articulo->categoria_id;
        $this->fotosExistentes = $articulo->fotos;
        $this->materialesSeleccionados = $articulo->materiales->pluck('id')->toArray(); // IDs iniciales
        
        $this->categorias = Categoria::all();
        $this->todosMateriales = Material::all(); // Carga todos los materiales
    }

    public function update()
{
    $this->validate();

    $articulo = Articulo::find($this->articulo_id);
    $articulo->update([
        'nombre' => $this->nombre,
        'descripcion' => $this->descripcion,
        'dimensiones' => $this->dimensiones,
        'categoria_id' => $this->categoria_id,
    ]);

    $articulo->materiales()->sync($this->materialesSeleccionados);

    foreach ($this->fotos as $foto) {
        $path = $foto->store('articulos', 'public');
        $articulo->fotos()->create(['url' => $path]);
    }

    // Nuevo formato Livewire 3:
    $this->dispatch('notify', 
        type: 'success',
        message: '¡Artículo actualizado correctamente!'
    );
}

public function removeFoto($index)
{
    // Corrección: Usa la fachada Storage correctamente
    $foto = $this->fotosExistentes[$index];
    Storage::disk('public')->delete($foto->url); // Elimina el archivo físico
    $foto->delete(); // Elimina el registro de la base de datos
    unset($this->fotosExistentes[$index]);
    
    $this->dispatch('notify', 
        type: 'success', 
        message: 'Foto eliminada correctamente'
    );
}

    public function removeNewFoto($index)
    {
        unset($this->fotos[$index]);
        $this->fotos = array_values($this->fotos);
    }

    public function render()
    {
        return view('livewire.articulo-edit');
    }
}
