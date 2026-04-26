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
    
    /* New styles for horizontal layout */
    .form-row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
    }
    
    .form-col {
        padding-right: 15px;
        padding-left: 15px;
        flex: 0 0 50%;
        max-width: 50%;
        margin-bottom: 1.5rem;
    }
    
    @media (max-width: 768px) {
        .form-col {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }
</style>

<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-12">
            <div class="form-card shadow">
                <div class="form-card-header">
                    <h4 class="form-card-title">REGISTRO DE NUEVO HORARIO</h4>
                </div>
                <div class="form-card-body">
                    <form action="{{ route('admin.horarios.store') }}" method="POST" id="user-form">
                        @csrf
                        
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="dia" class="form-label">Día</label>
                                <select class="form-control" id="dia" name="dia" required>
                                    <option value="">Seleccione un día</option>
                                    <option value="Lunes">Lunes</option>
                                    <option value="Martes">Martes</option>
                                    <option value="Miércoles">Miércoles</option>
                                    <option value="Jueves">Jueves</option>
                                    <option value="Viernes">Viernes</option>
                                    <option value="Sábado">Sábado</option>
                                    <option value="Domingo">Domingo</option>
                                </select>
                            </div>
                            
                            <div class="form-group col-md-4">
                                <label for="hora_inicio" class="form-label">Hora inicio</label>
                                <input type="time" value="{{ old('hora_inicio') }}" class="form-control" id="hora_inicio" name="hora_inicio" required>
                                @error('hora_inicio')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                            <div class="form-group col-md-4">
                                <label for="hora_final" class="form-label">Hora final</label>
                                <input type="time" value="{{ old('hora_fin') }}" class="form-control" id="hora_fin" name="hora_fin" required>
                                @error('hora_final')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="doctor_id" class="form-label">Doctor</label>
                                <select class="form-control" id="doctor_id" name="doctor_id" required>
                                    @foreach($doctores as $doctor)
                                        <option value="{{ $doctor->id }}">{{ $doctor->nombres }} {{ $doctor->apellidos }} {{ $doctor->especialidad }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="consultorio_id" class="form-label">Consultorio</label>
                                <select class="form-control" id="consultorio_id" name="consultorio_id" required>
                                    @foreach($consultorios as $consultorio)
                                        <option value="{{ $consultorio->id }}">{{ $consultorio->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-actions text-center mt-4">
                            <button type="submit" class="btn btn-primary mr-3">
                                <i class="fas fa-save mr-2"></i> Guardar Horario
                            </button>
                            <a href="{{ url('admin/horarios') }}" class="btn btn-danger">
                                <i class="fas fa-times-circle mr-2"></i> Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .form-card {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
    }
    
    .form-card-header {
        background-color: #4e73df;
        color: white;
        padding: 1rem;
        text-align: center;
    }
    
    .form-card-title {
        margin: 0;
        font-size: 1.5rem;
    }
    
    .form-card-body {
        padding: 2rem;
    }
    
    .form-label {
        font-weight: 600;
        color: #5a5c69;
    }
    
    .form-control {
        border-radius: 5px;
        padding: 10px 15px;
        border: 1px solid #d1d3e2;
    }
    
    .form-control:focus {
        border-color: #bac8f3;
        box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
    }
    
    .btn {
        padding: 10px 20px;
        border-radius: 5px;
        font-weight: 600;
    }
</style>

<script>
    // Password strength indicator
    document.getElementById('password').addEventListener('input', function() {
        const password = this.value;
        const strengthBar = document.getElementById('password-strength');
        
        // Reset classes
        strengthBar.className = 'password-strength';
        
        if (password.length === 0) {
            return;
        }
        
        // Calculate strength
        let strength = 0;
        
        // Length check
        if (password.length > 7) strength += 1;
        if (password.length > 11) strength += 1;
        
        // Character variety
        if (password.match(/[a-z]/)) strength += 1;
        if (password.match(/[A-Z]/)) strength += 1;
        if (password.match(/[0-9]/)) strength += 1;
        if (password.match(/[^a-zA-Z0-9]/)) strength += 1;
        
        // Apply visual feedback
        if (strength < 3) {
            strengthBar.classList.add('strength-weak');
        } else if (strength < 5) {
            strengthBar.classList.add('strength-medium');
        } else if (strength < 7) {
            strengthBar.classList.add('strength-strong');
        } else {
            strengthBar.classList.add('strength-very-strong');
        }
    });
</script>
@endsection