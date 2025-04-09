<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <!-- Estilos personalizados -->
    <style>
        .login-container {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
            min-height: 100vh;
        }
        .login-card {
            border-radius: 15px;
            overflow: hidden;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        .form-control {
            border-left: 0 !important;
            padding: 12px 15px;
            height: 45px;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #ced4da;
        }
        .input-group-text {
            border-right: 0 !important;
            background-color: white !important;
            height: 45px;
        }
        .btn-custom {
            background-color: #3f80ea;
            border: none;
            border-radius: 8px;
            transition: all 0.3s;
            padding: 10px 0;
            font-weight: 500;
        }
        .btn-custom:hover {
            background-color: #2c6bd6;
            transform: translateY(-2px);
        }
        .logo-main {
            max-height: 80px;
            margin-bottom: 1.5rem;
        }
        .logo-secondary {
            max-height: 50px;
            margin-bottom: 1rem;
        }
        .logo-footer {
            max-height: 30px;
        }
    </style>
</head>
<body>
<div class="login-container">
    <div class="container py-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <!-- Tarjeta de Login -->
                <div class="card login-card">
                    <div class="card-body p-4 p-md-5">
                        <!-- Logo Principal - Reemplazar con tu imagen -->
                        <div class="text-center">
                            <img src="{{ asset('storage/images/logo/2.jpg') }}" alt="Logo de la Empresa" class="img-fluid logo-main">
                        </div>

                        <!-- Errores de validación -->
                        <x-validation-errors class="alert alert-danger mb-4" />

                        <!-- Mensaje de estado -->
                        @session('status')
                            <div class="alert alert-success mb-4">
                                {{ $value }}
                            </div>
                        @endsession

                        <!-- Formulario -->
                        <form method="POST" action="{{ route('login') }}" class="mt-4">
                            @csrf

                            <!-- Email -->
                            <div class="mb-4">
                                <label for="email" class="form-label text-secondary">{{ __('Correo Electrónico') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-envelope-fill text-primary"></i>
                                    </span>
                                    <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="tu@email.com">
                                </div>
                            </div>

                            <!-- Contraseña -->
                            <div class="mb-4">
                                <label for="password" class="form-label text-secondary">{{ __('Contraseña') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-lock-fill text-primary"></i>
                                    </span>
                                    <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" placeholder="••••••••">
                                </div>
                            </div>

                            <!-- Recordar sesión y Olvidé contraseña -->
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                                    <label class="form-check-label text-secondary" for="remember_me">{{ __('Recordar sesión') }}</label>
                                </div>
                                
                                @if (Route::has('password.request'))
                                    <a class="text-decoration-none text-primary" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tu contraseña?') }}
                                    </a>
                                @endif
                            </div>

                            <!-- Botón de Ingreso -->
                            <div class="d-grid mb-4">
                                <button type="submit" class="btn btn-custom">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>{{ __('Ingresar') }}
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>