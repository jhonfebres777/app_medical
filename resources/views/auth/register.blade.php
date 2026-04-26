@extends('layouts.app')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    :root {
        --primary-blue: #0d6efd;
        --dark-blue: #052c65;
        --bg-gradient: linear-gradient(135deg, #0d6efd 0%, #052c65 100%);
    }

    /* Contenedor Principal */
    .login-bg {
        min-height: 100vh;
        background: var(--bg-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
        font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
    }

    /* Card Personalizada */
    .card-medical {
        background: #ffffff;
        border: none;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 500px; /* Un poco más ancho para registro */
        overflow: hidden;
    }

    /* Efecto de Pulso sutil para el icono */
    @keyframes pulse-soft {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }

    .card-header {
        background: transparent;
        border: none;
        text-align: center;
        padding: 2rem 1rem 0.5rem;
        font-weight: 700;
        font-size: 1.4rem;
        color: #333;
        letter-spacing: 0.5px;
    }

    .medical-icon {
        width: 65px;
        height: 65px;
        margin-bottom: 1rem;
        animation: pulse-soft 3s infinite ease-in-out;
    }

    /* Inputs y Grupos */
    .input-group-text {
        border-right: none;
        padding-left: 1.25rem;
        color: var(--primary-blue);
    }

    .form-control {
        padding: 0.75rem 1rem;
        border-radius: 10px;
        border-left: none;
    }

    .input-group > .form-control:focus {
        border-color: #dee2e6;
        box-shadow: none;
    }

    .input-group:focus-within .input-group-text {
        border-color: var(--primary-blue);
        color: var(--dark-blue);
    }
    
    .input-group:focus-within .form-control {
        border-color: var(--primary-blue);
    }

    /* Botones */
    .btn-register {
        background-color: var(--primary-blue);
        border: none;
        color: white;
        padding: 0.8rem;
        font-weight: 600;
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .btn-register:hover {
        background-color: var(--dark-blue);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .text-link {
        color: var(--primary-blue);
        text-decoration: none;
        font-weight: 500;
        transition: color 0.2s;
    }

    .text-link:hover {
        color: var(--dark-blue);
        text-decoration: underline;
    }

    .footer-note {
        text-align: center;
        margin-top: 1.5rem;
        font-size: 0.85rem;
        color: rgba(255,255,255,0.8);
    }
</style>

<div class="login-bg">
    <div class="container d-flex flex-column align-items-center">
        <div class="card-medical">
            <div class="card-header">
                <svg class="medical-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#0d6efd">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                </svg>
                <br>
                {{ __('REGISTRO DE USUARIO') }}
            </div>

            <div class="card-body p-4">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label text-muted small fw-bold">{{ __('Nombre Completo') }}</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                </svg>
                            </span>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                                   name="name" value="{{ old('name') }}" required autocomplete="name" 
                                   autofocus placeholder="Ej. Juan Pérez">
                        </div>
                        @error('name')
                            <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label text-muted small fw-bold">{{ __('Correo Electrónico') }}</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                                </svg>
                            </span>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" required placeholder="usuario@consultorio.com">
                        </div>
                        @error('email')
                            <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label text-muted small fw-bold">{{ __('Contraseña') }}</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                                </svg>
                            </span>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                   name="password" required placeholder="Mínimo 8 caracteres">
                        </div>
                        @error('password')
                            <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password-confirm" class="form-label text-muted small fw-bold">{{ __('Confirmar Contraseña') }}</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.42-6.446z"/>
                                </svg>
                            </span>
                            <input id="password-confirm" type="password" class="form-control" 
                                   name="password_confirmation" required placeholder="Repita su contraseña">
                        </div>
                    </div>

                    <div class="d-grid gap-2 mb-3">
                        <button type="submit" class="btn btn-register d-flex align-items-center justify-content-center">
                            {{ __('Finalizar Registro') }}
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16" class="ms-2">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                            </svg>
                        </button>
                    </div>

                    <div class="text-center small">
                        <span class="text-muted">¿Ya tienes una cuenta?</span> 
                        <a href="{{ route('login') }}" class="text-link ms-1">Inicia sesión aquí</a>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="footer-note">
            © {{ date('Y') }} <strong>Consultorio Médico Yackseky Hernandez C.A</strong><br>
            Todos los derechos reservados.
        </div>
    </div>
</div>
@endsection