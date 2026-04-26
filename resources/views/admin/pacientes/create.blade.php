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
        background-color: rgba(255, 255, 255, 0.9);
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
        position: relative;
        z-index: 1;
    }
    
    .form-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='400' height='200' viewBox='0 0 400 200'%3E%3Cpath d='M0,100 Q50,150 100,100 T200,100 T300,50 T400,100' stroke='rgba(58, 134, 255, 0.1)' fill='none' stroke-width='2'/%3E%3C/svg%3E");
        background-repeat: repeat-y;
        background-position: -100px 0;
        z-index: -1;
        animation: ecgMove 30s linear infinite;
        opacity: 0.3;
    }
    
    @keyframes ecgMove {
        0% { background-position: -100px 0; }
        100% { background-position: calc(100% + 100px) 0; }
    }
    
    .form-card-header {
        background: linear-gradient(90deg, #3a86ff 0%, #3e92cc 100%);
        color: white;
        padding: 1.5rem;
        border-bottom: none;
        position: relative;
        overflow: hidden;
    }
    
    .form-card-header::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: rgba(255, 255, 255, 0.3);
    }
    
    .form-card-title {
        font-weight: 700;
        margin: 0;
        font-size: 1.5rem;
        text-align: center;
    }
    
    .form-card-body {
        padding: 2rem;
        position: relative;
    }
    
    /* Efecto de electrocardiograma */
    .ecg-line {
        position: absolute;
        height: 2px;
        background: rgba(220, 53, 69, 0.15);
        animation: ecgPulse 4s linear infinite;
        z-index: -1;
    }
    
    .ecg-line:nth-child(1) {
        top: 20%;
        width: 100%;
        animation-delay: 0s;
    }
    
    .ecg-line:nth-child(2) {
        top: 50%;
        width: 100%;
        animation-delay: 1.3s;
    }
    
    .ecg-line:nth-child(3) {
        top: 80%;
        width: 100%;
        animation-delay: 2.7s;
    }
    
    @keyframes ecgPulse {
        0% {
            background: rgba(220, 53, 69, 0.1);
            left: -100%;
        }
        10% {
            background: rgba(220, 53, 69, 0.3);
            height: 2px;
        }
        12% {
            height: 30px;
        }
        14% {
            height: 2px;
        }
        16% {
            height: 15px;
        }
        18% {
            height: 2px;
        }
        20% {
            height: 25px;
        }
        22% {
            height: 2px;
            background: rgba(220, 53, 69, 0.3);
        }
        100% {
            left: 100%;
            background: rgba(220, 53, 69, 0.1);
        }
    }
    
    /* Background */
    .content-wrapper {
        background: linear-gradient(135deg, #0a2463 0%, #3e92cc 100%);
        min-height: calc(100vh - calc(3.5rem + 1px));
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .form-card-body {
            padding: 1.5rem;
        }
        
        .form-actions {
            flex-direction: column;
        }
        
        .btn {
            width: 100%;
            margin-bottom: 0.5rem;
        }
    }
</style>

<div class="container">
    <div class="row justify-content-center mt-0">
        <div class="col-md-12">
            <div class="form-card shadow">
                <div class="ecg-line"></div>
                <div class="ecg-line"></div>
                <div class="ecg-line"></div>
                
                <div class="form-card-header">
                    <h4 class="form-card-title">REGISTRO DE NUEVO PACIENTE</h4>
                </div>
                <div class="form-card-body">
                    <form action="{{ route('admin.pacientes.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <label for="nombres" class="form-label">Nombre</label>
                                <input type="text" value="{{ old('nombres') }}" class="form-control" id="nombres" name="nombres" required placeholder="Ej: Juan">
                                @error('nombres')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                            <div class="col-md-3 form-group">
                                <label for="apellidos" class="form-label">Apellidos</label>
                                <input type="text" value="{{ old('apellidos') }}" class="form-control" id="apellidos" name="apellidos" required placeholder="Ej: Pérez García">
                                @error('apellidos')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                            <div class="col-md-3 form-group">
                                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" value="{{ old('fecha_nacimiento') }}" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                                @error('fecha_nacimiento')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                            <div class="col-md-3 form-group">
                                <label for="cedula" class="form-label">Cédula</label>
                                <input type="text" value="{{ old('cedula') }}" class="form-control" id="cedula" name="cedula" required placeholder="Ej: 12345678">
                                @error('cedula')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                            <div class="col-md-3 form-group">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" value="{{ old('telefono') }}" class="form-control" id="telefono" name="telefono" required placeholder="Ej: 04121234567">
                                @error('telefono')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                            <div class="col-md-3 form-group">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" value="{{ old('direccion') }}" class="form-control" id="direccion" name="direccion" required placeholder="Ej: Av. Principal #123">
                                @error('direccion')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                            <div class="col-md-3 form-group">
                                <label for="sexo" class="form-label">Género</label>
                                <select class="form-control" id="sexo" name="sexo" required>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select>   
                                @error('sexo')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                            <div class="col-md-3 form-group">
                                <label for="estado_civil" class="form-label">Estado Civil</label>
                                <select class="form-control" id="estado_civil" name="estado_civil" required>
                                    <option value="Soltero">Soltero</option>
                                    <option value="Casado">Casado</option>
                                    <option value="Divorciado">Divorciado</option>
                                    <option value="Viudo">Viudo</option>
                                </select> 
                                @error('estado_civil')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                            <div class="col-md-3 form-group">
                                <label for="ocupacion" class="form-label">Ocupación</label>
                                <input type="text" value="{{ old('ocupacion') }}" class="form-control" id="ocupacion" name="ocupacion" required placeholder="Ej: Ingeniero">
                                @error('ocupacion')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                            <div class="col-md-3 form-group">
                                <label for="peso" class="form-label">Peso (kg)</label>
                                <input type="text" value="{{ old('peso') }}" class="form-control" id="peso" name="peso" required placeholder="Ej: 70">
                                @error('peso')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                            <div class="col-md-3 form-group">
                                <label for="altura" class="form-label">Altura (cm)</label>
                                <input type="text" value="{{ old('altura') }}" class="form-control" id="altura" name="altura" required placeholder="Ej: 175">
                                @error('altura')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                            <div class="col-md-3 form-group">
                                <label for="tipo_sangre" class="form-label">Tipo de Sangre</label>
                                <select class="form-control" id="tipo_sangre" name="tipo_sangre" required>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select> 
                                @error('tipo_sangre')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                            <div class="col-md-3 form-group">
                                <label for="alergias" class="form-label">Alergias</label>
                                <input type="text" value="{{ old('alergias') }}" class="form-control" id="alergias" name="alergias" required placeholder="Ej: Penicilina">
                                @error('alergias')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                            <div class="col-md-3 form-group">
                                <label for="enfermedades" class="form-label">Enfermedades</label>
                                <input type="text" value="{{ old('enfermedades') }}" class="form-control" id="enfermedades" name="enfermedades" required placeholder="Ej: Diabetes">
                                @error('enfermedades')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                            <div class="col-md-3 form-group">
                                <label for="medicamentos" class="form-label">Medicamentos</label>
                                <input type="text" value="{{ old('medicamentos') }}" class="form-control" id="medicamentos" name="medicamentos" required placeholder="Ej: Metformina">
                                @error('medicamentos')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                            <div class="col-md-3 form-group">
                                <label for="antecedentes" class="form-label">Antecedentes</label>
                                <input type="text" value="{{ old('antecedentes') }}" class="form-control" id="antecedentes" name="antecedentes" required placeholder="Ej: Hipertensión familiar">
                                @error('antecedentes')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                            <div class="col-md-3 form-group">
                                <label for="contacto_emergencia" class="form-label">Contacto de Emergencia</label>
                                <input type="text" value="{{ old('contacto_emergencia') }}" class="form-control" id="contacto_emergencia" name="contacto_emergencia" required placeholder="Ej: María Pérez - 04121234567">
                                @error('contacto_emergencia')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                            <div class="col-md-3 form-group">
                                <label for="observaciones" class="form-label">Observaciones</label>
                                <input type="text" value="{{ old('observaciones') }}" class="form-control" id="observaciones" name="observaciones" required placeholder="Observaciones importantes">
                                @error('observaciones')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                            <div class="col-md-3 form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" value="{{ old('email') }}" class="form-control" id="email" name="email" required placeholder="Ej: paciente@example.com">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                            <div class="col-md-3 form-group">
                                <label for="fecha_consulta" class="form-label">Fecha de Consulta</label>
                                <input type="date" name="fecha_consulta" id="fecha_consulta" class="form-control"
                                       value="{{ old('fecha_consulta', $paciente->fecha_consulta ?? '') }}">
                                @error('fecha_consulta')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-user-plus mr-2"></i> Registrar Paciente
                            </button>
                            <a href="{{ url('admin/pacientes') }}" class="btn btn-danger">
                                <i class="fas fa-times-circle mr-2"></i> Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Efecto de ECG más pronunciado al cargar
    document.addEventListener('DOMContentLoaded', function() {
        const ecgLines = document.querySelectorAll('.ecg-line');
        ecgLines.forEach((line, index) => {
            setTimeout(() => {
                line.style.animation = 'ecgPulse 4s linear infinite';
                if(index === 0) line.style.animationDelay = '0.4s';
                if(index === 1) line.style.animationDelay = '1.3s';
                if(index === 2) line.style.animationDelay = '2.3s';
            }, 100);
        });
    });
</script>
@endsection