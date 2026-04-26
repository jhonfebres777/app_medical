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

<div class="data-container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="data-card shadow">
                <div class="data-card-header">
                    <div class="card-header-actions">
                        <h4 class="data-card-title">LISTADO DE  CONSULTORIOS</h4>
                        <a href="{{ url('admin/consultorios/create') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle mr-1"></i> Registrar nuevo Consultorio
                        </a>
                    </div>
                </div>
                <div class="data-card-body">
                    <table id="secretarias-table" class="data-table table-striped">
                        <thead>
                            <tr>
                                <th style="text-align: center; width: 5%;">#</th>
                                <th>id</th>
                                <th>Nombre</th>
                                <th>direccion</th>
                                <th>capacidad</th>
                                <th>telefono</th>
                                <th>especialidad</th>
                                <th>estado</th>
                                <th style="width: 20%; text-align: center;">Acciones</th>
                            </tr>
                        </thead>
                       <tbody>
    @foreach ($consultorios as $index => $consultorio)
        <tr>
            <td style="text-align: center;">{{ $index + 1 }}</td>
            <td>{{ $consultorio->id }}</td>
            <td>{{ $consultorio->nombre }}</td>
            <td>{{ $consultorio->direccion }}</td>
            <td>{{ $consultorio->capacidad }}</td>
            <td>{{ $consultorio->telefono }}</td>
            <td>{{ $consultorio->especialidad }}</td>
            <td>{{ $consultorio->estado }}</td>
            <td>
                <div class="action-buttons">
                    <a href="{{ url('admin/consultorios/'.$consultorio->id) }}" class="btn btn-info btn-sm">
                        <i class="fas fa-eye"></i>
                    </a>
                   
                    <a href="{{ url('admin/consultorios/' . $consultorio->id . '/confirm-delete') }}" class="btn btn-danger btn-sm">
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
        $("#secretarias-table").DataTable({
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
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Consultorios",
                "infoEmpty": "Mostrando 0 a 0 de 0 Consultorios",
                "infoFiltered": "(filtrado de _MAX_ Consultorios en total)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Consultorios",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
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