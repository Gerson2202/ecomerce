<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Categoria;
use App\Models\Material;
use Livewire\WithPagination;
use Livewire\Attributes\On; // Importar si deseas manejar eventos

class CategoriasComponent extends Component
{
    use WithPagination;

    public $nombre, $descripcion, $categoria_id;
    public $modal = false;
    // Agrega estas propiedades al componente
    public $nombre_material, $material_id;
    public $modal_material = false;

    protected $rules = [
        'nombre'      => 'required|string|max:255',
        'descripcion' => 'nullable|string',
    ];

    public function render()
{
    return view('livewire.categorias-component', [
        'categorias' => Categoria::latest()->paginate(5),
        'materiales' => Material::latest()->paginate(5) // Asegúrate de tener el modelo Material
    ]);
}

    public function create()
    {
        $this->reset(['nombre', 'descripcion', 'categoria_id']);
        $this->modal = true;
    }

   
    public function store()
    {
        $this->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        Categoria::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
        ]);

        $this->reset(['nombre', 'descripcion', 'modal']);
        
        // Nueva forma en Livewire 3 para enviar eventos
        $this->dispatch('notify', type: 'success', message: 'Categoría creada con éxito');
    }

    public function delete($id)
    {
        Categoria::find($id)->delete();
        $this->dispatch('notify', type: 'error', message: 'Categoría eliminada');
    }

    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        $this->categoria_id = $categoria->id;
        $this->nombre = $categoria->nombre;
        $this->descripcion = $categoria->descripcion;
        $this->modal = true;
    }

    public function update()
    {
        $this->validate();
        $categoria = Categoria::findOrFail($this->categoria_id);
        $categoria->update([
            'nombre'      => $this->nombre,
            'descripcion' => $this->descripcion,
        ]);

        $this->dispatch('notify', type: 'info', message: 'Categoría modificada con éxito');
        $this->modal = false;
    }

    public function closeModal()
    {
        $this->modal = false;
    }


    // Métodos para materiales
public function createMaterial()
{
    $this->reset(['nombre_material', 'material_id']);
    $this->modal_material = true;
}

public function storeMaterial()
{
    $this->validate(['nombre_material' => 'required|string|max:255']);
    
    Material::create(['nombre' => $this->nombre_material]);
    
    $this->reset(['nombre_material', 'modal_material']);
    $this->dispatch('notify', type: 'success', message: 'Material creado');
}

// Agrega este método para edición
public function editMaterial($id)
{
    $material = Material::findOrFail($id);
    $this->material_id = $material->id;
    $this->nombre_material = $material->nombre;
    $this->modal_material = true;
}

// Método para actualizar
public function updateMaterial()
{
    $this->validate(['nombre_material' => 'required|string|max:255']);
    
    Material::find($this->material_id)->update([
        'nombre' => $this->nombre_material
    ]);
    
    $this->reset(['nombre_material', 'material_id', 'modal_material']);
    $this->dispatch('notify', type: 'info', message: 'Material actualizado');
}
public function deleteMaterial($id)
{
    Material::find($id)->delete();
    $this->dispatch('notify', type: 'error', message: 'Material eliminado');
}
}

