@extends('adminlte::page')

@section('title', 'Gestion de Numerales y Dimensiones')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center mb-2">
    <h1 class="ms-2 mb-0">
        <i class="fas fa-cubes text-primary me-2"></i> 
        Materiales y Dimensiones
    </h1>   
</div>

@stop

@section('content')
    @livewire('gestion-numerales-dimensiones')
@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    @livewireStyles
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @livewireScripts

    <script>
        // ====== Configuración de Toastr ======
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        // ====== Eventos Livewire ======
        document.addEventListener('livewire:init', () => {
            // Notificaciones con Toastr
            Livewire.on('notify', (event) => {
                toastr[event.type](event.message);
            });

            // Mostrar modal Bootstrap
            Livewire.on('mostrarModal', (data) => {
                const modalSelector = data.modal || data; // permite usar objeto o string
                const modalElement = document.querySelector(modalSelector);
                if (!modalElement) return;
                let modal = bootstrap.Modal.getInstance(modalElement);
                if (!modal) modal = new bootstrap.Modal(modalElement);
                modal.show();
            });

            // Cerrar modal Bootstrap
            Livewire.on('cerrarModal', (data) => {
                const modalSelector = data.modal || data; // permite usar objeto o string
                const modalElement = document.querySelector(modalSelector);
                if (!modalElement) return;
                let modal = bootstrap.Modal.getInstance(modalElement);
                if (!modal) modal = new bootstrap.Modal(modalElement);
                modal.hide();
            });
        });
    </script>
@stop
