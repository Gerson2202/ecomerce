<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Categorías</h3>
            <div class="card-tools">
                <button wire:click="create" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Agregar Categoría
                </button>
            </div>
        </div>
        
        <div class="card-body">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
    
            <table class="table table-bordered table-striped">
                <thead class="bg-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->nombre }}</td>
                            <td>{{ $categoria->descripcion }}</td>
                            <td class="text-center">
                                <button wire:click="edit({{ $categoria->id }})" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Editar
                                </button>
                                <button wire:click="delete({{ $categoria->id }})" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    
            {{ $categorias->links() }}
        </div>
    
        <!-- Modal -->
        @if($modal)
            <div class="modal fade show d-block" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ $categoria_id ? 'Editar Categoría' : 'Nueva Categoría' }}</h5>
                            <button type="button" class="close" wire:click="closeModal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" wire:model="nombre" class="form-control">
                                @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label>Descripción</label>
                                <textarea wire:model="descripcion" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button wire:click="closeModal" class="btn btn-secondary">Cancelar</button>
                            @if($categoria_id)
                                <button wire:click="update" class="btn btn-success">Actualizar</button>
                            @else
                                <button wire:click="store" class="btn btn-primary">Guardar</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Card de Materiales (debajo del card de categorías) -->
<div class="card mt-4">
    <div class="card-header">
        <h3 class="card-title">Lista de Materiales</h3>
        <div class="card-tools">
            <button wire:click="createMaterial" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Agregar Material
            </button>
        </div>
    </div>
    
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="bg-light">
                <tr>
                    <th>Nombre</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($materiales as $material)
                    <tr>
                        <td>{{ $material->nombre }}</td>
                        <td class="text-center">
                            <!-- Botón Editar -->
                            <button wire:click="editMaterial({{ $material->id }})" 
                                    class="btn btn-warning btn-sm mr-2">
                                <i class="fas fa-edit"></i> Editar
                            </button>
                            
                            <!-- Botón Eliminar -->
                            <button wire:click="deleteMaterial({{ $material->id }})" 
                                    class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal para Materiales -->
@if($modal_material)
    <div class="modal fade show d-block" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        {{ $material_id ? 'Editar Material' : 'Nuevo Material' }}
                    </h5>
                    <button wire:click="$set('modal_material', false)" class="close">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nombre del Material</label>
                        <input type="text" wire:model="nombre_material" class="form-control" autofocus>
                        @error('nombre_material') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button wire:click="$set('modal_material', false)" 
                            class="btn btn-secondary">
                        Cancelar
                    </button>
                    
                    @if($material_id)
                        <button wire:click="updateMaterial" 
                                class="btn btn-success">
                            Actualizar
                        </button>
                    @else
                        <button wire:click="storeMaterial" 
                                class="btn btn-primary">
                            Guardar
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif
    
    <script>
        Livewire.on('notify', (data) => {
            toastr[data.type](data.message, 'Mensaje del sistema', {
                "positionClass": "toast-bottom-right",
                "progressBar": true,
                "timeOut": "3000"
            });
        });
    </script>
    
    
</div>
