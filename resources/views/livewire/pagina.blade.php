<div>
    <!-- CSS de Bootstrap y estilos personalizados -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    {{-- Stilos logo --}}
    <style>
        /* Contenedor ovalado */
        .logo-wrapper {
            width: 90px;        /* tamaño inicial */
            height: auto;
            border-radius: 50%; /* ovalado */
            overflow: hidden;
            background: #fff;   /* fondo blanco */
            padding: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* Efecto hover */
        .logo-wrapper:hover {
            transform: scale(1.05);
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.3);
        }

        /* Imagen responsive */
        .logo-wrapper img {
            width: 100%;
            height: auto;
            border-radius: 50%;
        }

        /* Responsive para celulares */
        @media (max-width: 576px) {
            .logo-wrapper {
                width: 70px; /* más pequeño en móviles */
                padding: 3px;
            }
        }
    </style>
    {{-- Stilos para los iconos --}}
    <style>
        /* Estilos para las banderas */
        .social-btn .flag {
            position: absolute;
            bottom: -5px;
            right: -5px;
            font-size: 16px;
            background: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ddd;
        }
        /* CONTENEDOR PRINCIPAL */
        .social-float {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        /* ESTILOS BASE PARA BOTONES */
        .social-btn {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
            transition: all 0.3s ease;
            position: relative;
            font-size: 26px;
            border: none;
            cursor: pointer;
        }

        /* TOOLTIPS A LA IZQUIERDA */
        .social-btn::before {
            content: attr(title);
            position: absolute;
            right: calc(100% + 15px);
            top: 50%;
            transform: translateY(-50%) translateX(10px);
            background: rgba(40, 40, 40, 0.95);
            color: #fff;
            padding: 8px 15px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            white-space: nowrap;
            opacity: 0;
            pointer-events: none;
            transition: all 0.3s ease;
            z-index: 1001;
            min-width: max-content;
            backdrop-filter: blur(4px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* FLECHA DEL TOOLTIP (AHORA A LA DERECHA) */
        .social-btn::after {
            content: '';
            position: absolute;
            right: calc(100% + 5px);
            top: 50%;
            transform: translateY(-50%);
            border-width: 6px;
            border-style: solid;
            border-color: transparent transparent transparent rgba(40, 40, 40, 0.95);
            opacity: 0;
            transition: all 0.3s ease;
        }

        /* ANIMACIONES DE HOVER */
        .social-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        .social-btn:hover::before {
            opacity: 1;
            transform: translateY(-50%) translateX(0);
        }

        .social-btn:hover::after {
            opacity: 1;
        }

        /* ESTILOS ESPECÍFICOS PARA CADA BOTÓN */
        .btn-instagram {

            background: linear-gradient(45deg, #405DE6, #833AB4, #C13584, #E1306C, #FD1D1D);
            border: 2px solid #fff;

        }

        .btn-whatsapp-co {
            background: linear-gradient(135deg, #25D366, #0ABF53);
            border: 2px solid #fff;
        }

        .btn-whatsapp-ve {
            background: linear-gradient(135deg, #128C7E, #075E54);
            border: 2px solid #fff;
        }

        /* COLORES DE TOOLTIP POR BOTÓN */
        .btn-instagram::before {
            background: linear-gradient(45deg, rgba(64, 93, 230, 0.95), rgba(193, 53, 132, 0.95));
        }

        .btn-instagram::after {
            border-left-color: rgba(193, 53, 132, 0.95);
        }

        .btn-whatsapp-co::before {
            background: rgba(37, 211, 102, 0.95);
        }

        .btn-whatsapp-co::after {
            border-left-color: rgba(37, 211, 102, 0.95);
        }

        .btn-whatsapp-ve::before {
            background: rgba(18, 140, 126, 0.95);
        }

        .btn-whatsapp-ve::after {
            border-left-color: rgba(18, 140, 126, 0.95);
        }

        /* EFECTO DE ONDA PARA WHATSAPP */
        .btn-whatsapp-co:hover,
        .btn-whatsapp-ve:hover {
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0% { transform: translateY(-3px) scale(1); }
            50% { transform: translateY(-3px) scale(1.05); }
            100% { transform: translateY(-3px) scale(1); }
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .social-float {
                bottom: 15px;
                right: 15px;
            }

            .social-btn {
                width: 50px;
                height: 50px;
                font-size: 24px;
            }

            .social-btn::before {
                font-size: 13px;
                padding: 6px 12px;
                right: calc(100% + 10px);
            }

            .social-btn::after {
                right: calc(100% + 2px);
            }
        }
    </style>
    {{-- Stilos para las imagenes en los recuadros --}}
    <style>
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
         /* Stilos para las fotos en los cuadros  */
         .clickable-area {
            cursor: pointer;
            height: 200px; /* Altura fija para el contenedor */
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background-color: #f8f9fa; /* Color de fondo para el contenedor */
        }

        .image-container {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .contained-image {
            max-width: 100%;
            max-height: 100%;
            width: auto;
            height: auto;
            object-fit: contain; /* Esto evita el recorte y mantiene la proporción */
        }

        .no-image-placeholder {
            width: 100%;
            height: 100%;
            background-color: #f8f9fa;
        }

        /* FINAL */
    </style>
    {{-- Stilos personalizados --}}
    <style>

        /* Estilos personalizados */
        .hero-image {
            width: 100%;
            height: 30vh; /* Para móviles */
        }


        @media (min-width: 768px) {
            .hero-image {
                height: 70vh; /* Para tablets */
            }
        }

        @media (min-width: 1200px) {/* Para pc */
            .hero-image {
                width: 100%;
                max-height: 70vh; /* Altura máxima */
                min-height: 300px; /* Altura mínima para móviles */
                height: auto; /* Altura flexible */
                object-fit: contain;
                object-position: center;
                background-color: #f8f9fa;
            }
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
<<<<<<< HEAD
            <!-- Logo - Cambios aquí -->
            <a href="#" class="d-block order-lg-2 ms-lg-auto" style="width: 130px; height: 55px;">
                <img src="{{ asset('storage/images/logo/4.png') }}" 
                    alt="Mi Tienda" 
                    class="h-100 w-auto rounded-circle shadow" 
                    style="object-fit: contain;">
=======
            <!-- Logo -->
            <a class="navbar-brand d-flex justify-content-center align-items-center" href="#">
                <div class="logo-wrapper shadow-lg">
                    <img src="{{ asset('storage/images/logo/4.png') }}" 
                        alt="Imágenes Santa Bárbara" 
                        class="img-fluid">
                </div>
>>>>>>> 321d555480c7ae7690ebba5db52f5e871758eb89
            </a>
            
            <!-- Botón para móviles - Añadí order-lg-1 -->
            <button class="navbar-toggler order-lg-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Contenido del navbar - Añadí order-lg-3 -->
            <div class="collapse navbar-collapse order-lg-3" id="navbarContent">
                <!-- Menú principal unificado -->
                <ul class="navbar-nav me-auto">
                    <!-- Ítem de Inicio -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-house"></i>Inicio
                        </a>
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
                        <a class="nav-link" href="#footer-section">
                            <i class="bi bi-headset"></i>Contacto
                        </a>
                    </li>
                </ul>

                
                <!-- Buscador -->
                <div class="d-flex search-box">
                    <div class="input-group">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Buscar productos..."
                            wire:model.live.debounce.500ms="search" 
                        >
                        <button class="btn btn-outline-primary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
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
                    <img src="{{ asset('storage/images/carrusel/nacimiento.jpg') }}"
                         class="d-block w-100 hero-image">
                         <div class="carousel-caption d-flex flex-column justify-content-end pb-2 pb-md-0">
                            <div class="bg-dark bg-opacity-75 rounded p-1 p-md-2 d-inline-block" style="max-width: 120%; transform: translateY(20px);">
                                <h2 class="fs-6 fs-md-4 fw-bold mb-0" style="word-spacing: -1px; letter-spacing: -0.5px;">Nacimiento</h2>
                                <p class="m-0 d-sm-block fs-7 fs-md-6" style="word-spacing: -0.5px;">"El milagro del Nacimiento, eterno en tu corazón."</p>
                            </div>
                        </div>
                </div>

                <!-- 2. Jesús Buen Pastor -->
                <div class="carousel-item">
                    <img src="{{ asset('storage/images/carrusel/navidena.jpg') }}"
                    class="d-block w-100 hero-image"
                    alt="Jesús Buen Pastor">
                    <div class="carousel-caption d-flex flex-column justify-content-end pb-2 pb-md-0">
                        <div class="bg-dark bg-opacity-75 rounded p-1 p-md-2 d-inline-block" style="max-width: 120%; transform: translateY(20px);">
                            <h2 class="fs-6 fs-md-4 fw-bold mb-0" style="word-spacing: -1px; letter-spacing: -0.5px;">Navideñas</h2>
                            <p class="m-0 d-sm-block fs-7 fs-md-6" style="word-spacing: -0.5px;">"La magia de la Navidad en tu hogar."</p>
                        </div>
                    </div>
                </div>

                <!-- 3. Crucifixión -->
                <div class="carousel-item">
                    <img src="{{ asset('storage/images/carrusel/esoterica.jpg') }}"
                    class="d-block w-100 hero-image"
                    alt="Jesús Buen Pastor">                    <div class="carousel-caption d-flex flex-column justify-content-end pb-2 pb-md-0">
                        <div class="bg-dark bg-opacity-75 rounded p-1 p-md-2 d-inline-block" style="max-width: 120%; transform: translateY(20px);">
                            <h2 class="fs-6 fs-md-4 fw-bold mb-0" style="word-spacing: -1px; letter-spacing: -0.5px;">Esotéricas</h2>
                            <p class="m-0 d-sm-block fs-7 fs-md-6" style="word-spacing: -0.5px;">"Arte sacro que inspira y eleva el espíritu."</p>
                        </div>
                    </div>
                </div>

                <!-- 4. Biblia Abierta -->
                <!-- 3. Crucifixión -->
                <div class="carousel-item">
                    <img src="{{ asset('storage/images/carrusel/religiosa.jpg') }}"
                    class="d-block w-100 hero-image"
                    alt="Jesús Buen Pastor">                    
                    <div class="carousel-caption d-flex flex-column justify-content-end pb-2 pb-md-0">
                        <div class="bg-dark bg-opacity-75 rounded p-1 p-md-2 d-inline-block" style="max-width: 120%; transform: translateY(20px);">
                            <h2 class="fs-6 fs-md-4 fw-bold mb-0" style="word-spacing: -1px; letter-spacing: -0.5px;">religiosas</h2>
                            <p class="m-0 d-sm-block fs-7 fs-md-6" style="word-spacing: -0.5px;">""Fe que se moldea, amor que perdura."</p>
                        </div>
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
        <div class="container" id="articulos-container">
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
                <div wire:loading.class="opacity-50" class="transition-opacity duration-300 row g-4">

                    @foreach($articulos as $articulo)
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="card h-100 shadow-sm border-0 overflow-hidden">
                                <!-- Contenedor clickeable -->
                                <div wire:click="mostrarArticulo({{ $articulo->id }})" class="clickable-area">
                                    @if($articulo->fotos->isNotEmpty())
                                        <div class="image-container">
                                            <img src="{{ asset('storage/' . $articulo->fotos->first()->url) }}"
                                                 class="img-fluid contained-image"
                                                 alt="{{ $articulo->nombre }}">
                                        </div>
                                    @else
                                        <div class="no-image-placeholder d-flex align-items-center justify-content-center">
                                            <i class="bi bi-image fs-1 text-muted"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title h5 mb-0">{{ $articulo->nombre }}</h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-center gap-3 mt-5">
                        {{-- Botón "Anterior" --}}
                        <!-- Botón "Anterior" -->
                        <button 
                            wire:click="previousPage" 
                            wire:loading.attr="disabled" 
                            class="btn btn-outline-primary btn-sm"
                            @if($articulos->onFirstPage()) disabled @endif
                            onclick="setTimeout(() => document.getElementById('articulos-container').scrollIntoView({ behavior: 'smooth' }), 100)"
                            >
                            &laquo; Anterior
                        </button>
                    
                        {{-- Indicador de página --}}
                        <span class="align-self-center text-muted small">
                            Página {{ $articulos->currentPage() }} de {{ $articulos->lastPage() }}
                        </span>
                    
                     <!-- Botón "Siguiente" -->
                        <button 
                            wire:click="nextPage" 
                            wire:loading.attr="disabled" 
                            class="btn btn-outline-primary btn-sm"
                            @if(!$articulos->hasMorePages()) disabled @endif
                            onclick="setTimeout(() => document.getElementById('articulos-container').scrollIntoView({ behavior: 'smooth' }), 100)"
                        >
                            Siguiente &raquo;
                        </button>


                    </div>
                </div>
    
                
            @endif
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5" id="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h3 class="h5 fw-bold mb-3">Mi Tienda</h3>
                    <p class="text">Los mejores productos para nuestros clientes con la mejor calidad del mercado.</p>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h3 class="h5 fw-bold mb-3">Contacto</h3>
                    <ul class="list-unstyled text-">
                        <li class="mb-2"><i class="bi bi-envelope me-2"></i>info@ceramicasantabarbara.com
                        </li>
                        <li class="mb-2"><i class="bi bi-phone me-2"></i> +57 3202683321</li>
                        <li><i class="bi bi-geo-alt me-2"></i> cll 11 #13-119 san Antonio del Tachira</li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h3 class="h5 fw-bold mb-3">Horario</h3>
                    <ul class="list-unstyled text-">
                        <li class="mb-2">Lunes - Viernes: 8am - 6pm</li>
                        <li class="mb-2">Sábados y domingos : 8am - 1pm</li>
                        {{-- <li>Domingo: 8am - 1pm</li> --}}
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
                <div class="modal-content modal-enhanced">
                    <!-- Header mejorado -->
                    <div class="modal-header modal-header-enhanced">
                        <div class="d-flex align-items-center w-100">
                            <div class="flex-grow-1">
                                <h2 class="modal-title h4 mb-1">{{ $articuloSeleccionado->nombre }}</h2>
                                <div class="d-flex align-items-center">
                                    <span class="badge badge-category">
                                        <i class="bi bi-tag me-1"></i>{{ $articuloSeleccionado->categoria->nombre }}
                                    </span>
                                    @if($articuloSeleccionado->stock > 0)
                                        <span class="badge badge-stock">
                                            <i class="bi bi-check-circle me-1"></i>En stock
                                        </span>
                                    @else
                                        <span class="badge badge-warning-custom">
                                            <i class="bi bi-clock me-1"></i>Consultar disponibilidad
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <button type="button" class="btn-close btn-close-custom" wire:click="cerrarModal" aria-label="Close"></button>
                        </div>
                    </div>

                    <div class="modal-body">
                        <!-- Carrusel de imágenes mejorado -->
                        @if($articuloSeleccionado->fotos->isNotEmpty())
                            <div id="articuloCarousel" class="carousel slide mb-4 carousel-enhanced" data-bs-ride="carousel">
                                <div class="carousel-inner rounded-3 overflow-hidden" style="max-height: 500px;">
                                    @foreach($articuloSeleccionado->fotos as $key => $foto)
                                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                            <div class="d-flex justify-content-center align-items-center h-100">
                                                <img src="{{ asset('storage/' . $foto->url) }}"
                                                    class="img-fluid modal-img-full"
                                                    alt="Foto {{ $key + 1 }} de {{ $articuloSeleccionado->nombre }}"
                                                    loading="lazy"
                                                    style="max-height: 500px; width: auto;">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @if($articuloSeleccionado->fotos->count() > 1)
                                    <button class="carousel-control-prev carousel-control-custom" type="button" data-bs-target="#articuloCarousel" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Anterior</span>
                                    </button>
                                    <button class="carousel-control-next carousel-control-custom" type="button" data-bs-target="#articuloCarousel" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Siguiente</span>
                                    </button>
                                    <div class="carousel-indicators-custom mt-3">
                                        @foreach($articuloSeleccionado->fotos as $key => $foto)
                                            <button type="button" data-bs-target="#articuloCarousel"
                                                    data-bs-slide-to="{{ $key }}"
                                                    class="indicator-custom {{ $key === 0 ? 'active' : '' }}"
                                                    aria-current="{{ $key === 0 ? 'true' : 'false' }}"
                                                    aria-label="Slide {{ $key + 1 }}">
                                                <img src="{{ asset('storage/' . $foto->url) }}" 
                                                    class="indicator-img"
                                                    alt="Miniatura {{ $key + 1 }}">
                                            </button>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @else
                            <div class="text-center py-4 bg-light rounded mb-4 no-images">
                                <i class="bi bi-image text-muted fs-1 mb-2"></i>
                                <p class="text-muted">Este artículo no tiene imágenes disponibles</p>
                            </div>
                        @endif

                        <!-- Contenido en dos columnas (distribución original) -->
                        <div class="row">
                            <!-- Columna izquierda -->
                            <div class="col-md-6 mb-3 mb-md-0">
                                <h3 class="h5 fw-bold section-title">
                                    <i class="bi bi-card-text me-2"></i>Descripción
                                </h3>
                                <p class="text-muted description-text">{{ $articuloSeleccionado->descripcion }}</p>

                                <h3 class="h5 fw-bold section-title mt-4">
                                    <i class="bi bi-hammer me-2"></i>Materiales de construcción
                                </h3>
                                @if(isset($articuloSeleccionado->materiales) && count($articuloSeleccionado->materiales) > 0)
                                    <div class="material-list-enhanced">
                                        @foreach ($articuloSeleccionado->materiales as $material)
                                            <div class="material-item">
                                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                <span class="material-name">{{ $material->nombre }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-muted no-materials">No hay materiales disponibles.</p>
                                @endif
                            </div>

                            <!-- Columna derecha -->
<div class="col-md-6">
    <div class="dimensiones-container-enhanced">
        <div class="d-flex align-items-center mb-3">
            <h4 class="h5 fw-bold section-title mb-0 me-2">
                <i class="bi bi-rulers me-2"></i>Dimensiones
            </h4>
            <small class="text-muted availability-text">({{ $articuloSeleccionado->numerales->count() }} variantes)</small>
        </div>  
        
        @if(isset($articuloSeleccionado->numerales) && $articuloSeleccionado->numerales->isNotEmpty())
            <div class="dimensiones-accordion">
                <!-- Mostrar primeras 3 dimensiones -->
                @foreach($articuloSeleccionado->numerales->take(3) as $numeral)
                    <div class="dimension-item-enhanced">
                        <span class="numeral-badge">#{{ $numeral->numero }}</span>
                        <span class="dimensiones-text">
                            @foreach($numeral->dimensiones as $dimension)
                                {{ $dimension->medida }}:cm
                                @if(!$loop->last) | @endif
                            @endforeach
                        </span>
                    </div>
                @endforeach
                
                <!-- Dimensiones adicionales colapsadas -->
                @if($articuloSeleccionado->numerales->count() > 3)
                    <div class="collapse" id="moreDimensions">
                        @foreach($articuloSeleccionado->numerales->skip(3) as $numeral)
                            <div class="dimension-item-enhanced">
                                <span class="numeral-badge">#{{ $numeral->numero }}</span>
                                <span class="dimensiones-text">
                                    @foreach($numeral->dimensiones as $dimension)
                                        {{ $dimension->medida }}:cm
                                        @if(!$loop->last) | @endif
                                    @endforeach
                                </span>
                            </div>
                        @endforeach
                    </div>
                    
                    <button class="btn btn-sm btn-outline-primary w-100 mt-2" 
                            type="button" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#moreDimensions"
                            aria-expanded="false">
                        <i class="bi bi-chevron-down me-1"></i>
                        Ver {{ $articuloSeleccionado->numerales->count() - 3 }} dimensiones más
                    </button>
                @endif
            </div>
        @else
            <p class="no-dimensiones-enhanced">No hay especificaciones disponibles.</p>
        @endif
    </div>

    <h3 class="h5 fw-bold section-title mt-4">
        <i class="bi bi-grid-3x3 me-2"></i>Categoría
    </h3>
    <p class="text-muted category-text">{{ $articuloSeleccionado->categoria->nombre }}</p>
</div>
                        </div>
                    </div>

                    <!-- Footer mejorado -->
                    <div class="modal-footer justify-content-center border-top-0 modal-footer-enhanced">
                        <div class="whatsapp-buttons-container">
                            <a href="https://wa.me/573202683321?text=Hola%20Estoy%20interesado%20en%20el%20producto%20{{ urlencode($articuloSeleccionado->nombre) }}"
                            class="btn btn-whatsapp-colombia"
                            target="_blank">
                                <i class="bi bi-whatsapp me-2"></i> Consultar por WhatsApp
                                <span class="flag">🇨🇴</span>
                            </a>
                            <a href="https://wa.me/584161346677?text=Hola%20Estoy%20interesado%20en%20el%20producto%20{{ urlencode($articuloSeleccionado->nombre) }}"
                                class="btn btn-whatsapp-venezuela"
                                target="_blank">
                                <i class="bi bi-whatsapp me-2"></i> Consultar por WhatsApp
                                <span class="flag">🇻🇪</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Botones flotantes redes sociales -->

    <div class="social-float">
        <!-- Instagram -->
        <a href="https://www.instagram.com/imagenes_santabarbara/"
           class="social-btn btn-instagram"
           target="_blank"
           title="Instagram Santa Bárbara"
           aria-label="Instagram"
           data-country="IG">
            <i class="bi bi-instagram"></i>
        </a>

        <!-- WhatsApp Colombia -->
        <a href="https://wa.me/573202683321"
           class="social-btn btn-whatsapp-co"
           target="_blank"
           title="WhatsApp Colombia (+57)"
           aria-label="WhatsApp Colombia"
           data-country="CO">
            <i class="bi bi-whatsapp"></i>
            <span class="flag">🇨🇴</span> <!-- Emoji bandera Colombia -->

        </a>

        <!-- WhatsApp Venezuela -->
        <a href="https://wa.me/584161346677"
           class="social-btn btn-whatsapp-ve"
           target="_blank"
           title="WhatsApp Venezuela (+58)"
           aria-label="WhatsApp Venezuela"
           data-country="VE">
            <i class="bi bi-whatsapp"></i>
            <span class="flag">🇻🇪</span> <!-- Emoji bandera Venezuela -->        </a>
    </div>
    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        /* Estilos generales del modal */
        .modal-enhanced {
            border-radius: 1rem;
            border: none;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        }

        .modal-header-enhanced {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-bottom: none;
            padding: 1.5rem;
        }

        .modal-title {
            color: white;
            font-weight: 600;
        }

        .btn-close-custom {
            filter: invert(1);
            opacity: 0.8;
        }

        .btn-close-custom:hover {
            opacity: 1;
        }

        /* Badges */
        .badge-category {
            background: rgba(255,255,255,0.2);
            color: white;
            border: 1px solid rgba(255,255,255,0.3);
        }

        .badge-stock {
            background: rgba(40, 167, 69, 0.9);
            color: white;
        }

        .badge-warning-custom {
            background: rgba(255, 193, 7, 0.9);
            color: #212529;
        }

        /* Carrusel mejorado */
        .carousel-enhanced {
            border-radius: 12px;
            overflow: hidden;
        }

        .modal-img-enhanced {
            height: 400px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .carousel-control-custom {
            background: rgba(0,0,0,0.3);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            margin: 0 1rem;
        }

        .carousel-indicators-custom {
            display: flex;
            justify-content: center;
            gap: 8px;
            padding: 0;
        }

        .indicator-custom {
            width: 60px;
            height: 60px;
            border: 2px solid transparent;
            border-radius: 8px;
            overflow: hidden;
            padding: 0;
            opacity: 0.6;
            transition: all 0.3s ease;
        }

        .indicator-custom.active {
            border-color: #667eea;
            opacity: 1;
            transform: scale(1.05);
        }

        .indicator-custom:hover {
            opacity: 1;
        }

        .indicator-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Secciones de contenido */
        .section-title {
            color: #2c3e50;
            border-bottom: 2px solid #667eea;
            padding-bottom: 0.5rem;
            margin-bottom: 1rem;
        }

        .description-text {
            line-height: 1.6;
            font-size: 0.95rem;
        }

        /* Materiales */
        .material-list-enhanced {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 1rem;
        }

        .material-item {
            display: flex;
            align-items: center;
            padding: 0.5rem 0;
            border-bottom: 1px solid #e9ecef;
        }

        .material-item:last-child {
            border-bottom: none;
        }

        .material-name {
            color: #495057;
            font-weight: 500;
        }

        /* Dimensiones */
        .dimensiones-container-enhanced {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 1.5rem;
        }

        .dimensiones-list-enhanced {
            space-y-2;
        }

        .dimension-item-enhanced {
            display: flex;
            align-items: center;
            padding: 0.75rem;
            background: white;
            border-radius: 8px;
            margin-bottom: 0.5rem;
            border-left: 4px solid #667eea;
            transition: transform 0.2s ease;
        }

        .dimension-item-enhanced:hover {
            transform: translateX(5px);
        }

        .numeral-badge {
            background: #667eea;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-weight: 600;
            margin-right: 1rem;
            min-width: 50px;
            text-align: center;
        }

        .dimensiones-text {
            color: #495057;
            font-weight: 500;
        }

        /* Botones de WhatsApp */
        .modal-footer-enhanced {
            padding: 1.5rem;
            background: #f8f9fa;
            border-radius: 0 0 1rem 1rem;
        }

        .whatsapp-buttons-container {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            justify-content: center;
        }

        .btn-whatsapp-colombia,
        .btn-whatsapp-venezuela {
            background: linear-gradient(135deg, #25D366, #128C7E);
            border: none;
            border-radius: 50px;
            padding: 0.75rem 1.5rem;
            color: white;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3);
        }

        .btn-whatsapp-colombia:hover,
        .btn-whatsapp-venezuela:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(37, 211, 102, 0.4);
            color: white;
        }

        .flag {
            margin-left: 0.5rem;
            font-size: 1.1em;
        }

        /* Estados vacíos */
        .no-images {
            border: 2px dashed #dee2e6;
        }

        .no-materials,
        .no-dimensiones-enhanced {
            color: #6c757d;
            font-style: italic;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 8px;
            text-align: center;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .whatsapp-buttons-container {
                flex-direction: column;
                width: 100%;
            }
            
            .btn-whatsapp-colombia,
            .btn-whatsapp-venezuela {
                width: 100%;
                justify-content: center;
            }
            
            .modal-img-enhanced {
                height: 300px;
            }
            
            .carousel-indicators-custom {
                flex-wrap: wrap;
            }
            
            .indicator-custom {
                width: 50px;
                height: 50px;
            }
        }
    </style>
    <style>
        .dimensiones-accordion {
            max-height: none;
        }

        .collapse.show {
            animation: fadeIn 0.3s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</div>