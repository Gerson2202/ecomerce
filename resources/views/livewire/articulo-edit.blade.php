<div>
    <div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title">
            <i class="fas fa-edit mr-2"></i>Editar Artículo
        </h3>
    </div>
    <div class="card-body">
        <form wire:submit.prevent="update">
            <!-- Nombre -->
            <div class="form-group">
                <label>Nombre del Artículo</label>
                <input type="text" wire:model="nombre" class="form-control">
                @error('nombre') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>

            <!-- Descripción -->
            <div class="form-group">
                <label>Descripción</label>
                <textarea wire:model="descripcion" class="form-control" rows="3"></textarea>
            </div>
            <!-- Categoría -->
            <div class="form-group">
                <label>Categoría</label>
                <select wire:model="categoria_id" class="form-control">
                    <option value="">Seleccione una categoría</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $categoria->id == $categoria_id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('categoria_id') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>

            <!-- Materiales -->
             <!-- Materiales (Checkboxes) -->
             <div class="form-group">
                <label class="mb-2">Materiales <span class="text-danger">*</span></label>
                <div class="row">
                    @foreach($todosMateriales as $material)
                        <div class="col-md-2">
                            <div class="form-check">
                                <input 
                                    type="checkbox" 
                                    wire:model="materialesSeleccionados"
                                    value="{{ $material->id }}"
                                    id="material-{{ $material->id }}"
                                    class="form-check-input"
                                >
                                <label for="material-{{ $material->id }}" class="form-check-label">
                                    {{ $material->nombre }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
                @error('materialesSeleccionados') 
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label class="mb-2">Numerales <span class="text-danger">*</span></label>
                <div class="row">
                    @foreach($todosNumerales as $numeral)
                        <div class="col-md-2">
                            <div class="form-check">
                                <input 
                                    type="checkbox" 
                                    wire:model="numeralesSeleccionados"
                                    value="{{ $numeral->id }}"
                                    id="material-{{ $numeral->id }}"
                                    class="form-check-input"
                                >
                                <label for="numeral-{{ $numeral->id }}" class="form-check-label">
                                    #{{ $numeral->numero }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
                @error('numeralesSeleccionados') 
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>


            <!-- Fotos existentes -->
            <div class="form-group">
                <label>Fotos Actuales</label>
                <div class="d-flex flex-wrap gap-2">
                    @foreach($fotosExistentes as $index => $foto)
                        <div class="position-relative">
                            <img src="{{ asset('storage/'.$foto->url) }}" 
                                 class="img-thumbnail" 
                                 style="width: 100px; height: 100px; object-fit: cover;">
                            <button type="button" 
                                    wire:click="removeFoto({{ $index }})"
                                    class="btn btn-danger btn-sm position-absolute top-0 end-0">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Nuevas fotos -->
            <div class="form-group">
                <label>Agregar Más Fotos</label>
                <input type="file" wire:model="fotos" multiple class="form-control">
                <div class="d-flex flex-wrap gap-2 mt-2">
                    @foreach($fotos as $index => $foto)
                        <div class="position-relative">
                            <img src="{{ $foto->temporaryUrl() }}" 
                                 class="img-thumbnail" 
                                 style="width: 100px; height: 100px; object-fit: cover;">
                            <button type="button" 
                                    wire:click="removeNewFoto({{ $index }})"
                                    class="btn btn-danger btn-sm position-absolute top-0 end-0">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group mt-4">
                
                <a href="{{ route('articulos.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Volver al listado
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save mr-2"></i>Guardar Cambios
                </button>
                
                <a href="{{ route('articulos.show', $articulo_id) }}" class="btn btn-success ml-2">
                    <i class="fas fa-eye mr-2"></i>Ver articulo
                </a>
            </div>
        </form>
    </div>
</div>
</div>
