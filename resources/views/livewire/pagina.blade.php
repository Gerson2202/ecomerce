<div>
    <!-- CSS de Bootstrap y estilos personalizados -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>

        /* estilos de inconos de redes */
            .social-float {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .social-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            transition: transform 0.3s;
        }
        .social-btn:hover {
            transform: translateY(-5px);
        }
        .btn-whatsapp {
            background-color: #25D366;
        }
        .btn-instagram {
            background: linear-gradient(45deg, #405DE6, #833AB4, #C13584, #E1306C, #FD1D1D);
        }
        /* Fin */
          .navbar-nav .nav-link {
            padding: 0.5rem 1rem;
            display: flex;
            align-items: center;
        }
        .navbar-nav .nav-link i {
            margin-right: 0.5rem;
        }
        .dropdown-menu {
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        }
        .dropdown-item {
            padding: 0.5rem 1.5rem;
        }
        .search-box {
            width: 300px;
        }
        @media (max-width: 992px) {
            .search-box {
                width: 100%;
                margin: 10px 0;
            }
            .navbar-nav {
                margin-top: 10px;
            }
        }
        /* Estilos personalizados */
        .hero-image {
        height: 500px; /* Cambia este valor (ej: 500px, 600px, etc.) */
        object-fit: cover;
        width: 100%;
         }
        .product-img {
            height: 200px;
            object-fit: cover;
            cursor: pointer;
            width: 100%;
            transition: transform 0.3s ease;
        }
        .product-img:hover {
            transform: scale(1.03);
        }
        .modal-img {
            height: 400px;
            object-fit: contain;
            width: 100%;
        }
        .whatsapp-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }
        .carousel-control-prev,
        .carousel-control-next {
            width: 5%;
        }
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: rgba(0,0,0,0.5);
            border-radius: 50%;
            padding: 15px;
            background-size: 1.5rem;
        }
        .carousel-indicators button {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin: 0 5px;
        }
        .no-image-placeholder {
            height: 200px;
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
        }
    </style>

    <!-- Header -->
      <!-- Header Unificado -->
      <header class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand fw-bold text-primary" href="{{route ('dashboard')}}">
                <i class="bi bi-shop me-2"></i>Mi Tienda
            </a>
            
            <!-- Botón para móviles -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Contenido del navbar -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <!-- Menú principal unificado -->
                <ul class="navbar-nav me-auto">
                    <!-- Ítem de Inicio -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-house"></i>Inicio
                        </a>
                    </li>
                    
                    <!-- Menú desplegable de Productos -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="productsDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-grid"></i>Productos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="productsDropdown">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-star"></i> Nuevos</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-tag"></i> Ofertas</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-collection"></i> Todos</a></li>
                        </ul>
                    </li>
                    
                    <!-- Selector de Categorías (integrado) -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-tag"></i>Categorías
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                            @foreach($categorias as $categoria)
                                <li>
                                    <button wire:click="seleccionarCategoria({{ $categoria->id }})" 
                                            class="dropdown-item d-flex justify-content-between align-items-center">
                                        <span>{{ $categoria->nombre }}</span>
                                        @if($categoriaSeleccionada == $categoria->id)
                                            <i class="bi bi-check-lg text-primary"></i>
                                        @endif
                                    </button>
                                </li>
                            @endforeach
                            @if($categoriaSeleccionada)
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <button wire:click="seleccionarCategoria(null)" 
                                            class="dropdown-item text-primary">
                                        <i class="bi bi-x-circle me-1"></i>Mostrar todos
                                    </button>
                                </li>
                            @endif
                        </ul>
                    </li>
                    
                    <!-- Ítem de Contacto -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-headset"></i>Contacto
                        </a>
                    </li>
                </ul>
                
                <!-- Buscador -->
                <form class="d-flex search-box" wire:submit.prevent="">
                    <div class="input-group">
                        <input type="text" class="form-control" 
                               placeholder="Buscar productos..." 
                               wire:model.lazy="search">
                        <button class="btn btn-outline-primary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
      </header>

    <!-- Hero con Carrusel -->
    <section class="mb-5">
        <!-- Reemplaza el carrusel hero con estas imágenes religiosas -->
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- 1. Virgen María -->
                <div class="carousel-item active">
                    <img src="https://images.pexels.com/photos/236339/pexels-photo-236339.jpeg" class="d-block w-100 hero-image" alt="Virgen María">
                    <div class="carousel-caption bg-dark bg-opacity-75 rounded p-3">
                        <h2 class="h3 fw-bold">Bienvenidos a nuestra comunidad</h2>
                        <p>"Yo soy la luz del mundo" - Juan 8:12</p>
                    </div>
                </div>
                
                <!-- 2. Jesús Buen Pastor -->
                <div class="carousel-item">
                    <img src="https://images.pexels.com/photos/415071/pexels-photo-415071.jpeg" class="d-block w-100 hero-image" alt="Jesús Buen Pastor">
                    <div class="carousel-caption bg-dark bg-opacity-75 rounded p-3">
                        <h2 class="h3 fw-bold">El buen pastor</h2>
                        <p>"Yo soy el buen pastor" - Juan 10:11</p>
                    </div>
                </div>
                
                <!-- 3. Crucifixión -->
                <div class="carousel-item">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Iglesia_Catolica_Apostolica_Ortodoxa_de_la_Santisima_Virgen_Maria_14.JPG/640px-Iglesia_Catolica_Apostolica_Ortodoxa_de_la_Santisima_Virgen_Maria_14.JPG" class="d-block w-100 hero-image" alt="Crucifixión">
                    <div class="carousel-caption bg-dark bg-opacity-75 rounded p-3">
                        <h2 class="h3 fw-bold">El sacrificio de amor</h2>
                        <p>"Nadie tiene mayor amor que este" - Juan 15:13</p>
                    </div>
                </div>
                
                <!-- 4. Biblia Abierta -->
                <div class="carousel-item">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/GustaveDoreParadiseLostSatanProfile.jpg/640px-GustaveDoreParadiseLostSatanProfile.jpg" class="d-block w-100 hero-image" alt="Biblia">
                    <div class="carousel-caption bg-dark bg-opacity-75 rounded p-3">
                        <h2 class="h3 fw-bold">Palabra de Dios</h2>
                        <p>"Lámpara es a mis pies tu palabra" - Salmo 119:105</p>
                    </div>
                </div>
            </div>
            <!-- Controles del carrusel -->
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
    </section>

    <!-- Sección de Artículos -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">
                @if($categoriaSeleccionada)
                    {{ $categorias->find($categoriaSeleccionada)->nombre }}
                @else
                    Nuestros Productos
                @endif
            </h2>
            
            @if($articulos->isEmpty())
                <div class="text-center py-5">
                    <div class="alert alert-info">
                        No se encontraron productos en esta categoría.
                    </div>
                </div>
            @else
                <div class="row g-4">
                    @foreach($articulos as $articulo)
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="card h-100 shadow-sm border-0 overflow-hidden">
                                @if($articulo->fotos->isNotEmpty())
                                    <img src="{{ asset('storage/' . $articulo->fotos->first()->url) }}" 
                                         class="card-img-top product-img"
                                         wire:click="mostrarArticulo({{ $articulo->id }})"
                                         alt="{{ $articulo->nombre }}">
                                @else
                                    <div class="no-image-placeholder">
                                        <i class="bi bi-image fs-1"></i>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <h3 class="card-title h5 mb-0">{{ $articulo->nombre }}</h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h3 class="h5 fw-bold mb-3">Mi Tienda</h3>
                    <p class="text">Los mejores productos para nuestros clientes con la mejor calidad del mercado.</p>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h3 class="h5 fw-bold mb-3">Contacto</h3>
                    <ul class="list-unstyled text-">
                        <li class="mb-2"><i class="bi bi-envelope me-2"></i> info@mitienda.com</li>
                        <li class="mb-2"><i class="bi bi-phone me-2"></i> +123 456 7890</li>
                        <li><i class="bi bi-geo-alt me-2"></i> Av. Principal 123, Ciudad</li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h3 class="h5 fw-bold mb-3">Horario</h3>
                    <ul class="list-unstyled text-">
                        <li class="mb-2">Lunes - Viernes: 9am - 7pm</li>
                        <li class="mb-2">Sábado: 9am - 2pm</li>
                        <li>Domingo: Cerrado</li>
                    </ul>
                </div>
            </div>
            <hr class="my-4 border-secondary">
            <div class="text-center">
                <p class="mb-0 small text-muted">&copy; {{ date('Y') }} Mi Tienda. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Modal de Artículo -->
    @if($mostrarModal && $articuloSeleccionado)
        <div class="modal fade show d-block" tabindex="-1" style="background-color: rgba(0,0,0,0.5);" wire:click="cerrarModal">
            <div class="modal-dialog modal-lg modal-dialog-centered" @click.stop>
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title h4">{{ $articuloSeleccionado->nombre }}</h2>
                        <button type="button" class="btn-close" wire:click="cerrarModal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if($articuloSeleccionado->fotos->isNotEmpty())
                            <div id="articuloCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
                                <div class="carousel-inner rounded-3 overflow-hidden">
                                    @foreach($articuloSeleccionado->fotos as $key => $foto)
                                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                            <img src="{{ asset('storage/' . $foto->url) }}" 
                                                 class="d-block w-100 modal-img"
                                                 alt="Foto {{ $key + 1 }} de {{ $articuloSeleccionado->nombre }}">
                                        </div>
                                    @endforeach
                                </div>
                                @if($articuloSeleccionado->fotos->count() > 1)
                                    <button class="carousel-control-prev" type="button" data-bs-target="#articuloCarousel" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Anterior</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#articuloCarousel" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Siguiente</span>
                                    </button>
                                    <div class="carousel-indicators position-static mt-3">
                                        @foreach($articuloSeleccionado->fotos as $key => $foto)
                                            <button type="button" data-bs-target="#articuloCarousel" 
                                                    data-bs-slide-to="{{ $key }}" 
                                                    class="{{ $key === 0 ? 'active' : '' }} bg-secondary"
                                                    aria-current="{{ $key === 0 ? 'true' : 'false' }}"
                                                    aria-label="Slide {{ $key + 1 }}"></button>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @else
                            <div class="text-center py-4 bg-light rounded mb-4">
                                <i class="bi bi-image text-muted fs-1 mb-2"></i>
                                <p class="text-muted">Este artículo no tiene imágenes disponibles</p>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <h3 class="h5 fw-bold">Descripción</h3>
                                <p class="text-muted">{{ $articuloSeleccionado->descripcion }}</p>
                            </div>
                            <div class="col-md-6">
                                <h3 class="h5 fw-bold">Dimensiones</h3>
                                <p class="text-muted">{{ $articuloSeleccionado->dimensiones }}</p>
                                
                                <h3 class="h5 fw-bold mt-3">Categoría</h3>
                                <p class="text-muted">{{ $articuloSeleccionado->categoria->nombre }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center border-top-0">
                        <a href="https://wa.me/573215852059?text=Estoy%20interesado%20en%20el%20producto%20{{ urlencode($articuloSeleccionado->nombre) }}" 
                           class="btn btn-success px-4 py-2"
                           target="_blank">
                            <i class="bi bi-whatsapp me-2"></i> Consultar por WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Botones flotantes redes sociales -->
    {{-- Instagram --}}
    <div class="social-float">
        <a href="https://www.instagram.com/imagenes_santabarbara/?igsh=MTlwaGI0aXZoemJraQ%3D%3D#" 
           class="social-btn btn-instagram"
           target="_blank"
           title="Instagram">
            <i class="bi bi-instagram fs-5"></i>
        </a>
        {{-- facebook --}}
        <a href="https://wa.me/573125085577" 
           class="social-btn btn-whatsapp"
           target="_blank"
           title="WhatsApp">
            <i class="bi bi-whatsapp fs-5"></i>
        </a>
    </div>
    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</div>