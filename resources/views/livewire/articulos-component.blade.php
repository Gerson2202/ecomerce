<div>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="card-title">Artículos Registrados</h3>
                <a href="{{ route('articulos.create') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus mr-1"></i> Nuevo Artículo
                </a>
            </div>
        </div>
        <div class="card-body">
            <table id="articulos-table" class="table table-bordered table-hover w-100">
                <thead class="thead-light">
                    <tr>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Dimensiones</th>
                        <th>Categoría</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articulos as $articulo)
                    <tr>
                        <td>
                            @if($articulo->fotos->isNotEmpty())
                            <img src="{{ asset('storage/'.$articulo->fotos->first()->url) }}" 
                                 class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                            @else
                            <div class="bg-light d-flex align-items-center justify-content-center" 
                                 style="width: 60px; height: 60px;">
                                <i class="fas fa-image text-muted"></i>
                            </div>
                            @endif
                        </td>
                        <td>{{ $articulo->nombre }}</td>
                        <td>{{ $articulo->descripcion ?? 'Sin descripción' }}</td>
                        <td>{{ $articulo->dimensiones ?? 'N/A' }}</td>
                        <td>
                            <span class="badge bg-info">
                                {{ $articulo->categoria->nombre }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group">
                                <button wire:click="show({{ $articulo->id }})" 
                                        class="btn btn-sm btn-info" title="Ver">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button wire:click="edit({{ $articulo->id }})" 
                                        class="btn btn-sm btn-warning" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button onclick="confirmDelete({{ $articulo->id }})" 
                                        class="btn btn-sm btn-danger" title="Eliminar">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    @push('js')
    <script>
        $(document).ready(function() {
            $('#articulos-table').DataTable({
                responsive: true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                },
                columnDefs: [
                    { orderable: false, targets: [0, 5] },
                    { searchable: false, targets: [0, 5] }
                ]
            });
        });
    
        function confirmDelete(id) {
            Swal.fire({
                title: '¿Eliminar artículo?',
                text: "Esta acción no se puede deshacer",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteArticulo', id);
                }
            });
        }
    
        document.addEventListener('livewire:load', function() {
            Livewire.on('notify', (data) => {
                toastr[data.type](data.message);
            });
        });
    </script>
    @endpush
</div>
