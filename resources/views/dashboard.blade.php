@extends('adminlte::page')
@section('title', 'Dashboard') <!-- Corregí "Dasboard" a "Dashboard" -->

@section('content_header')
   <h1 class="ml-3">Dashboard</h1>
   @livewireStyles
    <!-- Agrega los estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
@stop

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- Artículos -->
        <div class="col-lg-4 col-6 d-flex">
            <div class="small-box bg-info w-100 d-flex flex-column">
                <div class="inner flex-grow-1">
                    <p># Artículos</p>
                    <h3>{{ $totalArticulos?? 'Sin articulos' }}</h3>           
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('articulos.index') }}" class="small-box-footer">En inventario<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        
        <!-- Categorías -->
        <div class="col-lg-4 col-6 d-flex">
            <div class="small-box bg-success w-100 d-flex flex-column">
                <div class="inner flex-grow-1">
                    <p> # Categorías</p>
                    <h3>{{ $totalCategorias }}</h3>           
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('categorias.index') }}" class="small-box-footer">Activas <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        
        <!-- Último Artículo -->
        <div class="col-12 col-md-6 col-lg-4 d-flex">
            <div class="small-box bg-warning w-100 d-flex flex-column">
                <div class="inner flex-grow-1">
                    <div class="d-flex align-items-center mb-2">
                        <span class="badge bg-primary me-2">NUEVO</span>
                        <h6 class="mb-0 fw-bold text-dark">
                            {{ $ultimoArticulo ? Str::limit($ultimoArticulo->nombre, 30) : 'Sin artículos' }}
                        </h6>                    </div>
                    <p>Último artículo registrado</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                @if($ultimoArticulo)
                <a href="{{ route('articulos.show', $ultimoArticulo->id) }}" class="small-box-footer">
                    Más info <i class="fas fa-arrow-circle-right"></i>
                </a>
            @else
                <a href="#" class="small-box-footer text-muted" style="cursor: not-allowed;">
                    Más info <i class="fas fa-arrow-circle-right"></i>
                </a>
            @endif            </div>
        </div>
        <!-- ./col -->
      </div>
    </div>
  </section>

@stop

@section('css')
    <!-- Puedes agregar estilos personalizados aquí si es necesario -->
@stop

@section('js')
    @livewireScripts  <!-- Livewire debe cargarse antes que cualquier otro script -->
    <!-- Agregar los scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Agregar SweetAlert2 desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Aquí incluye tus scripts personalizados -->
    @stack('scripts')
@stop

