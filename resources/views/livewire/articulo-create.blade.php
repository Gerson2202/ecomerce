<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Registrar Nuevo Artículo</h3>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="save">
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" wire:model="nombre" class="form-control" required>
                    @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
    
                <div class="form-group">
                    <label>Descripción</label>
                    <textarea wire:model="descripcion" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label>Categoría</label>
                    <select wire:model="categoria_id" class="form-control" required>
                        <option value="">Seleccione una categoría</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                    @error('categoria_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
    
                <!-- Selección de Materiales -->
                <div>
                    <label class="block">Materiales</label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-2 mt-2">
                        @foreach($todosMateriales as $material)
                            <label class="inline-flex items-center">
                                <input type="checkbox" 
                                    wire:model="materialesSeleccionados" 
                                    value="{{ $material->id }}"
                                    class="rounded text-blue-600">
                                <span class="ml-2">{{ $material->nombre }}</span>
                            </label>
                        @endforeach
                    </div>
                    @error('materialesSeleccionados') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <!-- Selección de Numerales -->
                <div class="form-group mt-4">
                    <label class="font-weight-bold">Numerales aplicables</label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-2 mt-2">
                        @foreach($numerals as $numeral)
                            <label class="inline-flex items-center">
                                <span class="ml-2"># {{ $numeral->numero }}</span>
                                <input type="checkbox" 
                                    wire:model="numeralsSeleccionados" 
                                    value="{{ $numeral->id }}"
                                    class="rounded text-blue-600" >
                            </label>
                        @endforeach
                    </div>
                    @error('numeralsSeleccionados') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>
    
                <div class="container mt-3">
                    <!-- Input de archivo estilizado -->
                    <div class="form-group">
                        <label class="form-label">Seleccionar fotos</label>
                        <div class="input-group mb-3">
                            <label class="btn btn-primary w-100">
                                <i class="fas fa-camera me-2"></i> Elegir archivos
                                <input 
                                    type="file" 
                                    wire:model="fotos" 
                                    multiple 
                                    accept="image/*" 
                                    class="d-none"
                                >
                            </label>
                        </div>
                        <small class="text-muted">Formatos: JPG, PNG (Máx. 2MB c/u)</small>
                        @error('fotos.*') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>
                
                    <!-- Miniaturas -->
                    <div class="d-flex flex-wrap gap-2 my-3">
                        @foreach($fotos as $index => $foto)
                            <div class="position-relative" style="width: 80px; height: 80px;">
                                <!-- Imagen pequeña -->
                                <img src="{{ is_string($foto) ? asset('storage/'.$foto) : $foto->temporaryUrl() }}" 
                                     class="img-thumbnail h-100 w-100 object-fit-cover">
                                
                                <!-- Botón eliminar (rojo) -->
                                <button 
                                    type="button"
                                    wire:click="removeFoto({{ $index }})"
                                    class="position-absolute top-0 start-100 translate-middle bg-danger text-white rounded-circle border-0" 
                                    style="width: 20px; height: 20px; transform: translate(-50%, -50%); font-size: 10px; line-height: 1;"
                                >
                                    ×
                                </button>
                            </div>
                        @endforeach
                    </div>
                
                    <!-- Contador -->
                    <div class="text-muted small">
                        {{ count($fotos) }} {{ Str::plural('foto', count($fotos)) }} seleccionadas
                    </div>
                </div>
                
                
                
                <div class="flex gap-3 mt-3">                    
                    <button type="submit" class="btn btn-primary flex-1">
                        Guardar Artículo
                    </button>
                    <a href="{{ route('articulos.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Volver al listado
                    </a>
                   
                </div>           
             </form>
        </div>
    </div>
    
    @push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('notify', (data) => {
                toastr[data.type](data.message);
            });
        });
    </script>
    @endpush
</div>
