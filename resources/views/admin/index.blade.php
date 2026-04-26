@extends('layouts.admin')

@section('content')
<style>
    /* Estilos compatibles con AdminLTE */
    .content-wrapper {
        background: linear-gradient(135deg, #0a2463 0%, #3e92cc 100%);
        min-height: calc(100vh - calc(3.5rem + 1px));
    }
    
    .dashboard-title {
        color: #eff1f4ff;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        position: relative;
        padding-bottom: 1rem;
        margin-top: 1rem;
    }
    
    .dashboard-title:after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, #3a86ff 0%, #3e92cc 100%);
        border-radius: 3px;
    }
    
    .small-box {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        border: none;
        position: relative;
        z-index: 1;
        margin-bottom: 20px;
    }
    
    .small-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }
    
    .small-box .inner {
        padding: 1.5rem;
    }
    
    .small-box h3 {
        font-size: 2.2rem;
        font-weight: 700;
        margin: 0 0 10px 0;
        color: white;
    }
    
    .small-box p {
        font-size: 1.1rem;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 0;
    }
    
    .small-box .icon {
        position: absolute;
        top: 15px;
        right: 15px;
        z-index: 0;
        font-size: 70px;
        color: rgba(255, 255, 255, 0.2);
        transition: all 0.3s;
    }
    
    .small-box:hover .icon {
        transform: scale(1.1);
    }
    
    .small-box .small-box-footer {
        background: rgba(0, 0, 0, 0.1);
        color: white;
        display: block;
        padding: 10px 0;
        text-align: center;
        text-decoration: none;
        transition: all 0.3s;
    }
    
    .small-box .small-box-footer:hover {
        background: rgba(0, 0, 0, 0.15);
        color: white;
    }
    
    .bg-primary {
        background: linear-gradient(135deg, #3a86ff 0%, #2667cc 100%) !important;
    }
    
    .bg-success {
        background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%) !important;
    }
    
    .bg-warning {
        background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%) !important;
    }
    
    .hr-divider {
        border: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(58, 134, 255, 0.4), transparent);
        margin: 1.5rem 0;
    }
    
    /* Asegurar que el contenido no se solape con el navbar */
    .content-header {
        padding: 15px 0.5rem;
    }
    
    .card {
        background-color: rgba(255, 255, 255, 0.95);
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    
</style>

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="dashboard-title">PANEL PRINCIPAL:  {{ Auth::user()->name }} / <b>ROL:</b> {{ Auth::user()->roles->pluck('name')->first() }}</h1>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <hr class="hr-divider">
        
        <div class="row">
            <!-- Usuarios -->
             @can('admin.usuarios.index')
                <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $total_usuarios }}</h3>
                        <p>Usuarios</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <a href="{{ url('admin/usuarios') }}" class="small-box-footer">
                        Listado de usuarios <i class="fas fa-arrow-circle-right ms-1"></i>
                    </a>
                </div>
                </div>

                <div class="col-lg-3 col-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ $total_secretarias }}</h3>
                        <p>Secretarias</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-nurse"></i>
                    </div>
                    <a href="{{ url('admin/secretarias') }}" class="small-box-footer">
                        Listado de personal <i class="fas fa-arrow-circle-right ms-1"></i>
                    </a>
                </div>
             </div>
             @endcan
            

                    @can('admin.pacientes.index')
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-gray">
                                <div class="inner">
                                    <h3>{{ $total_pacientes }}</h3>
                                    <p>Pacientes</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-procedures"></i>
                                </div>
                                <a href="{{ url('admin/pacientes') }}" class="small-box-footer">
                                    Listado de pacientes <i class="fas fa-arrow-circle-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    @endcan


                    
            
                    @can('admin.consultorios.index')
                         <div class="col-lg-3 col-6">
                        <div class="small-box bg-orange">
                            <div class="inner">
                                <h3>{{ $total_consultorios }}</h3>
                                <p>Consultorio</p>
                            </div>
                            <div class="icon">
                                <i class="bi bi-calendar-date"></i>
                            </div>
                            <a href="{{ url('admin/consultorios') }}" class="small-box-footer">
                                Listado de consultorios <i class="fas fa-arrow-circle-right ms-1"></i>
                            </a>
                        </div>
                        </div>

                    @endcan
                    
                    @can('admin.horarios.index')
                            <div class="col-lg-3 col-6">
    <div class="small-box bg-orange">
        <div class="inner">
            <h3>{{ $total_consultorios}}</h3>
            <p>Horarios</p>
        </div>
        <div class="icon">
             <i class="bi bi-house-door-fill"></i>
        </div>
        <a href="{{ url('admin/consultorios') }}" class="small-box-footer">
            Listado de horarios <i class="fas fa-arrow-circle-right ms-1"></i>
        </a>
    </div>
</div>
                    @endcan


@can('admin.doctores.index')
<div class="col-lg-3 col-6">
    <div class="small-box bg-success">
        <div class="inner">
            <h3>{{ $total_doctores }}</h3>
            <p>Doctores</p>
        </div>
        <div class="icon">
            <i class="fas fa-user-md"></i> <!-- Ícono de Font Awesome -->
        </div>
        <a href="{{ url('admin/doctores') }}" class="small-box-footer">
            Listado de doctores <i class="fas fa-arrow-circle-right ms-1"></i>
        </a>
    </div>
        </div>
@endcan

        </div>
    </div>
</section>
@endsection