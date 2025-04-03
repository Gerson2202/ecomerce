<?php

namespace App\Livewire;

use App\Models\Articulo;
use Livewire\Component;
use Livewire\WithPagination;

class ArticulosComponent extends Component
{
    public function render()
    {
        return view('livewire.articulos-component', [
            'articulos' => Articulo::with(['categoria', 'fotos', 'materiales'])->get()
        ]);
    }

    public function edit($id)
    {
        return redirect()->route('articulos.edit', $id);
    }

    public function show($id)
    {
        return redirect()->route('articulos.show', $id);
    }

    public function deleteConfirm($id)
    {
        $this->dispatch('confirmDelete', id: $id);
    }
}
