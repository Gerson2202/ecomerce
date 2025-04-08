<?php

namespace App\Livewire;

use App\Models\Articulo;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;

class ArticulosComponent extends Component
{
    // Escucha el evento de eliminación
    #[On('deleteArticulo')]
    public function confirmDelete($id)
    {
        DB::beginTransaction();

    try {
        $articulo = Articulo::with(['fotos', 'materiales', 'numerales', 'articuloNumerales'])->findOrFail($id);

        // Eliminar archivos físicos de las fotos
        foreach ($articulo->fotos as $foto) {
            $filePath = "articulos/" . basename($foto->url); // Ejemplo: "articulos/imagen.jpg"
            
            // Eliminar de storage (apunta a public/storage/articulos)
            if (Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
        }

        // Eliminar relaciones
        $articulo->materiales()->detach();
        $articulo->numerales()->detach();
        $articulo->articuloNumerales()->delete();
        $articulo->fotos()->delete();

        // Eliminar el artículo
        $articulo->delete();

        DB::commit();

        return redirect()->route('articulos.index')
            ->with('success', 'Artículo y sus imágenes eliminados correctamente.');

    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()
            ->with('error', 'Error al eliminar: ' . $e->getMessage());
    }
          
           
       
    }

    public function edit($id)
    {
        return redirect()->route('articulos.edit', $id);
    }

    public function show($id)
    {
        return redirect()->route('articulos.show', $id);
    }

    public function render()
    {
        return view('livewire.articulos-component', [
            'articulos' => Articulo::with(['categoria', 'fotos', 'materiales'])->get()
        ]);
    }
}