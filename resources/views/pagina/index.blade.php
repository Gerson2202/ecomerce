
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ceramica Santa Barbara</title>
    
    <!-- Incluye los estilos de Livewire -->
    @livewireStyles
    
    <!-- Opcional: Si necesitas otros estilos -->
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        footer {
            margin-top: auto;
        }
    </style>
</head>
<body class="antialiased">
    <!-- Contenedor principal donde se renderizará el componente -->
    <main>
        @livewire('pagina')
    </main>

    <!-- Scripts necesarios -->
    @livewireScripts
</body>
</html>