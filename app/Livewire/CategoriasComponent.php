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

    // Funcion para eliminar la categoria
    public function delete($id)
    {
        try {
            if (Categoria::find($id)?->delete()) {
                $this->dispatch('notify',
                    type: 'success',
                    message: 'Categoría eliminada'
                );
            } else {
                $this->dispatch('notify',
                    type: 'error',
                    message: 'Categoría no encontrada'
                );
            }
        } catch (\Exception $e) {
            $message = ($e->getCode() == 23000) 
                ? 'No se puede eliminar (tiene articulos asociados)' 
                : 'Error al eliminar';
                
            $this->dispatch('notify',
                type: 'error',
                message: $message
            );
        }
    }

    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        $this->categoria_id = $categoria->id;
        $this->nombre = $categoria->nombre;
        $this->descripcion = $categoria->descripcion;
        $this->modal = true;
    }
    // Funcion para actualizar categoria
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


    // Métodos para abrir modal de materiales agregar
    public function createMaterial()
    {
        $this->reset(['nombre_material', 'material_id']);
        $this->modal_material = true;
    }
    // Funcion para guardar el material

    public function storeMaterial()
    {
        $this->validate(['nombre_material' => 'required|string|max:255']);
        
        Material::create(['nombre' => $this->nombre_material]);
        
        $this->reset(['nombre_material', 'modal_material']);
        $this->dispatch('notify', type: 'success', message: 'Material creado');
    }

    // Agrega este método para edición de material
    public function editMaterial($id)
    {
        $material = Material::findOrFail($id);
        $this->material_id = $material->id;
        $this->nombre_material = $material->nombre;
        $this->modal_material = true;
    }

    // Método para actualizar Material
    public function updateMaterial()
    {
        $this->validate(['nombre_material' => 'required|string|max:255']);
        
        Material::find($this->material_id)->update([
            'nombre' => $this->nombre_material
        ]);
        
        $this->reset(['nombre_material', 'material_id', 'modal_material']);
        $this->dispatch('notify', type: 'info', message: 'Material actualizado con Exito!');
    }

    // Funcion para eliminar el material
    public function deleteMaterial($id)
    {
        try {
            $material = Material::find($id);
            
            if (!$material) {
                $this->dispatch('notify', 
                    type: 'error',
                    message: 'El material no existe'
                );
                return;
            }
            
            $material->delete();
            $this->dispatch('notify', type: 'success', message: 'Material eliminado correctamente');
            
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == 23000) {
                $this->dispatch('notify',
                    type: 'error',
                    message: 'No se puede eliminar: el material está asociado a uno o mas articulos'
                );
            } else {
                $this->dispatch('notify',
                    type: 'error',
                    message: 'Error al eliminar el material'
                );
            }
        }
    }
}

