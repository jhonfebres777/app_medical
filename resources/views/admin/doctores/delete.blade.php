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

<div class="container">
    <div class="row justify-content-center mt-4 mb-3">
        <div class="col-md-8">
            <div class="card shadow card-outline card-danger">
                <div class="card-header bg-danger text-white d-flex align-items-center">
                    <h4 class="mb-0 ms-2">Eliminar este Registro  |{{  $doctor->nombres  }}</h4>
                    
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-4 text-center">
                            <i class="fas fa-user fa-5x text-primary mb-3"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label"><strong>Nombre del usuario:</strong></label>
                                <div class="form-control-plaintext fs-5">{{ $doctor->nombres }}</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><strong>Email:</strong></label>
                                <div class="form-control-plaintext fs-5">{{ $doctor->user->email }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-between">
    <a href="{{ url('admin/usuarios') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Volver al listado
    </a>
    <form action="{{ route('admin.doctores.destroy', $doctor->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">
            <i class="fas fa-trash"></i> Eliminar usuario
        </button>
    </form>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection