@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-4 mb-3  ">
        <div class="col-md-12">
            <div class="card shadow card-outline card-primary">
                <div class="card-header bg-primary text-white d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 ms-2">Detalle del Paciente | {{ $paciente->nombres }} {{ $paciente->apellidos }}</h4>
                    <div class="d-flex">
                        <button id="printButton" class="btn btn-light btn-sm me-2">
                            <i class="fas fa-print"></i> Imprimir
                        </button>
                        <button id="pdfButton" class="btn btn-danger btn-sm">
                            <i class="fas fa-file-pdf"></i> PDF
                        </button>
                    </div>
                </div>
                <div class="card-body" id="printableArea">
                    <div class="row mb-4">
                        <div class="col-md-4 text-center">
                            <i class="fas fa-user fa-5x text-primary mb-3"></i>
                            <div class="mt-3">
                                <h5>{{ $paciente->nombres }} {{ $paciente->apellidos }}</h5>
                                <p class="text-muted">Cédula: {{ $paciente->cedula }}</p>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <!-- Primera columna de información -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Fecha de Nacimiento:</strong></label>
                                        <div class="form-control-plaintext">{{ $paciente->fecha_nacimiento }}</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Teléfono:</strong></label>
                                        <div class="form-control-plaintext">{{ $paciente->telefono }}</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Dirección:</strong></label>
                                        <div class="form-control-plaintext">{{ $paciente->direccion }}</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Sexo:</strong></label>
                                        <div class="form-control-plaintext">{{ $paciente->sexo }}</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Estado Civil:</strong></label>
                                        <div class="form-control-plaintext">{{ $paciente->estado_civil }}</div>
                                    </div>
                                </div>
                                
                                <!-- Segunda columna de información -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Ocupación:</strong></label>
                                        <div class="form-control-plaintext">{{ $paciente->ocupacion }}</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Peso:</strong></label>
                                        <div class="form-control-plaintext">{{ $paciente->peso }} kg</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Altura:</strong></label>
                                        <div class="form-control-plaintext">{{ $paciente->altura }} cm</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Tipo de Sangre:</strong></label>
                                        <div class="form-control-plaintext">{{ $paciente->tipo_sangre }}</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Email:</strong></label>
                                        <div class="form-control-plaintext">{{ $paciente->email }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Sección de información médica -->
                    <div class="card mt-4">
                        <div class="card-header bg-info text-white">
                            <h5 class="mb-0">Información Médica</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Alergias:</strong></label>
                                        <div class="form-control-plaintext">{{ $paciente->alergias }}</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Enfermedades:</strong></label>
                                        <div class="form-control-plaintext">{{ $paciente->enfermedades }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Medicamentos:</strong></label>
                                        <div class="form-control-plaintext">{{ $paciente->medicamentos }}</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Antecedentes:</strong></label>
                                        <div class="form-control-plaintext">{{ $paciente->antecedentes }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Sección de contacto de emergencia y observaciones -->
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-warning text-white">
                                    <h5 class="mb-0">Contacto de Emergencia</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-control-plaintext">{{ $paciente->contacto_emergencia }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-secondary text-white">
                                    <h5 class="mb-0">Observaciones</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-control-plaintext">{{ $paciente->observaciones }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-secondary text-white">
                                    <h5 class="mb-0">fecha de consulta</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-control-plaintext">{{ $paciente->fecha_consulta }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
                <!-- Botones de acción -->
                <div class="card-footer">
                    <div class="form-group d-flex justify-content-between">
                        <a href="{{ route('admin.pacientes.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Volver al listado
                        </a>
                        <div>
                            <a href="{{ route('admin.pacientes.edit', $paciente->id) }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form action="{{ route('admin.pacientes.destroy', $paciente->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este paciente?')">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>

    /* Background */
    .content-wrapper {
        background: linear-gradient(135deg, #0a2463 0%, #3e92cc 100%);
        min-height: calc(100vh - calc(3.5rem + 1px));}
    /* Atoms */
    .form-label {
        font-weight: 600;
        color: #3a86ff;
        margin-bottom: 0.5rem;
        display: block;
    }
    
    .form-control-plaintext {
        padding: 0.5rem 0;
        border-bottom: 1px solid #eee;
        min-height: 2.5rem;
    }
    
    .btn {
        border-radius: 8px;
        padding: 10px 25px;
        font-weight: 600;
        transition: all 0.3s;
        border: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    
    .btn-primary {
        background: linear-gradient(90deg, #3a86ff 0%, #3e92cc 100%);
        color: white;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(58, 134, 255, 0.4);
    }
    
    .btn-secondary {
        background: linear-gradient(90deg, #6c757d 0%, #5a6268 100%);
        color: white;
    }
    
    .btn-secondary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(108, 117, 125, 0.4);
    }
    
    .btn-danger {
        background: linear-gradient(90deg, #dc3545 0%, #c82333 100%);
        color: white;
    }
    
    .btn-danger:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(220, 53, 69, 0.4);
    }
    
    .btn-light {
        background: linear-gradient(90deg, #f8f9fa 0%, #e9ecef 100%);
        color: #212529;
    }
    
    .text-danger {
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 0.25rem;
        display: block;
    }
    
    .text-muted {
        color: #6c757d !important;
    }
    
    /* Card styles */
    .card {
        border-radius: 10px;
        overflow: hidden;
    }
    
    .card-header {
        border-bottom: none;
    }
    
    .bg-primary {
        background-color: #3a86ff !important;
    }
    
    .bg-info {
        background-color: #17a2b8 !important;
    }
    
    .bg-warning {
        background-color: #ffc107 !important;
    }
    
    .bg-secondary {
        background-color: #6c757d !important;
    }
    
    /* Shadow effects */
    .shadow {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
</style>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
$(document).ready(function() {
    // Función para imprimir
    $('#printButton').click(function() {
        var printContents = document.getElementById('printableArea').innerHTML;
        var originalContents = document.body.innerHTML;
        
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload();
    });
    
    // Función para generar PDF
    $('#pdfButton').click(function() {
        const element = document.getElementById('printableArea');
        
        // Configuración para el PDF
        const opt = {
            margin: 10,
            filename: 'paciente_{{ $paciente->cedula }}.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        };
        
        // Generar el PDF
        html2pdf().set(opt).from(element).save();
    });
});
</script>
@endsection