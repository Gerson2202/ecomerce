<?php

namespace App\Livewire;

use App\Models\Articulo;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Attributes\On;

class ArticulosComponent extends Component
{
    // Escucha el evento de eliminación
    #[On('deleteArticulo')]
    public function confirmDelete($id)
    {
       
       
            Articulo::findOrFail($id)->delete();
            $this->dispatch('notify', type: 'success', message: 'Dimensión eliminada correctamente');
      
            // $this->dispatch('refreshDatatable');
       
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