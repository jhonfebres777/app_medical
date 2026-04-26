@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row justify-content-center mt-4 mb-3">
        <div class="col-md-8">
            <div class="card shadow card-outline card-danger">
                <div class="card-header bg-danger text-white d-flex align-items-center">
                    <h4 class="mb-0 ms-2">Eliminar este Registro  |{{  $paciente->nombres }}</h4>
                    
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-4 text-center">
                            <i class="fas fa-user fa-5x text-primary mb-3"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label"><strong>Nombre del paciente:</strong></label>
                                <div class="form-control-plaintext fs-5">{{ $paciente->nombres }}</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><strong>Email:</strong></label>
                                <div class="form-control-plaintext fs-5">{{ $paciente->email }}</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label"><strong>cedula:</strong></label>
                                <div class="form-control-plaintext fs-5">{{ $paciente->cedula}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-between">
    <a href="{{ url('admin/usuarios') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Volver al listado
    </a>
    <form action="{{ route('admin.pacientes.destroy', $paciente->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este paciente?')">
            <i class="fas fa-trash"></i> Eliminar paciente
        </button>
    </form>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection