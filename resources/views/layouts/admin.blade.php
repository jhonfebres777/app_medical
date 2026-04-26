<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Sistema de Consulta</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- iconos de boostrap-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
  <!-- jQuery -->
  <script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- datantables -->
  <link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <style>
    /* Personaliza la barra de botones de DataTables */
    .dt-buttons .btn, .dt-buttons .btn.btn-secondary {
        background-color: #007bff !important;
        color: #fff !important;
        border-color: #007bff !important;
    }
    .dt-buttons .btn:hover, .dt-buttons .btn.btn-secondary:hover {
        background-color: #0056b3 !important;
        color: #fff !important;
    }

    /* Navbar Glass Effect - Futurista */
    .navbar-glass {
        background: rgba(255, 255, 255, 0.85) !important;
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        border-bottom: 1px solid rgba(255, 255, 255, 0.3) !important;
    }
    
    .navbar-futurista {
        padding: 0.5rem 1rem;
        transition: all 0.3s ease;
    }
    
    .navbar-futurista .brand-name {
        font-weight: 600;
        color: #0a2463;
        letter-spacing: 0.5px;
    }
    
    .navbar-futurista .brand-tech {
        color: #3a86ff;
        font-weight: 700;
    }
    
    .navbar-futurista .nav-link {
        color: #0a2463 !important;
        font-weight: 500;
        padding: 0.8rem 1rem;
        margin: 0 0.1rem;
        border-radius: 8px;
        transition: all 0.3s;
        position: relative;
    }
    
    .navbar-futurista .nav-link:hover {
        background: rgba(58, 134, 255, 0.1) !important;
        color: #3a86ff !important;
    }
    
    .navbar-futurista .nav-link i {
        margin-right: 0.5rem;
        color: #3a86ff;
    }
    
    /* Search bar */
    .glass-search {
        background: rgba(255, 255, 255, 0.8);
        border-radius: 50px;
        overflow: hidden;
        border: 1px solid rgba(58, 134, 255, 0.2);
    }
    
    .glass-search .form-control-navbar {
        background: transparent !important;
        border: none !important;
        color: #0a2463;
    }
    
    .glass-search .btn-navbar {
        background: transparent;
        color: #3a86ff;
        border: none;
    }
    
    /* Dropdowns */
    .glass-dropdown {
        background: rgba(255, 255, 255, 0.95) !important;
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: none !important;
        border-radius: 12px !important;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        margin-top: 5px;
    }
    
    .glass-dropdown .dropdown-item {
        color: #0a2463;
        padding: 0.5rem 1.5rem;
        transition: all 0.2s;
    }
    
    .glass-dropdown .dropdown-item:hover {
        background: rgba(58, 134, 255, 0.1);
        color: #3a86ff;
    }
    
    /* Notification badge with pulse */
    .badge-pulse {
        animation: pulse 2s infinite;
        position: relative;
        top: -10px;
        right: 5px;
    }
    
    @keyframes pulse {
        0% { box-shadow: 0 0 0 0 rgba(220, 53, 69, 0.7); }
        70% { box-shadow: 0 0 0 10px rgba(220, 53, 69, 0); }
        100% { box-shadow: 0 0 0 0 rgba(220, 53, 69, 0); }
    }
    
    /* User image */
    .user-image {
        border: 2px solid rgba(58, 134, 255, 0.3);
        transition: all 0.3s;
    }
    
    .user-menu:hover .user-image {
        border-color: #3a86ff;
    }
    
    /* Responsive adjustments */
    @media (max-width: 991.98px) {
        .navbar-glass {
            backdrop-filter: none;
            -webkit-backdrop-filter: none;
        }
        
        .navbar-collapse {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-radius: 0 0 15px 15px;
            padding: 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar Futurista -->
  <nav class="main-header navbar navbar-expand navbar-glass navbar-futurista">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button">
          <i class="fas fa-bars"></i>
        </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('admin.index') }}" class="nav-link">
          <i class="fas fa-heartbeat mr-1"></i> 
          <span class="brand-name">SistemaMedico<span class="brand-tech">PRO</span></span>
        </a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm glass-search">
        <input class="form-control form-control-navbar" type="search" placeholder="Buscar..." aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications with pulse effect -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-danger badge-pulse">*</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right glass-dropdown">
          <span class="dropdown-header">Tienes notificaciones</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-calendar-check mr-2"></i> Nueva cita programada
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-user-plus mr-2"></i> Nuevo paciente registrado
            <span class="float-right text-muted text-sm">1 hora</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file-medical mr-2"></i> Reporte generado
            <span class="float-right text-muted text-sm">2 días</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">Ver todas las notificaciones</a>
        </div>
      </li>
      
      <!-- User Menu -->
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
         <i class="fas fa-heartbeat mr-1" style="font-size: 1.5rem;"></i>
          <span class="d-none d-md-inline ml-2">{{ Auth::user()->name }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right glass-dropdown">
          <a href="#" class="dropdown-item">
            <i class="fas fa-user-cog mr-2"></i> Perfil
          </a>
          <a href="#" class="dropdown-item">
            <i class="fas fa-cog mr-2"></i> Configuración
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt mr-2"></i> Cerrar sesión
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </li>
    </ul>
  </nav>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
     <i class="fas fa-heartbeat mr-1" style="font-size: 1.5rem;"></i>
      
      
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          @auth
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          @endauth
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- BARRA DE USUARIO -->

          @can('admin.usuarios.index')
              <li class="nav-item has-treeview">
            <a href="{{ route('admin.usuarios.index') }}" class="nav-link active">
              <i class="nav-icon fas bi bi-people-fill"></i>
              <p>
                USUARIO
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/usuarios/create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>creacion de usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/usuarios') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>listado de usuario</p>
                </a>
              </li>
            </ul>
             </li>
          @endcan
          
          
          <!-- BARRA DE secretarias -->

          @can('admin.secretaria.index')
                <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="bi bi-person-standing-dress"></i>
              <p>
                PERSONAL DE ATENCION
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/secretarias/create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>creacion de Secretaria</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/secretarias') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>listado de Secretaria</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
          
          
          <!-- nav Pacientes -->

          @can('admin.pacientes.index')
                <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="bi bi-person-lines-fill"></i>
              <p>
                PACIENTES
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/pacientes/create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>crear Paciente</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/pacientes') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>listado de Paciente</p>
                </a>
              </li>
            </ul>
            </li>
          @endcan


          @can('admin.historial.index')
                <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="bi bi-archive-fill"></i>
              <p>
                HISTORIAL MEDICO
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/historial/create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>crear Historial</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/historial') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>listado de Historial</p>
                </a>
              </li>
            </ul>
            </li>
          @endcan
          
          @can('admin.doctores.index')
                  <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
             <i class="bi bi-person-plus-fill"></i>
              <p>
                DOCTORES
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/doctores/create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>crear Doctor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/doctores') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>listado de Doctores </p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
          
          <!-- nav Consultorios -->
           @can('admin.consultorios.index')
              <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
             <i class="bi bi-house-door-fill"></i>
              <p>
                CONSULTORIO
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/consultorios/create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>crear Consultorio</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/consultorios') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>listado de Consultorio</p>
                </a>
              </li>
            </ul>
          </li>
           @endcan
          
          @can('admin.horarios.index')
                <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
             <i class="bi bi-calendar-date"></i>
              <p>
                HORARIO
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/horarios/create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>crear Horario</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/horarios') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>listado de Horario</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
             <i class="bi bi-calendar-date"></i>
              <p>
                Manual de usuario
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/manual/create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ver manual de usuario</p>
                </a>
              </li>
             
            </ul>
          </li>
          

          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" style="background-color: red;" id=""
               onclick="event.preventDefault();
                document.getElementById('logout-form-sidebar').submit();">
                <i class="nav-icon fas bi bi-door-closed"></i>
                <p>
                    Cerrar Sesion
                    <span class="right badge badge-danger">out</span>
                </p>
            </a>
            <form id="logout-form-sidebar" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
                
  @if (session('mensaje') && session('icon'))
    <script>
        Swal.fire({
            position: "top-end",
            icon: "{{ session('icon') }}",
            title: "{{ is_array(session('mensaje')) ? implode(', ', session('mensaje')) : session('mensaje') }}",
            showConfirmButton: false,
            timer: 4000
        });
    </script>
  @endif
 
  <div class="content-wrapper">
    <br>
    <div class="container">
      @yield('content')
    </div>
  </div>

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2025 <a href="#">JHON FEBRES</a>.</strong> All rights reserved.
  </footer>
</div>

<!-- REQUIRED SCRIPTS -->
<!-- Bootstrap 4 -->
<script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- DataTables  & Plugins -->
<script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ url('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ url('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ url('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ url('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ url('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ url('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ url('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('dist/js/adminlte.min.js') }}"></script>
</body>
</html> 