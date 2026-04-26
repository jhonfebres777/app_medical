<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manual de Usuario - Gestión de Consultorio Médico</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #0a2463 0%, #3e92cc 100%);
            min-height: 100vh;
            padding: 20px;
            color: #333;
        }
        
        .container {
            max-width: 1000px;
            margin: 0 auto;
        }
        
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
            font-size: 16px;
            color: #495057;
            display: flex;
            align-items: center;
            height: 48px;
        }
        
        .btn {
            border-radius: 8px;
            padding: 12px 25px;
            font-weight: 600;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
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
        
        /* Molecules */
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-actions {
            display: flex;
            justify-content: center;
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
            margin-bottom: 2rem;
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
        
        /* Info cards */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin: 2rem 0;
        }
        
        .info-card {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            border-left: 4px solid #3a86ff;
        }
        
        .info-card:hover {
            transform: translateY(-5px);
        }
        
        .info-card h3 {
            color: #3a86ff;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
        }
        
        .info-card h3 i {
            margin-right: 10px;
        }
        
        .info-card ul {
            padding-left: 1.5rem;
        }
        
        .info-card li {
            margin-bottom: 0.5rem;
            line-height: 1.5;
        }
        
        /* Header navigation */
        .header-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            background: white;
            padding: 1rem 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .header-nav h1 {
            color: #3a86ff;
            font-size: 1.8rem;
        }
        
        .nav-links {
            display: flex;
            gap: 1.5rem;
        }
        
        .nav-links a {
            text-decoration: none;
            color: #5a5c69;
            font-weight: 600;
            transition: color 0.3s;
        }
        
        .nav-links a:hover {
            color: #3a86ff;
        }
        
        /* Steps */
        .step-container {
            display: flex;
            margin-bottom: 1.5rem;
            align-items: flex-start;
        }
        
        .step-number {
            background: #3a86ff;
            color: white;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-right: 15px;
            flex-shrink: 0;
        }
        
        .step-content {
            flex: 1;
        }
        
        .step-content h4 {
            color: #3a86ff;
            margin-bottom: 0.5rem;
        }
        
        /* Footer */
        .footer {
            text-align: center;
            padding: 2rem;
            color: white;
            margin-top: 2rem;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .info-grid {
                grid-template-columns: 1fr;
            }
            
            .header-nav {
                flex-direction: column;
                text-align: center;
            }
            
            .nav-links {
                margin-top: 1rem;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .form-actions {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
        }
        
        /* Manual specific styles */
        .section-title {
            color: #3a86ff;
            border-bottom: 2px solid #3a86ff;
            padding-bottom: 0.5rem;
            margin: 2rem 0 1.5rem 0;
        }
        
        .feature-list {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 1.5rem;
            margin: 1.5rem 0;
        }
        
        .feature-list li {
            margin-bottom: 0.8rem;
        }
        
        .note-box {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 1rem;
            margin: 1.5rem 0;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header-nav">
            <h1><i class="fas fa-book-medical"></i> Manual de Usuario</h1>
            <div class="nav-links">
               
            </div>
        </div>

        <!-- Main Content -->
        <div class="form-card">
            <div class="form-card-header">
                <h4 class="form-card-title">Sistema de Gestión de Consultorio Médico</h4>
            </div>
            <div class="form-card-body">
                <p>Bienvenido al manual de usuario del sistema de gestión de consultorio médico. Esta aplicación está diseñada para ayudarte a administrar la información de pacientes y horarios de atención de manera eficiente.</p>
                
                <h3 class="section-title">Funcionalidades Principales</h3>
                
                <div class="info-grid">
                    <div class="info-card">
                        <h3><i class="fas fa-user-injured"></i> Gestión de Pacientes</h3>
                        <ul>
                            <li>Registrar nuevos pacientes</li>
                            <li>Ver listado de pacientes</li>
                            <li>Editar información existente</li>
                            <li>Gestionar historial médico</li>
                        </ul>
                    </div>
                    
                    <div class="info-card">
                        <h3><i class="fas fa-calendar-alt"></i> Gestión de Horarios</h3>
                        <ul>
                            <li>Configurar horarios de atención</li>
                            <li>Gestionar disponibilidad</li>
                            <li>Definir jornadas laborales</li>
                            <li>Visualizar horarios establecidos</li>
                        </ul>
                    </div>
                </div>
                
                <h3 class="section-title">Cómo Registrar un Paciente</h3>
                
                <div class="step-container">
                    <div class="step-number">1</div>
                    <div class="step-content">
                        <h4>Acceder al módulo de pacientes</h4>
                        <p>Desde el menú principal, haz clic en la opción "Pacientes" y luego selecciona "Nuevo Paciente".</p>
                    </div>
                </div>
                
                <div class="step-container">
                    <div class="step-number">2</div>
                    <div class="step-content">
                        <h4>Completar información requerida</h4>
                        <p>Llena todos los campos obligatorios del formulario de registro (nombre, apellidos, fecha de nacimiento, etc.).</p>
                    </div>
                </div>
                
                <div class="step-container">
                    <div class="step-number">3</div>
                    <div class="step-content">
                        <h4>Guardar la información</h4>
                        <p>Haz clic en el botón "Guardar" para almacenar la información del nuevo paciente en el sistema.</p>
                    </div>
                </div>
                
                <div class="note-box">
                    <p><strong>Nota:</strong> Todos los campos marcados con un asterisco (*) son obligatorios para completar el registro.</p>
                </div>
                
                <h3 class="section-title">Cómo Gestionar Horarios</h3>
                
                <div class="step-container">
                    <div class="step-number">1</div>
                    <div class="step-content">
                        <h4>Acceder al módulo de horarios</h4>
                        <p>Desde el menú principal, selecciona la opción "Horarios" para visualizar y gestionar los horarios de atención.</p>
                    </div>
                </div>
                
                <div class="step-container">
                    <div class="step-number">2</div>
                    <div class="step-content">
                        <h4>Configurar horario de atención</h4>
                        <p>Selecciona los días de la semana y establece las horas de inicio y fin para cada jornada de atención.</p>
                    </div>
                </div>
                
                <div class="step-container">
                    <div class="step-number">3</div>
                    <div class="step-content">
                        <h4>Guardar configuración</h4>
                        <p>Haz clic en "Guardar Horario" para aplicar los cambios realizados en la configuración de horarios.</p>
                    </div>
                </div>
                
                <div class="feature-list">
                    <h4><i class="fas fa-lightbulb"></i> Consejos para la gestión de horarios:</h4>
                    <ul>
                        <li>Establece horarios realistas según tu capacidad de atención</li>
                        <li>Considera incluir tiempos de descanso entre consultas</li>
                        <li>Actualiza los horarios cuando haya cambios en tu disponibilidad</li>
                        <li>Configura horarios especiales para días festivos</li>
                    </ul>
                </div>
                
                <h3 class="section-title">Búsqueda y Filtros</h3>
                
                <div class="info-grid">
                    <div class="info-card">
                        <h3><i class="fas fa-search"></i> Buscar Pacientes</h3>
                        <p>Utiliza el campo de búsqueda en la parte superior de la lista de pacientes para encontrar registros específicos por nombre, apellido o número de identificación.</p>
                    </div>
                    
                    <div class="info-card">
                        <h3><i class="fas fa-filter"></i> Filtrar Información</h3>
                        <p>Aplica filtros para visualizar pacientes por fecha de registro, género o otros criterios específicos según tus necesidades.</p>
                    </div>
                </div>
                
               
            </div>
        </div>
        
        <!-- Footer -->
     
    </div>
</body>
</html>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad Económica de un Consultorio Médico</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #0a2463 0%, #3e92cc 100%);
            min-height: 100vh;
            padding: 20px;
            color: #333;
        }
        
        .container {
            max-width: 1000px;
            margin: 0 auto;
        }
        
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
            font-size: 16px;
            color: #495057;
            display: flex;
            align-items: center;
            height: 48px;
        }
        
        .btn {
            border-radius: 8px;
            padding: 12px 25px;
            font-weight: 600;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
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
        
        /* Molecules */
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-actions {
            display: flex;
            justify-content: center;
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
            margin-bottom: 2rem;
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
        
        /* Info cards */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin: 2rem 0;
        }
        
        .info-card {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        
        .info-card:hover {
            transform: translateY(-5px);
        }
        
        .info-card h3 {
            color: #3a86ff;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
        }
        
        .info-card h3 i {
            margin-right: 10px;
        }
        
        .info-card ul {
            padding-left: 1.5rem;
        }
        
        .info-card li {
            margin-bottom: 0.5rem;
        }
        
        /* Header navigation */
        .header-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            background: white;
            padding: 1rem 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .header-nav h1 {
            color: #3a86ff;
            font-size: 1.8rem;
        }
        
        .nav-links {
            display: flex;
            gap: 1.5rem;
        }
        
        .nav-links a {
            text-decoration: none;
            color: #5a5c69;
            font-weight: 600;
            transition: color 0.3s;
        }
        
        .nav-links a:hover {
            color: #3a86ff;
        }
        
        /* Footer */
        .footer {
            text-align: center;
            padding: 2rem;
            color: white;
            margin-top: 2rem;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .info-grid {
                grid-template-columns: 1fr;
            }
            
            .header-nav {
                flex-direction: column;
                text-align: center;
            }
            
            .nav-links {
                margin-top: 1rem;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .form-actions {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header-nav">
            <h1><i class="fas fa-hospital"></i> Consultorio Médico</h1>
           
        </div>

        <!-- Main Content -->
        <div class="form-card">
            <div class="form-card-header">
                <h4 class="form-card-title">Actividad Económica del Consultorio Médico</h4>
            </div>
            <div class="form-card-body">
                <p>Un consultorio médico es una unidad económica dedicada a la prestación de servicios de salud. Su actividad económica se clasifica dentro del sector terciario o de servicios, específicamente en el rubro de servicios de salud.</p>
                
                <div class="info-grid">
                    <div class="info-card">
                        <h3><i class="fas fa-money-bill-wave"></i> Ingresos Principales</h3>
                        <ul>
                            <li>Consultas médicas</li>
                            <li>Procedimientos médicos</li>
                            <li>Estudios diagnósticos</li>
                            <li>Servicios de vacunación</li>
                            <li>Chequeos preventivos</li>
                        </ul>
                    </div>
                    
                    <div class="info-card">
                        <h3><i class="fas fa-credit-card"></i> Estructura de Costos</h3>
                        <ul>
                            <li>Honorarios médicos</li>
                            <li>Personal administrativo</li>
                            <li>Alquiler del local</li>
                            <li>Suministros médicos</li>
                            <li>Equipamiento y mantenimiento</li>
                            <li>Seguros y permisos</li>
                        </ul>
                    </div>
                    
                    <div class="info-card">
                        <h3><i class="fas fa-chart-line"></i> Aspectos Económicos Clave</h3>
                        <ul>
                            <li>Modelo de negocio de servicios de salud</li>
                            <li>Dependiente de seguros médicos y pagos directos</li>
                            <li>Alto componente de gastos en equipamiento</li>
                            <li>Personal altamente especializado</li>
                            <li>Regulación estricta por autoridades sanitarias</li>
                        </ul>
                    </div>
                    
                    <div class="info-card">
                        <h3><i class="fas fa-file-invoice-dollar"></i> Clasificación Económica</h3>
                        <ul>
                            <li><strong>Sector:</strong> Terciario (Servicios)</li>
                            <li><strong>Rubro:</strong> Servicios de salud</li>
                            <li><strong>Categoría:</strong> Atención ambulatoria</li>
                            <li><strong>CNAE:</strong> 862 - Actividades de atención ambulatoria</li>
                            <li><strong>NAICS:</strong> 6211 - Oficinas de médicos</li>
                        </ul>
                    </div>
                </div>
                
                <h3 style="color: #3a86ff; margin-bottom: 1rem;">Modelo de Negocio</h3>
                <p>El consultorio médico opera típicamente como un negocio de prestación de servicios de salud, donde los ingresos provienen principalmente de las consultas y procedimientos realizados. Puede funcionar bajo diferentes modelos:</p>
                
                <div class="info-grid">
                    <div class="info-card">
                        <h3><i class="fas fa-user-md"></i> Práctica Privada</h3>
                        <p>Médicos que atienden de forma independiente, asumiendo todos los costos y beneficios económicos de la práctica.</p>
                    </div>
                    
                    <div class="info-card">
                        <h3><i class="fas fa-hospital"></i> Afiliación a Grupos</h3>
                        <p>Médicos que se asocian con grupos médicos o hospitales, compartiendo gastos y recursos.</p>
                    </div>
                    
                    <div class="info-card">
                        <h3><i class="fas fa-handshake"></i> Convenios con Seguros</h3>
                        <p>Establecimiento de acuerdos con aseguradoras médicas para atender a sus afiliados.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Additional Info -->
        <div class="form-card">
            <div class="form-card-header">
                <h4 class="form-card-title">Impacto Económico y Social</h4>
            </div>
            <div class="form-card-body">
                <p>Los consultorios médicos no solo tienen importancia económica directa, sino que también contribuyen significativamente al bienestar social y al sistema de salud en general:</p>
                
                <div class="info-grid">
                    <div class="info-card">
                        <h3><i class="fas fa-briefcase"></i> Generación de Empleo</h3>
                        <p>Crean puestos de trabajo para médicos, enfermeras, personal administrativo y técnicos.</p>
                    </div>
                    
                    <div class="info-card">
                        <h3><i class="fas fa-heartbeat"></i> Accesibilidad a la Salud</h3>
                        <p>Facilitan el acceso a servicios de salud, reduciendo la carga de los hospitales.</p>
                    </div>
                    
                    <div class="info-card">
                        <h3><i class="fas fa-clinic-medical"></i> Reducción de Costos</h3>
                        <p>Ayudan a reducir costos del sistema de salud al prevenir enfermedades y tratar condiciones en etapas tempranas.</p>
                    </div>
                </div>
                
                e
            </div>
        </div>
        
        <!-- Footer -->
          <div class="footer">
            <p>© 2025 Sistema de Gestión de Consultorio Médico - Versión 1.0</p>
            <p>Para soporte técnico, contactar a: JHON FEBRES </p>
        </div>
    </div>
</body>
</html>