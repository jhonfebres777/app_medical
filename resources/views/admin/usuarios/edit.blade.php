@extends('layouts.admin')

@section('content')

<style>
    /* Atoms */
    .form-label {
        font-weight: 600;
        color: #3a86ff;
        margin-bottom: 0.5rem;
        display: block;
    }
    
    .form-control {
        border-radius: 8px;
        padding: 12px 15px;
        border: 1px solid #e0e0e0;
        transition: all 0.3s;
        width: 100%;
    }
    
    .form-control:focus {
        border-color: #3a86ff;
        box-shadow: 0 0 0 0.2rem rgba(58, 134, 255, 0.25);
    }
    
    .btn {
        border-radius: 8px;
        padding: 10px 25px;
        font-weight: 600;
        transition: all 0.3s;
        border: none;
    }
    
    .btn-primary {
        background: linear-gradient(90deg, #3a86ff 0%, #3e92cc 100%);
        color: white;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(58, 134, 255, 0.4);
    }
    
    .btn-danger {
        background: linear-gradient(90deg, #dc3545 0%, #c82333 100%);
        color: white;
    }
    
    .btn-danger:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(220, 53, 69, 0.4);
    }
    
    .text-danger {
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 0.25rem;
        display: block;
    }
    
    /* Molecules */
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .form-actions {
        display: flex;
        justify-content: space-between;
        gap: 1rem;
        margin-top: 2rem;
    }
    
    /* Organisms */
    .form-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 123, 255, 0.1);
        border: none;
        overflow: hidden;
        max-width: 800px;
        margin: 0 auto;
    }
    
    .form-card-header {
        background: linear-gradient(90deg, #3a86ff 0%, #3e92cc 100%);
        color: white;
        padding: 1.5rem;
        border-bottom: none;
    }
    
    .form-card-title {
        font-weight: 700;
        margin: 0;
        font-size: 1.5rem;
        text-align: center;
    }
    
    .form-card-body {
        padding: 2rem;
    }
    
    /* Background */
    .content-wrapper {
        background: linear-gradient(135deg, #0a2463 0%, #3e92cc 100%);
        min-height: calc(100vh - calc(3.5rem + 1px));
    }
    
    /* Password strength indicator */
    .password-strength {
        height: 5px;
        margin-top: 5px;
        border-radius: 3px;
        transition: all 0.3s;
    }
    
    .strength-weak {
        background-color: #dc3545;
        width: 25%;
    }
    
    .strength-medium {
        background-color: #ffc107;
        width: 50%;
    }
    
    .strength-strong {
        background-color: #28a745;
        width: 75%;
    }
    
    .strength-very-strong {
        background-color: #20c997;
        width: 100%;
    }
</style>
<div class="container-fluid bg-primary bg-opacity-10" style="min-height: 100vh;">
    <div class="row justify-content-center py-5">
        <div class="col-md-10 col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-warning text-white py-3">
                    <h4 class="mb-0 text-center"><i class="fas fa-user-edit me-2"></i> EDITAR USUARIO</h4>
                </div>
                
                <div class="card-body bg-white p-4">
                    <form action="{{ route('admin.usuarios.update', $usuario->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row align-items-center mb-4">
                            <div class="col-md-4 text-center mb-4 mb-md-0">
                                <div class="avatar-circle bg-light-warning">
                                    <i class="fas fa-user fa-3x text-warning"></i>
                                </div>
                            </div>
                            
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label fw-bold text-primary">Nombre del usuario</label>
                                    <input type="text" name="name" class="form-control border-primary border-2" 
                                           value="{{ old('name', $usuario->name) }}" required>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label fw-bold text-primary">Correo electrónico</label>
                                    <input type="email" name="email" class="form-control border-primary border-2" 
                                           value="{{ old('email', $usuario->email) }}" required>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label fw-bold text-primary">Nueva contraseña (opcional)</label>
                                    <input type="password" name="password" class="form-control border-primary border-2" 
                                           autocomplete="new-password">
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label fw-bold text-primary">Confirmar contraseña</label>
                                    <input type="password" name="password_confirmation" class="form-control border-primary border-2" 
                                           autocomplete="new-password">
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between pt-3 border-top">
                            <button type="submit" class="btn btn-success px-4">
                                <i class="fas fa-save me-2"></i> GUARDAR CAMBIOS
                            </button>
                            <a href="{{ url('admin/usuarios') }}" class="btn btn-secondary px-4">
                                <i class="fas fa-arrow-left me-2"></i> VOLVER
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-primary {
        background-color: #0d6efd !important;
    }
    
    .bg-opacity-10 {
        background-color: rgba(13, 110, 253, 0.1) !important;
    }
    
    .bg-warning {
        background: linear-gradient(135deg, #ffc107 0%, #ffab00 100%) !important;
    }
    
    .bg-light-warning {
        background-color: rgba(255, 193, 7, 0.15);
    }
    
    .avatar-circle {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        border: 3px solid #fff3cd;
    }
    
    .form-control {
        border-radius: 8px;
        padding: 10px 15px;
    }
    
    .border-primary {
        border-color: #0d6efd !important;
    }
    
    .form-label {
        margin-bottom: 5px;
    }
    
    .btn {
        border-radius: 8px;
        padding: 10px 20px;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.9rem;
    }
    
    .shadow-lg {
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    .text-primary {
        color: #0d6efd !important;
    }
</style>
@endsection