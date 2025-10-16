<div class="container-fluid">
    <div class="row">
        <!-- Columna de Numerales -->
        <div class="col-md-6">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h3 class="h5 mb-0">Numerales</h3>
                </div>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <input 
                        wire:model="numero"
                        type="number"
                        min="0"
                        max="20"
                        step="1"
                        placeholder="Nuevo numeral (0-20)"
                        class="form-control"
                        oninput="this.value = Math.abs(this.value) > 20 ? 20 : Math.abs(this.value)"
                    >
                        <button 
                            wire:click="guardarNumeral" 
                            class="btn btn-primary"
                        >
                            <i class="fas fa-plus"></i> Agregar
                        </button>
                    </div>
                    
                    <div class="list-group">
                        @foreach($numerals as $numeral)
                            <div class="list-group-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <button
                                        wire:click="seleccionarNumeral({{ $numeral->id }})"
                                        class="btn bg-light rounded-pill {{ $numeralSeleccionado == $numeral->id ? 'active' : '' }}"
                                    >
                                        # {{ $numeral->numero }}
                                    </button>
                                    <div class="btn-group" onclick="event.stopPropagation()">
                                        <button 
                                            class="btn btn-sm btn-outline-secondary"
                                            wire:click="prepararEditarNumeral({{ $numeral->id }})"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editNumeralModal"
                                        >
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button 
                                            class="btn btn-sm btn-outline-danger "
                                            onclick="confirm('¿Eliminar este numeral?') || event.stopImmediatePropagation()"
                                            wire:click="eliminarNumeral({{ $numeral->id }})"
                                        >
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    @if($numerals->lastPage() > 1)
                        <div class="d-flex justify-content-center mt-3">
                            <nav>
                                <ul class="pagination pagination-sm mb-0">
                                    @for ($i = 1; $i <= $numerals->lastPage(); $i++)
                                        <li class="page-item {{ $numerals->currentPage() == $i ? 'active' : '' }}">
                                            <button 
                                                wire:click="gotoPage({{ $i }})" 
                                                class="page-link"
                                            >
                                                {{ $i }}
                                            </button>
                                        </li>
                                    @endfor
                                </ul>
                            </nav>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Columna de Dimensiones -->
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="h5 mb-0">Dimensiones</h3>
                </div>
                <div class="card-body">
                    @if($numeralSeleccionado)
                        @if($currentNumeral)
                            <div class="input-group mb-3">
                                <input 
                                    wire:model="medida" 
                                    type="text" 
                                    placeholder="Nueva dimensión" 
                                    class="form-control"
                                    required
                                >
                                <button 
                                    wire:click="guardarDimension" 
                                    class="btn btn-primary"
                                >
                                    <i class="fas fa-plus"></i> Agregar
                                </button>
                            </div>
                            <div class="alert alert-success d-inline-flex align-items-center py-1 px-1 rounded-pill shadow-sm">
                                <i class="fas fa-check-circle me-2"></i>
                                <span>
                                    <strong>Numeral seleccionado:</strong>
                                    <span class="fw-bold text-dark">{{ $nombreNumeral }}</span>
                                </span>
                            </div>
                            <hr>    
                            
                            @if($currentNumeral->dimensiones->count() > 0)
                                <div class="list-group">
                                    @foreach($currentNumeral->dimensiones as $dimension)
                                        <div class="list-group-item">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span>{{ $dimension->medida }}</span>
                                                <div class="btn-group" onclick="event.stopPropagation()">
                                                    <button 
                                                        class="btn btn-sm btn-outline-secondary"
                                                        wire:click="prepararEditarDimension({{ $dimension->id }})"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editDimensionModal"
                                                    >
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button 
                                                        class="btn btn-sm btn-outline-danger"
                                                        onclick="confirm('¿Eliminar esta dimensión?') || event.stopImmediatePropagation()"
                                                        wire:click="eliminarDimension({{ $dimension->id }})"
                                                    >
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="alert alert-info mb-0">
                                    <i class="fas fa-info-circle me-2"></i>
                                    Este numeral no tiene dimensiones asociadas
                                </div>
                            @endif
                        @else
                            <div class="alert alert-warning mb-0">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                El numeral seleccionado no existe
                            </div>
                        @endif
                    @else
                        <div class="alert alert-secondary mb-0">
                            <i class="fas fa-hand-pointer me-2"></i>
                            Selecciona un numeral para ver o agregar dimensiones
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Editar Numeral -->
    <div class="modal fade" id="editNumeralModal" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Editar Numeral</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Número</label>
                        <input 
                            wire:model="editNumero" 
                            type="number" 
                            class="form-control"
                            oninput="this.value = Math.abs(this.value) > 20 ? 20 : Math.abs(this.value)"

                        >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button 
                        type="button" 
                        class="btn btn-primary"
                        wire:click="actualizarNumeral"
                    >
                        <i class="fas fa-save me-2"></i> Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Editar Dimensión -->
    <div class="modal fade" id="editDimensionModal" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Editar Dimensión</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Medida</label>
                        <input 
                            wire:model="editMedida" 
                            type="text" 
                            class="form-control"
                        >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button 
                        type="button" 
                        class="btn btn-primary"
                        wire:click="actualizarDimension"
                    >
                        <i class="fas fa-save me-2"></i> Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
 


