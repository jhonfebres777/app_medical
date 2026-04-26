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
    
    .form-control-plaintext {
        border-radius: 8px;
        padding: 12px 15px;
        background-color: #f8f9fa;
        transition: all 0.3s;
        width: 100%;
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
    
    /* Card styling */
    .form-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 123, 255, 0.1);
        border: none;
        overflow: hidden;
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
    
    /* Horizontal layout */
    .doctor-info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
    }
    
    .info-item {
        margin-bottom: 1rem;
    }
    
    @media (max-width: 768px) {
        .doctor-info-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-lg-10">
            <div class="form-card shadow">
                <div class="form-card-header">
                    <h4 class="form-card-title">DATOS DEL DOCTOR: {{ $doctor->nombres }} {{ $doctor->apellidos }}</h4>
                </div>
                <div class="form-card-body">
                    <div class="doctor-info-grid">
                        <div class="info-item">
                            <label class="form-label">Nombres</label>
                            <div class="form-control-plaintext">{{ $doctor->nombres }}</div>
                        </div>
                        
                        <div class="info-item">
                            <label class="form-label">Apellidos</label>
                            <div class="form-control-plaintext">{{ $doctor->apellidos }}</div>
                        </div>
                        
                        
                        
                        <div class="info-item">
                            <label class="form-label">Especialidad</label>
                            <div class="form-control-plaintext">{{ $doctor->especialidad }}</div>
                        </div>
                        
                        <div class="info-item">
                            <label class="form-label">Teléfono</label>
                            <div class="form-control-plaintext">{{ $doctor->telefono }}</div>
                        </div>

                          <div class="info-item">
                            <label class="form-label">Correo Electrónico</label>
                            <div class="form-control-plaintext">{{ $doctor->user->email }}</div>
                        </div>
                    </div>
                    
                    <div class="form-actions mt-4">
                        <a href="{{ url('admin/doctores') }}" class="btn btn-primary">
                            <i class="fas fa-arrow-left me-2"></i> Volver al listado
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection