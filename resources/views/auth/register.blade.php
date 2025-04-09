<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <!-- Estilos personalizados -->
    <style>
        .register-container {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
            min-height: 100vh;
        }
        .register-card {
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
        .terms-link {
            color: #3f80ea;
            text-decoration: none;
        }
        .terms-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="register-container">
    <div class="container py-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <!-- Tarjeta de Registro -->
                <div class="card register-card">
                    <div class="card-body p-4 p-md-5">
                        <!-- Logo Principal -->
                        <div class="text-center">
                            <img src="{{ asset('storage/images/logo/2.jpg') }}" alt="Logo de la Empresa" class="img-fluid logo-main">
                        </div>

                        <!-- Errores de validación -->
                        <x-validation-errors class="alert alert-danger mb-4" />

                        <!-- Formulario de Registro -->
                        <form method="POST" action="{{ route('register') }}" class="mt-4">
                            @csrf

                            <!-- Nombre -->
                            <div class="mb-4">
                                <label for="name" class="form-label">{{ __('Nombre') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-person-fill text-primary"></i>
                                    </span>
                                    <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Tu nombre completo">
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="mb-4">
                                <label for="email" class="form-label">{{ __('Correo Electrónico') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-envelope-fill text-primary"></i>
                                    </span>
                                    <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="tu@email.com">
                                </div>
                            </div>

                            <!-- Contraseña -->
                            <div class="mb-4">
                                <label for="password" class="form-label">{{ __('Contraseña') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-lock-fill text-primary"></i>
                                    </span>
                                    <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" placeholder="••••••••">
                                </div>
                            </div>

                            <!-- Confirmar Contraseña -->
                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label">{{ __('Confirmar Contraseña') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-lock-fill text-primary"></i>
                                    </span>
                                    <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••">
                                </div>
                            </div>

                            <!-- Términos y Condiciones -->
                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div class="mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="terms" id="terms" required>
                                        <label class="form-check-label" for="terms">
                                            {!! __('Acepto los :terms_of_service y :privacy_policy', [
                                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="terms-link">'.__('Términos de Servicio').'</a>',
                                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="terms-link">'.__('Política de Privacidad').'</a>',
                                            ]) !!}
                                        </label>
                                    </div>
                                </div>
                            @endif

                            <!-- Botones -->
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <a class="text-decoration-none text-primary" href="{{ route('login') }}">
                                    {{ __('¿Ya estás registrado?') }}
                                </a>
                                
                                <button type="submit" class="btn btn-custom">
                                    <i class="bi bi-person-plus-fill me-2"></i>{{ __('Registrarse') }}
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