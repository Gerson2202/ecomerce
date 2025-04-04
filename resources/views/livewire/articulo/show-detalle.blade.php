<div>
    <div class="container-fluid">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">{{ $articulo->nombre }}</h3>
                    <span class="badge bg-{{ $articulo->estado == 'activo' ? 'success' : 'danger' }} fs-6">
                        {{ strtoupper($articulo->estado) }}
                    </span>
                </div>
            </div>
            
            <div class="card-body">
                <!-- Sección de Galería de Fotos -->
                    <!-- Sección de Galería de Fotos -->
                <div class="mb-5">
                    <h4 class="border-bottom pb-2 mb-4">
                        <i class="fas fa-images me-2"></i>Galería de Fotos
                    </h4>
                    
                    @if($fotos->count() > 0)
                        <!-- Galería de miniaturas - Versión simplificada -->
                        <div class="row g-3">
                            @foreach($fotos as $foto)
                                <div class="col-md-4 col-lg-3">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <img 
                                            src="{{ asset('storage/' . $foto->url) }}" 
                                            class="card-img-top img-fluid cursor-pointer" 
                                            alt="{{ $foto->descripcion }}"
                                            style="height: 200px; object-fit: cover;"
                                            onclick="openLightbox('{{ asset('storage/' . $foto->url) }}', '{{ $foto->descripcion }}')"
                                        >
                                        <div class="card-body text-center">
                                            <small class="text-muted">{{ $foto->descripcion }}</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Modal Lightbox - Versión simplificada -->
                        <div class="modal fade" id="imageLightbox" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-fullscreen">
                                <div class="modal-content bg-dark">
                                    <div class="modal-header border-0">
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center p-0">
                                        <img id="lightboxImage" src="" class="img-fluid" style="max-height: 80vh;">
                                    </div>
                                    <div class="modal-footer border-0 justify-content-center">
                                        <p id="lightboxDescription" class="text-white mb-0"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-warning">
                            <i class="fas fa-exclamation-circle me-2"></i>Este artículo no tiene fotos registradas
                        </div>
                    @endif
                </div>
                <!-- Sección de Información Básica -->
                <div class="row mb-5">
                    <div class="col-md-6">
                        <div class="card h-100 border-primary">
                            <div class="card-header bg-primary text-white">
                                <i class="fas fa-info-circle me-2"></i>Información Básica
                            </div>
                            <div class="card-body">
                                <dl class="row">
                                    <dt class="col-sm-4">Código:</dt>
                                    <dd class="col-sm-8">{{ $articulo->codigo }}</dd>
                                    
                                    <dt class="col-sm-4">Categoría:</dt>
                                    <dd class="col-sm-8">{{ $articulo->categoria->nombre }}</dd>
                                    
                                    <dt class="col-sm-4">Precio:</dt>
                                    <dd class="col-sm-8">${{ number_format($articulo->precio, 2) }}</dd>
                                    
                                    <dt class="col-sm-4">Stock:</dt>
                                    <dd class="col-sm-8">
                                        <span class="badge bg-{{ $articulo->stock > 0 ? 'info' : 'danger' }}">
                                            {{ $articulo->stock }} unidades
                                        </span>
                                    </dd>
                                    
                                    @if($articulo->numerales->count() > 0)
                                        <dt class="col-sm-4">Numerales:</dt>
                                        <dd class="col-sm-8">
                                            <div class="accordion" id="numeralesAccordion">
                                                @foreach($articulo->numerales as $numeral)
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="heading{{ $numeral->id }}">
                                                            <button class="accordion-button collapsed" type="button" 
                                                                    data-bs-toggle="collapse" 
                                                                    data-bs-target="#collapse{{ $numeral->id }}" 
                                                                    aria-expanded="false" 
                                                                    aria-controls="collapse{{ $numeral->id }}">
                                                                Numeral {{ $numeral->numero }}
                                                            </button>
                                                        </h2>
                                                        <div id="collapse{{ $numeral->id }}" 
                                                            class="accordion-collapse collapse" 
                                                            aria-labelledby="heading{{ $numeral->id }}" 
                                                            data-bs-parent="#numeralesAccordion">
                                                            <div class="accordion-body">
                                                                @if($numeral->dimensiones->count() > 0)
                                                                    <ul class="list-group list-group-flush">
                                                                        @foreach($numeral->dimensiones as $dimension)
                                                                            <li class="list-group-item">
                                                                                Medida: {{ $dimension->medida }}
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @else
                                                                    <p class="text-muted">Este numeral no tiene medidas registradas</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </dd>
                                    @else
                                        <dt class="col-sm-4">Numerales:</dt>
                                        <dd class="col-sm-8">
                                            <span class="text-muted">No tiene numerales asociados</span>
                                        </dd>
                                    @endif
                                </dl>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card h-100 border-success">
                            <div class="card-header bg-success text-white">
                                <i class="fas fa-align-left me-2"></i>Descripción
                            </div>
                            <div class="card-body">
                                {!! $articulo->descripcion ?? '<span class="text-muted">Sin descripción adicional</span>' !!}
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- Sección de Materiales -->
                <div>
                    <h4 class="border-bottom pb-2 mb-4">
                        <i class="fas fa-cubes me-2"></i>Materiales de Construcción
                    </h4>
                    
                    @if($materiales->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Material</th>
                                        <th class="text-center">Cantidad</th>
                                        <th class="text-center">Unidad</th>
                                        <th>Notas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($materiales as $material)
                                        <tr>
                                            <td>
                                                <strong>{{ $material->nombre }}</strong>
                                                <br>
                                                <small class="text-muted">{{ $material->codigo }}</small>
                                            </td>
                                            <td class="text-center align-middle">
                                                <span class="badge bg-primary rounded-pill px-3 py-2">
                                                    {{ $material->pivot->cantidad }}
                                                </span>
                                            </td>
                                            <td class="text-center align-middle">
                                                {{ $material->unidad_medida }}
                                            </td>
                                            <td class="align-middle">
                                                {{ $material->pivot->notas ?? 'N/A' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>Este artículo no tiene materiales registrados
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="card-footer bg-light">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('articulos.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Volver al listado
                    </a>
                    <div>
                        <a href="{{ route('articulos.edit', $articulo->id) }}" class="btn btn-warning me-2">
                            <i class="fas fa-edit me-2"></i>Editar
                        </a>
                        <button class="btn btn-danger" onclick="confirmDelete({{ $articulo->id }})">
                            <i class="fas fa-trash me-2"></i>Eliminar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <script>
        // Función simplificada para abrir el lightbox
        function openLightbox(imageUrl, description) {
            const lightbox = new bootstrap.Modal(document.getElementById('imageLightbox'));
            document.getElementById('lightboxImage').src = imageUrl;
            document.getElementById('lightboxDescription').textContent = description;
            lightbox.show();
        }
    </script>
    
</div>
