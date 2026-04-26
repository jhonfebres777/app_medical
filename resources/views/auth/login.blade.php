@extends('layouts.app')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    :root {
        --primary-blue: #0d6efd;
        --dark-blue: #0a4da2;
        --bg-gradient: linear-gradient(135deg, #0d6efd 0%, #052c65 100%);
    }

    .login-bg {
        min-height: 100vh;
        background: var(--bg-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
    }

    .card-login {
        background: #ffffff;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 400px; /* Tamaño ideal para login */
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .card-inner {
        padding: 2rem;
    }

    .medical-icon {
        width: 60px;
        height: 60px;
        background-color: #e7f1ff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
    }

    .medical-icon svg {
        width: 35px;
        fill: var(--primary-blue);
    }

    .card-header {
        background: transparent;
        border: none;
        text-align: center;
        padding: 0;
        margin-bottom: 2rem;
    }

    .card-header h2 {
        font-size: 1.5rem;
        font-weight: 700;
        color: #333;
        letter-spacing: 1px;
        margin: 0;
    }

    .form-control {
        padding: 0.75rem 1rem;
        border-radius: 8px;
        border: 1px solid #dee2e6;
    }

    .form-control:focus {
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
        border-color: var(--primary-blue);
    }

    label {
        font-weight: 500;
        margin-bottom: 0.5rem;
        color: #555;
    }

    .btn-login {
        background-color: var(--primary-blue);
        border: none;
        color: white;
        padding: 0.75rem;
        font-weight: 600;
        border-radius: 8px;
        transition: all 0.3s;
    }

    .btn-login:hover {
        background-color: var(--dark-blue);
        color: white;
        transform: translateY(-1px);
    }

    .btn-register {
        background-color: transparent;
        border: 1px solid #dee2e6;
        color: #666;
        padding: 0.75rem;
        font-weight: 500;
        border-radius: 8px;
    }

    .btn-register:hover {
        background-color: #f8f9fa;
        color: var(--primary-blue);
    }

    .footer-note {
        text-align: center;
        margin-top: 2rem;
        font-size: 0.8rem;
        color: #aaa;
    }
</style>

<div class="login-bg">
    <div class="card-login">
        <div class="card-inner">
            <div class="card-header">
                <div class="medical-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-1.99.9-1.99 2L3 19c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 11h-4v4h-4v-4H6v-4h4V6h4v4h4v4z"/></svg>
                </div>
                <h2>{{ __('INICIAR SESIÓN') }}</h2>
            </div>

            <div class="card-body p-0">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email">{{ __('Correo Electrónico') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="usuario@consultorio.com">
                        @error('email')
                            <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password">{{ __('Contraseña') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password" placeholder="••••••••">
                        @error('password')
                            <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="mb-4 form-check d-flex align-items-center">
                        <input class="form-check-input me-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label mb-0" for="remember">{{ __('Recordar sesión') }}</label>
                    </div>

                    <div class="d-grid gap-3">
                        <button type="submit" class="btn btn-login">{{ __('Ingresar') }}</button>
                        <a href="{{ route('register') }}" class="btn btn-register">{{ __('Registrarse') }}</a>
                    </div>
                </form>
            </div>

            <div class="footer-note">
                © {{ date('Y') }} <br> 
                <strong>Consultorio Médico Yackseky Hernandez C.A</strong>
            </div>
        </div>
    </div>
</div>

@endsection