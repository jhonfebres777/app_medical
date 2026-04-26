@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-4 mb-3">
        <div class="col-md-12">
            <div class="card shadow card-outline card-danger">
                <div class="card-header bg-primary text-white d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 ms-2"> ESTA SEGURO DE ELIMINAR REGISTRO  |  {{ $paciente->nombres }} {{ $paciente->apellidos }}</h4>
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
                               
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Incluir las librerías necesarias -->
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
    
    // Configuración de DataTable (si es necesario para otras partes)
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": [
            {
                extend: 'copy',
                text: 'Copiar'
            },
            {
                extend: 'csv',
                text: 'CSV'
            },
            {
                extend: 'excel',
                text: 'Excel'
            },
            {
                extend: 'pdf',
                text: 'PDF'
            },
            {
                extend: 'print',
                text: 'Imprimir'
            },
            {
                extend: 'colvis',
                text: 'Visor de columnas'
            }
        ],
        "language": {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ usuarios",
            "infoEmpty": "Mostrando 0 a 0 de 0 usuarios",
            "infoFiltered": "(filtrado de _MAX_ usuarios en total)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ usuarios",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "buttons": {
                "copy": "Copiar",
                "csv": "CSV",
                "excel": "Excel",
                "pdf": "PDF",
                "print": "Imprimir",
                "colvis": "Visor de columnas"
            }
        }
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});
</script>
@endsection