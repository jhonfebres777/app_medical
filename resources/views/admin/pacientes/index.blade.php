@extends('layouts.admin')

@section('content')
<style>
    /* Atoms */
    .btn {
        border-radius: 8px;
        padding: 8px 16px;
        font-weight: 600;
        transition: all 0.3s;
        border: none;
        font-size: 0.875rem;
    }
    
    .btn-primary {
        background: linear-gradient(90deg, #3a86ff 0%, #3e92cc 100%);
        color: white;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(58, 134, 255, 0.4);
    }
    
    .btn-info {
        background: linear-gradient(90deg, #17a2b8 0%, #138496 100%);
        color: white;
    }
    
    .btn-warning {
        background: linear-gradient(90deg, #ffc107 0%, #e0a800 100%);
        color: #212529;
    }
    
    .btn-danger {
        background: linear-gradient(90deg, #dc3545 0%, #c82333 100%);
        color: white;
    }
    
    .btn-sm {
        padding: 6px 12px;
        font-size: 0.75rem;
    }
    
    .alert {
        border-radius: 8px;
        border: none;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    
    /* Molecules */
    .card-header-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
    }
    
    .action-buttons {
        display: flex;
        gap: 0.5rem;
    }
    
    /* Organisms */
    .data-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 123, 255, 0.1);
        border: none;
        overflow: hidden;
        position: relative;
    }
    
    .data-card::before {
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
        opacity: 0.2;
    }
    
    @keyframes ecgMove {
        0% { background-position: -100px 0; }
        100% { background-position: calc(100% + 100px) 0; }
    }
    
    .data-card-header {
        background: linear-gradient(90deg, #3a86ff 0%, #3e92cc 100%);
        color: white;
        padding: 1.25rem 1.5rem;
        border-bottom: none;
    }
    
    .data-card-title {
        font-weight: 700;
        margin: 0;
        font-size: 1.25rem;
    }
    
    .data-card-body {
        padding: 1.5rem;
    }
    
    /* Table Styles */
    .data-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }
    
    .data-table thead th {
        background: linear-gradient(135deg, #0a2463 0%, #3e92cc 100%);
        color: white;
        padding: 12px 15px;
        font-weight: 600;
        border: none;
    }
    
    .data-table tbody tr {
        transition: all 0.2s;
    }
    
    .data-table tbody tr:hover {
        background-color: rgba(58, 134, 255, 0.05);
    }
    
    .data-table tbody td {
        padding: 12px 15px;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        vertical-align: middle;
    }
    
    .data-table tbody tr:last-child td {
        border-bottom: none;
    }
    
    /* Templates */
    .data-container {
        max-width: 100%;
        margin: 0 auto;
        padding: 2rem 0;
    }
    
    /* Background */
    .content-wrapper {
        background: linear-gradient(135deg, #0a2463 0%, #3e92cc 100%);
        min-height: calc(100vh - calc(3.5rem + 1px));
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .card-header-actions {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }
        
        .action-buttons {
            width: 100%;
            justify-content: flex-end;
        }
    }
</style>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="data-container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="data-card shadow">
                <div class="data-card-header">
                    <div class="card-header-actions">
                        <h4 class="data-card-title">LISTADO DE PACIENTES</h4>
                        <a href="{{ route('admin.pacientes.create') }}" class="btn btn-primary">
                            <i class="fas fa-user-plus mr-2"></i> Nuevo Paciente
                        </a>
                    </div>
                </div>
                <div class="data-card-body">
                    <table id="pacientes-table" class="data-table table-striped">
                        <thead>
                            <tr>
                                <th style="text-align: center; width: 5%;">#</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Cédula</th>
                                <th>Teléfono</th>
                                <th style="width: 20%; text-align: center;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pacientes as $index => $paciente)
                                <tr>
                                    <td style="text-align: center;">{{ $index + 1 }}</td>
                                    <td>{{ $paciente->nombres }}</td>
                                    <td>{{ $paciente->apellidos }}</td>
                                    <td>{{ $paciente->cedula }}</td>
                                    <td>{{ $paciente->telefono }}</td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('admin.pacientes.show', $paciente->id) }}" class="btn btn-info btn-sm" title="Ver detalles">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ url('admin/pacientes/' . $paciente->id . '/edit') }}" class="btn btn-warning btn-sm" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ url('admin/pacientes/' . $paciente->id . '/confirm-delete') }}" class="btn btn-danger btn-sm" title="Eliminar">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(function () {
    $("#pacientes-table").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        "buttons": [
            {
                extend: 'copy',
                text: '<i class="fas fa-copy"></i> Copiar',
                className: 'btn btn-sm btn-outline-secondary'
            },
            {
                extend: 'csv',
                text: '<i class="fas fa-file-csv"></i> CSV',
                className: 'btn btn-sm btn-outline-primary'
            },
            {
                extend: 'excel',
                text: '<i class="fas fa-file-excel"></i> Excel',
                className: 'btn btn-sm btn-outline-success'
            },
            {
                extend: 'pdf',
                text: '<i class="fas fa-file-pdf"></i> PDF',
                className: 'btn btn-sm btn-outline-danger'
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print"></i> Imprimir',
                className: 'btn btn-sm btn-outline-info'
            },
            {
                extend: 'colvis',
                text: '<i class="fas fa-columns"></i> Columnas',
                className: 'btn btn-sm btn-outline-warning'
            }
        ],
        "language": {
            "decimal": "",
            "emptyTable": "No hay pacientes registrados",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ pacientes",
            "infoEmpty": "Mostrando 0 a 0 de 0 pacientes",
            "infoFiltered": "(filtrado de _MAX_ pacientes en total)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ pacientes",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "No se encontraron pacientes",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        "dom": "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
               "<'row'<'col-sm-12'tr>>" +
               "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>" +
               "<'row'<'col-sm-12'B>>",
        "initComplete": function() {
            $('.dt-buttons').addClass('btn-group');
            $('.dt-buttons button').removeClass('btn-secondary').addClass('btn-sm');
        }
    });
});
</script>
@endsection