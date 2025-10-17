<div>
    <!-- CSS de Bootstrap y estilos personalizados -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <style>
        .oval-container {
            border-radius: 100px !important;
            /* Ovalado extremo */
            overflow: hidden;
            background: white;
            /* Fondo por si la imagen es transparente */
        }

        .oval-image {
            object-fit: contain !important;
            /* Fuerza que la imagen entera sea visible */
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
            0% {
                transform: translateY(-3px) scale(1);
            }

            50% {
                transform: translateY(-3px) scale(1.05);
            }

            100% {
                transform: translateY(-3px) scale(1);
            }
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
            height: 200px;
            /* Altura fija para el contenedor */
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background-color: #f8f9fa;
            /* Color de fondo para el contenedor */
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
            object-fit: contain;
            /* Esto evita el recorte y mantiene la proporción */
        }

        .no-image-placeholder {
            width: 100%;
            height: 100%;
            background-color: #f8f9fa;
        }

        /* FINAL */
    </style>
    {{-- Stilos para Modal Articulo --}}
    <style>
        /* Estilos personalizados */
        .hero-image {
            width: 100%;
            height: 30vh;
            /* Para móviles */
        }


        @media (min-width: 768px) {
            .hero-image {
                height: 70vh;
                /* Para tablets */
            }
        }

        @media (min-width: 1200px) {

            /* Para pc */
            .hero-image {
                width: 100%;
                max-height: 70vh;
                /* Altura máxima */
                min-height: 300px;
                /* Altura mínima para móviles */
                height: auto;
                /* Altura flexible */
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
            background-color: rgba(0, 0, 0, 0.5);
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

        .bg-gradient-primary {
            background: linear-gradient(135deg, #ffd6d6 0%, #ffb6b9 40%, #ff9a8b 100%);
        }

        .modal-content {
            border-radius: 12px;
            overflow: hidden;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 50px;
            height: 50px;
            top: 50%;
            transform: translateY(-50%);
            border-radius: 50%;
            margin: 0 15px;
        }

        .carousel-indicators button {
            transition: all 0.3s ease;
        }

        .carousel-indicators button.active {
            background-color: #3498db !important;
            opacity: 1 !important;
            transform: scale(1.2);
        }

        .card {
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: translateY(-2px);
        }

        .btn-success {
            background: linear-gradient(135deg, #25d366 0%, #128c7e 100%);
            border: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(37, 211, 102, 0.3);
        }

        /* Estilos para la lista de dimensiones */
        .dimension-item {
            transition: all 0.3s ease;
        }

        .dimension-item:hover {
            transform: translateX(5px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .btn-outline-primary {
            border: 2px solid #3498db;
            color: #3498db;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover {
            background-color: #3498db;
            color: white;
            transform: translateY(-2px);
        }

        .text-primary {
            color: #2c3e50 !important;
        }

        .bg-light {
            background-color: #f8f9fa !important;
        }

        .badge {
            font-size: 0.75em;
        }

        .border-primary {
            border-color: #3498db !important;
        }
    </style>
    {{-- Stilos para Header --}}
    <style>
        .pastel-header {
            background: linear-gradient(135deg, rgba(255, 183, 197, 0.85), rgba(255, 229, 204, 0.85));
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            transition: background 0.4s ease, box-shadow 0.4s ease;
        }

        .pastel-header:hover {
            background: linear-gradient(135deg, rgba(255, 170, 180, 0.9), rgba(255, 210, 180, 0.9));
            box-shadow: 0 4px 12px rgba(255, 100, 120, 0.2);
        }

        .nav-link {
            font-weight: 500;
            color: #5a3d3d !important;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: #d6336c !important;
        }

        .dropdown-menu {
            border-radius: 1rem;
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
    </style>

    <!-- Header -->
    <header class="navbar navbar-expand-lg navbar-light pastel-header shadow-sm sticky-top">
        <div class="container">
            <!-- Logo -->
            <a href="#" class="d-block order-lg-2 ms-lg-auto" style="width: 130px; height: 55px;">
                <img src="{{ asset('storage/images/logo/4.png') }}" alt="Mi Tienda"
                    class="h-100 w-auto rounded-circle shadow" style="object-fit: contain;">
            </a>

            <!-- Botón para móviles -->
            <button class="navbar-toggler order-lg-1" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Contenido del navbar -->
            <div class="collapse navbar-collapse order-lg-3" id="navbarContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-house-door-fill me-1 text-danger"></i>Inicio
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button"
                            data-bs-toggle="dropdown">
                            <i class="bi bi-tag-fill me-1 text-warning"></i>Categorías
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                            @foreach ($categorias as $categoria)
                                <li>
                                    <button wire:click="seleccionarCategoria({{ $categoria->id }})"
                                        class="dropdown-item d-flex justify-content-between align-items-center">
                                        <span>{{ $categoria->nombre }}</span>
                                        @if ($categoriaSeleccionada == $categoria->id)
                                            <i class="bi bi-check-circle-fill text-success"></i>
                                        @endif
                                    </button>
                                </li>
                            @endforeach
                            @if ($categoriaSeleccionada)
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <button wire:click="seleccionarCategoria(null)" class="dropdown-item text-primary">
                                        <i class="bi bi-x-circle-fill me-1 text-danger"></i>Mostrar todos
                                    </button>
                                </li>
                            @endif
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#footer-section">
                            <i class="bi bi-headset me-1 text-info"></i>Contacto
                        </a>
                    </li>
                </ul>

                <!-- Buscador -->
                <div class="d-flex search-box">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 shadow-sm" placeholder="Buscar productos..."
                            wire:model.live.debounce.500ms="search">
                        <button class="btn btn-outline-danger" type="submit">
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
                    <img src="{{ asset('storage/images/carrusel/nacimiento.jpg') }}" class="d-block w-100 hero-image">
                    <div class="carousel-caption d-flex flex-column justify-content-end pb-2 pb-md-0">
                        <div class="bg-dark bg-opacity-75 rounded p-1 p-md-2 d-inline-block"
                            style="max-width: 120%; transform: translateY(20px);">
                            <h2 class="fs-6 fs-md-4 fw-bold mb-0" style="word-spacing: -1px; letter-spacing: -0.5px;">
                                Nacimiento</h2>
                            <p class="m-0 d-sm-block fs-7 fs-md-6" style="word-spacing: -0.5px;">"El milagro del
                                Nacimiento, eterno en tu corazón."</p>
                        </div>
                    </div>
                </div>

                <!-- 2. Jesús Buen Pastor -->
                <div class="carousel-item">
                    <img src="{{ asset('storage/images/carrusel/navidenas.jpg') }}" class="d-block w-100 hero-image"
                        alt="Jesús Buen Pastor">
                    <div class="carousel-caption d-flex flex-column justify-content-end pb-2 pb-md-0">
                        <div class="bg-dark bg-opacity-75 rounded p-1 p-md-2 d-inline-block"
                            style="max-width: 120%; transform: translateY(20px);">
                            <h2 class="fs-6 fs-md-4 fw-bold mb-0" style="word-spacing: -1px; letter-spacing: -0.5px;">
                                Navideñas</h2>
                            <p class="m-0 d-sm-block fs-7 fs-md-6" style="word-spacing: -0.5px;">"La magia de la Navidad
                                en tu hogar."</p>
                        </div>
                    </div>
                </div>

                <!-- 3. Crucifixión -->
                <div class="carousel-item">
                    <img src="{{ asset('storage/images/carrusel/esotericas.jpg') }}" class="d-block w-100 hero-image"
                        alt="Jesús Buen Pastor">
                    <div class="carousel-caption d-flex flex-column justify-content-end pb-2 pb-md-0">
                        <div class="bg-dark bg-opacity-75 rounded p-1 p-md-2 d-inline-block"
                            style="max-width: 120%; transform: translateY(20px);">
                            <h2 class="fs-6 fs-md-4 fw-bold mb-0" style="word-spacing: -1px; letter-spacing: -0.5px;">
                                Esotéricas</h2>
                            <p class="m-0 d-sm-block fs-7 fs-md-6" style="word-spacing: -0.5px;">"Arte sacro que inspira
                                y eleva el espíritu."</p>
                        </div>
                    </div>
                </div>

                <!-- 4. Biblia Abierta -->
                <!-- 3. Crucifixión -->
                <div class="carousel-item">
                    <img src="{{ asset('storage/images/carrusel/religiosas.jpg') }}" class="d-block w-100 hero-image"
                        alt="Jesús Buen Pastor">
                    <div class="carousel-caption d-flex flex-column justify-content-end pb-2 pb-md-0">
                        <div class="bg-dark bg-opacity-75 rounded p-1 p-md-2 d-inline-block"
                            style="max-width: 120%; transform: translateY(20px);">
                            <h2 class="fs-6 fs-md-4 fw-bold mb-0" style="word-spacing: -1px; letter-spacing: -0.5px;">
                                religiosas</h2>
                            <p class="m-0 d-sm-block fs-7 fs-md-6" style="word-spacing: -0.5px;">""Fe que se moldea,
                                amor que perdura."</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Controles del carrusel -->
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
    </section>

    <!-- Sección de Artículos -->
    <section class="py-5 bg-light">
        <div class="container" id="articulos-container">
            <h2 class="text-center mb-5 fw-bold">
                @if ($categoriaSeleccionada)
                    {{ $categorias->find($categoriaSeleccionada)->nombre }}
                @else
                    Nuestros Productos
                @endif
            </h2>

            @if ($articulos->isEmpty())
                <div class="text-center py-5">
                    <div class="alert alert-info">
                        No se encontraron productos en esta categoría.
                    </div>
                </div>
            @else
                <div wire:loading.class="opacity-50" class="transition-opacity duration-300 row g-4">

                    @foreach ($articulos as $articulo)
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="card h-100 shadow-sm border-0 overflow-hidden">
                                <!-- Contenedor clickeable -->
                                <div wire:click="mostrarArticulo({{ $articulo->id }})" class="clickable-area">
                                    @if ($articulo->fotos->isNotEmpty())
                                        <div class="image-container">
                                            <img src="{{ asset('storage/' . $articulo->fotos->first()->url) }}"
                                                class="img-fluid contained-image " alt="{{ $articulo->nombre }}">
                                        </div>
                                    @else
                                        <div
                                            class="no-image-placeholder d-flex align-items-center justify-content-center">
                                            <i class="bi bi-image fs-1 text-muted"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body text-center">
                                    <div class="d-inline-block">
                                        <h3 class="card-title h5 mb-0 fw-bold pb-2"
                                            style="color: #2d3748; letter-spacing: 0.3px;
                                            border-bottom: 3px solid #ffb6b9;
                                            padding-bottom: 8px;
                                            line-height: 1.3;">
                                            {{ $articulo->nombre }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-center gap-3 mt-5">

                        <!-- Botón "Anterior" -->
                        <button wire:click="previousPage" wire:loading.attr="disabled" class="btn btn-sm"
                            style="color: #000000; border-color: #ffb6b9; background-color: transparent;"
                            @if ($articulos->onFirstPage()) disabled @endif
                            onclick="setTimeout(() => document.getElementById('articulos-container').scrollIntoView({ behavior: 'smooth' }), 100)"
                            onmouseover="this.style.backgroundColor='#ffb6b9'; this.style.color='white'"
                            onmouseout="this.style.backgroundColor='transparent'; this.style.color='#000000'">
                            &laquo; Anterior
                        </button>

                        {{-- Indicador de página --}}
                        <span class="align-self-center small" style="color: #2d3748; font-weight: 500;">
                            Página {{ $articulos->currentPage() }} de {{ $articulos->lastPage() }}
                        </span>

                        <!-- Botón "Siguiente" -->
                        <button wire:click="nextPage" wire:loading.attr="disabled" class="btn btn-sm"
                            style="color: #000000; border-color: #ffb6b9; background-color: transparent;"
                            @if (!$articulos->hasMorePages()) disabled @endif
                            onclick="setTimeout(() => document.getElementById('articulos-container').scrollIntoView({ behavior: 'smooth' }), 100)"
                            onmouseover="this.style.backgroundColor='#ffb6b9'; this.style.color='white'"
                            onmouseout="this.style.backgroundColor='transparent'; this.style.color='#000000'">
                            Siguiente &raquo;
                        </button>
                    </div>
                </div>


            @endif
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-5" id="footer-section"
        style="
        background: linear-gradient(135deg, rgba(255,182,193,0.9), rgba(255,160,122,0.9), rgba(255,105,97,0.9));
        backdrop-filter: blur(10px);
        color: #222;
         ">
        <div class="container">
            <div class="row">
                <!-- Columna 1 -->
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h3 class="h5 fw-bold mb-3">Mi Tienda</h3>
                    <p>
                        Los mejores productos para nuestros clientes con la mejor calidad del mercado.
                    </p>
                </div>

                <!-- Columna 2 -->
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h3 class="h5 fw-bold mb-3">Contacto</h3>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="bi bi-envelope me-2" style="color:#ff4b5c;"></i> info@ceramicasantabarbara.com
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-phone me-2" style="color:#ff9f43;"></i> +57 3202683321
                        </li>
                        <li>
                            <i class="bi bi-geo-alt me-2" style="color:#1dd1a1;"></i> cll 11 #13-119 san Antonio del
                            Tachira
                        </li>
                    </ul>
                </div>

                <!-- Columna 3 -->
                <div class="col-lg-4">
                    <h3 class="h5 fw-bold mb-3">Horario</h3>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="bi bi-clock me-2" style="color:#54a0ff;"></i> Lunes - Viernes:
                            8am - 6pm</li>
                        <li class="mb-2"><i class="bi bi-calendar-week me-2" style="color:#ff6b81;"></i> Sábado:
                            8am - 1pm</li>
                        <li><i class="bi bi-calendar-x me-2" style="color:#576574;"></i> Domingo: 8am - 1pm</li>
                    </ul>
                </div>
            </div>

            <hr class="my-4" style="border-color: rgba(0, 0, 0, 0.2);">
            <div class="text-center">
                <p class="mb-0 small text-dark">
                    &copy; {{ date('Y') }} Mi Tienda. Todos los derechos reservados.
                </p>
            </div>
        </div>
    </footer>




    <!-- Modal de Artículo -->
    @if ($mostrarModal && $articuloSeleccionado)
        <div class="modal fade show d-block" tabindex="-1" style="background-color: rgba(0,0,0,0.5);"
            wire:click="cerrarModal">
            <div class="modal-dialog modal-lg modal-dialog-centered" @click.stop>
                <div class="modal-content shadow-lg border-0">
                    <!-- Header con gradiente sutil -->
                    <div
                        class="modal-header bg-gradient-primary text-white border-bottom-0 d-flex justify-content-center align-items-center position-relative">
                        <!-- Ícono + Nombre centrados -->
                        <div class="d-flex align-items-center justify-content-center">
                            <i class="bi bi-box-seam me-2 fs-4"></i>
                            <h2 class="modal-title h4 mb-0 fw-semibold text-white text-center">
                                {{ $articuloSeleccionado->nombre }}
                            </h2>
                        </div>

                        <!-- Botón cerrar a la derecha -->
                        <button type="button" class="btn-close btn-close-white position-absolute end-0 me-3"
                            wire:click="cerrarModal" aria-label="Close"></button>
                    </div>


                    <div class="modal-body bg-light">
                        @if ($articuloSeleccionado->fotos->isNotEmpty())
                            <div id="articuloCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
                                <div class="carousel-inner rounded-3 overflow-hidden shadow-sm">
                                    @foreach ($articuloSeleccionado->fotos as $key => $foto)
                                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                            <img src="{{ asset('storage/' . $foto->url) }}"
                                                class="d-block w-100 modal-img"
                                                alt="Foto {{ $key + 1 }} de {{ $articuloSeleccionado->nombre }}">
                                        </div>
                                    @endforeach
                                </div>
                                @if ($articuloSeleccionado->fotos->count() > 1)
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#articuloCarousel" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon bg-dark rounded-circle p-3"
                                            aria-hidden="true"></span>
                                        <span class="visually-hidden">Anterior</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#articuloCarousel" data-bs-slide="next">
                                        <span class="carousel-control-next-icon bg-dark rounded-circle p-3"
                                            aria-hidden="true"></span>
                                        <span class="visually-hidden">Siguiente</span>
                                    </button>
                                    <div class="carousel-indicators position-static mt-3">
                                        @foreach ($articuloSeleccionado->fotos as $key => $foto)
                                            <button type="button" data-bs-target="#articuloCarousel"
                                                data-bs-slide-to="{{ $key }}"
                                                class="{{ $key === 0 ? 'active' : '' }} bg-secondary opacity-50 rounded-circle mx-1"
                                                style="width: 10px; height: 10px;"
                                                aria-current="{{ $key === 0 ? 'true' : 'false' }}"
                                                aria-label="Slide {{ $key + 1 }}"></button>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @else
                            <div class="text-center py-5 bg-white rounded mb-4 border">
                                <i class="bi bi-image text-muted fs-1 mb-3 opacity-50"></i>
                                <p class="text-muted mb-0">Este artículo no tiene imágenes disponibles</p>
                            </div>
                        @endif

                        <div class="row">
                            <!-- Columna izquierda -->
                            <div class="col-md-6 mb-4 mb-md-0">
                                <!-- Descripción -->
                                <div class="card border-0 shadow-sm h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <i class="bi bi-text-paragraph text-primary me-2 fs-5"></i>
                                            <h3 class="h5 fw-semibold mb-0 text-dark">Descripción</h3>
                                        </div>
                                        <p class="text-muted lh-base" style="text-align: justify;">
                                            {{ $articuloSeleccionado->descripcion }}
                                        </p>

                                        <!-- Materiales -->
                                        <div class="mt-4">
                                            <div class="d-flex align-items-center mb-3">
                                                <i class="bi bi-hammer text-primary me-2 fs-5"></i>
                                                <h3 class="h5 fw-semibold mb-0 text-dark">Materiales de construcción
                                                </h3>
                                            </div>
                                            @if (isset($articuloSeleccionado->materiales) && count($articuloSeleccionado->materiales) > 0)
                                                <div class="material-list">
                                                    @foreach ($articuloSeleccionado->materiales as $material)
                                                        <div class="d-flex align-items-center mb-2">
                                                            <i
                                                                class="bi bi-check-circle-fill text-success me-2 small"></i>
                                                            <span class="text-dark">{{ $material->nombre }}</span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @else
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-info-circle text-warning me-2"></i>
                                                    <p class="text-muted mb-0">No hay materiales disponibles</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Columna derecha -->
                            <div class="col-md-6">
                                <!-- Dimensiones con Lista Limitada -->
                                <div class="card border-0 shadow-sm mb-4">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-rulers text-primary me-2 fs-5"></i>
                                                <div>
                                                    <h4 class="h5 fw-semibold mb-0 text-dark">Dimensiones</h4>
                                                    <small class="text-muted">(consulta disponibilidad)</small>
                                                </div>
                                            </div>
                                            @if (isset($articuloSeleccionado->numerales) && $articuloSeleccionado->numerales->isNotEmpty())
                                                <span
                                                    class="badge bg-primary rounded-pill">{{ $articuloSeleccionado->numerales->count() }}
                                                    especificaciones</span>
                                            @endif
                                        </div>

                                        @if (isset($articuloSeleccionado->numerales) && $articuloSeleccionado->numerales->isNotEmpty())
                                            <div class="dimensiones-list">
                                                @foreach ($articuloSeleccionado->numerales as $index => $numeral)
                                                    @if ($index < 2 || $mostrarTodasDimensiones)
                                                        <div
                                                            class="dimension-item bg-white rounded p-2 mb-2 border-start border-primary border-3 shadow-sm">
                                                            {{-- p-3 → p-2, mb-3 → mb-2 --}}
                                                            <div
                                                                class="d-flex align-items-center justify-content-between mb-1">
                                                                {{-- mb-2 → mb-1 --}}
                                                                <div class="d-flex align-items-center">
                                                                    <i class="bi bi-hash text-primary me-2 small"></i>
                                                                    {{-- agregar small --}}
                                                                    <span
                                                                        class="numeral fw-semibold text-dark small">{{ $numeral->numero }}</span>
                                                                    {{-- agregar small --}}
                                                                </div>
                                                            </div>
                                                            <div class="dimensiones ps-2"> {{-- ps-3 → ps-2 --}}
                                                                @foreach ($numeral->dimensiones as $dimension)
                                                                    <div
                                                                        class="d-flex align-items-center justify-content-between text-muted mb-1 py-0">
                                                                        {{-- mb-2 → mb-1, py-1 → py-0 --}}
                                                                        <div class="d-flex align-items-center">
                                                                            <i
                                                                                class="bi bi-arrow-right-short text-secondary me-1 small"></i>
                                                                            {{-- me-2 → me-1, agregar small --}}
                                                                            <span class="small">Medida</span>
                                                                        </div>
                                                                        <span
                                                                            class="fw-medium text-dark small">{{ $dimension->medida }}
                                                                            cm</span> {{-- agregar small --}}
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach

                                                <!-- Botón Ver Más/Menos solo si hay más de 2 items -->
                                                @if ($articuloSeleccionado->numerales->count() > 2)
                                                    <div class="text-center mt-3">
                                                        <button class="btn btn-outline-primary btn-sm px-4"
                                                            wire:click="toggleDimensiones">
                                                            @if ($mostrarTodasDimensiones)
                                                                <i class="bi bi-chevron-up me-1"></i>
                                                                Ver menos
                                                            @else
                                                                <i class="bi bi-chevron-down me-1"></i>
                                                                Ver más especificaciones
                                                                <span
                                                                    class="badge bg-primary ms-1">{{ $articuloSeleccionado->numerales->count() - 2 }}</span>
                                                            @endif
                                                        </button>
                                                    </div>
                                                @endif
                                            </div>
                                        @else
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-info-circle text-warning me-2"></i>
                                                <p class="text-muted mb-0">No hay especificaciones disponibles</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Categoría -->
                                <div class="card border-0 shadow-sm">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="bi bi-tags text-primary me-2 fs-5"></i>
                                            <h3 class="h5 fw-semibold mb-0 text-dark">Categoría</h3>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-bookmark-fill text-secondary me-2"></i>
                                            <span
                                                class="text-dark fw-medium">{{ $articuloSeleccionado->categoria->nombre }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer con botones mejorados -->
                    <div class="modal-footer justify-content-center border-top-0 bg-white pt-3">
                        <div class="d-flex flex-nowrap gap-2 w-100 justify-content-center"> {{-- Cambios aquí --}}
                            <a href="https://wa.me/573202683321?text=Hola%20Estoy%20interesado%20en%20el%20producto%20{{ urlencode($articuloSeleccionado->nombre) }}"
                                class="btn btn-success px-3 py-2 fw-semibold d-flex align-items-center justify-content-center shadow-sm flex-nowrap text-nowrap"
                                {{-- Cambios aquí --}} target="_blank">
                                <i class="bi bi-whatsapp me-1 fs-6"></i> {{-- Cambios aquí --}}
                                <span class="small">WhatsApp</span> {{-- Cambios aquí --}}
                                <span class="flag ms-1 fs-6">🇨🇴</span> {{-- Cambios aquí --}}
                            </a>
                            <a href="https://wa.me/584161346677?text=Hola%20Estoy%20interesado%20en%20el%20producto%20{{ urlencode($articuloSeleccionado->nombre) }}"
                                class="btn btn-success px-3 py-2 fw-semibold d-flex align-items-center justify-content-center shadow-sm flex-nowrap text-nowrap"
                                {{-- Cambios aquí --}} target="_blank">
                                <i class="bi bi-whatsapp me-1 fs-6"></i> {{-- Cambios aquí --}}
                                <span class="small">WhatsApp</span> {{-- Cambios aquí --}}
                                <span class="flag ms-1 fs-6">🇻🇪</span> {{-- Cambios aquí --}}
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
        <a href="https://www.instagram.com/imagenes_santabarbara/" class="social-btn btn-instagram" target="_blank"
            title="Instagram Santa Bárbara" aria-label="Instagram" data-country="IG">
            <i class="bi bi-instagram"></i>
        </a>

        <!-- WhatsApp Colombia -->
        <a href="https://wa.me/573202683321" class="social-btn btn-whatsapp-co" target="_blank"
            title="WhatsApp Colombia (+57)" aria-label="WhatsApp Colombia" data-country="CO">
            <i class="bi bi-whatsapp"></i>
            <span class="flag">🇨🇴</span> <!-- Emoji bandera Colombia -->

        </a>

        <!-- WhatsApp Venezuela -->
        <a href="https://wa.me/584161346677" class="social-btn btn-whatsapp-ve" target="_blank"
            title="WhatsApp Venezuela (+58)" aria-label="WhatsApp Venezuela" data-country="VE">
            <i class="bi bi-whatsapp"></i>
            <span class="flag">🇻🇪</span> <!-- Emoji bandera Venezuela --> </a>
    </div>
    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</div>
