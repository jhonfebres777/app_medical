
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\SecretariaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ConsultorioController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\ManualController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Página principal personalizada
Route::get('/', function () {
    return view('index'); // resources/views/index.blade.php
});

// Auth routes (login, register, etc)
Auth::routes();

// Home (puedes elegir cuál usar, aquí va el HomeController)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

// Admin dashboard
Route::get('/admin', [AdminController::class, 'index'])
    ->name('admin.index')
    ->middleware('auth');

// ==================== USUARIOS ====================

// Listado de usuarios
Route::get('/admin/usuarios', [UsuarioController::class, 'index'])
    ->name('admin.usuarios.index')
    ->middleware('auth');

// Crear usuario (formulario)
Route::get('/admin/usuarios/create', [UsuarioController::class, 'create'])
    ->name('admin.usuarios.create')
    ->middleware('auth');

// Guardar usuario (POST)
Route::post('/admin/usuarios/store', [UsuarioController::class, 'store'])
    ->name('admin.usuarios.store')
    ->middleware('auth');

// Editar usuario (formulario)
Route::get('/admin/usuarios/{id}/edit', [UsuarioController::class, 'edit'])
    ->name('admin.usuarios.edit')
    ->middleware('auth');

// Actualizar usuario (PUT)
Route::put('/admin/usuarios/{id}', [UsuarioController::class, 'update'])
    ->name('admin.usuarios.update')
    ->middleware('auth');

// Mostrar usuario específico
Route::get('/admin/usuarios/{id}', [UsuarioController::class, 'show'])
    ->name('admin.usuarios.show')
    ->middleware('auth');

// Confirmar eliminación de usuario (opcional)
Route::get('/admin/usuarios/{id}/confirm-delete', [UsuarioController::class, 'confirmDelete'])
    ->name('admin.usuarios.confirmDelete')
    ->middleware('auth');

// Eliminar usuario (DELETE)
Route::delete('/admin/usuarios/{id}', [UsuarioController::class, 'destroy'])
    ->name('admin.usuarios.destroy')
    ->middleware('auth');

// ==================== SECRETARIAS ====================

// Listado de secretarias
Route::get('/admin/secretarias', [SecretariaController::class, 'index'])
    ->name('admin.secretarias.index')
    ->middleware('auth');

// Crear secretaria (formulario)
Route::get('/admin/secretarias/create', [SecretariaController::class, 'create'])
    ->name('admin.secretarias.create')
    ->middleware('auth');

// Guardar secretaria (POST)
Route::post('/admin/secretarias/store', [SecretariaController::class, 'store'])
    ->name('admin.secretarias.store')
    ->middleware('auth');

// ==================== PACIENTES ====================

// Listado de pacientes
Route::get('/admin/pacientes', [PacienteController::class, 'index'])
    ->name('admin.pacientes.index')
    ->middleware('auth');

// Crear paciente (formulario)
Route::get('/admin/pacientes/create', [PacienteController::class, 'create'])
    ->name('admin.pacientes.create')
    ->middleware('auth');

// Guardar paciente (POST)
Route::post('/admin/pacientes', [PacienteController::class, 'store'])
    ->name('admin.pacientes.store')
    ->middleware('auth');

// Mostrar paciente específico
Route::get('/admin/pacientes/{id}', [PacienteController::class, 'show'])
    ->name('admin.pacientes.show')
    ->middleware('auth');

// Editar paciente (formulario)
Route::get('/admin/pacientes/{id}/edit', [PacienteController::class, 'edit'])
    ->name('admin.pacientes.edit')
    ->middleware('auth');

// Actualizar paciente (PUT)
Route::put('/admin/pacientes/{id}', [PacienteController::class, 'update'])
    ->name('admin.pacientes.update')
    ->middleware('auth');

// Confirmar eliminación de paciente (opcional)
Route::get('/admin/pacientes/{id}/confirm-delete', [PacienteController::class, 'confirmDelete'])
    ->name('admin.pacientes.confirmDelete')
    ->middleware('auth');

// Eliminar paciente (DELETE)
Route::delete('/admin/pacientes/{id}', [PacienteController::class, 'destroy'])
    ->name('admin.pacientes.destroy')
    ->middleware('auth');


// ==================== CONSULTORIOS ====================
// Listado de consultorios
Route::get('/admin/consultorios', [ConsultorioController::class, 'index'])
    ->name('admin.consultorios.index')
    ->middleware('auth');

// Crear paciente (formulario)
Route::get('/admin/consultorios/create', [ConsultorioController::class, 'create'])
    ->name('admin.consultorios.create')
    ->middleware('auth');

// Guardar paciente (POST)
Route::post('/admin/consultorios', [ConsultorioController::class, 'store'])
    ->name('admin.consultorios.store')
    ->middleware('auth');

// Mostrar paciente específico
Route::get('/admin/consultorios/{id}', [ConsultorioController::class, 'show'])
    ->name('admin.consultorios.show')
    ->middleware('auth');

// Editar paciente (formulario)
Route::get('/admin/consultorios/{id}/edit', [ConsultorioController::class, 'edit'])
    ->name('admin.consultorios.edit')
    ->middleware('auth');

// Actualizar paciente (PUT)
Route::put('/admin/consultorios/{id}', [ConsultorioController::class, 'update'])
    ->name('admin.consultorios.update')
    ->middleware('auth');

// Confirmar eliminación de paciente (opcional)
Route::get('/admin/consultorios/{id}/confirm-delete', [ConsultorioController::class, 'confirmDelete'])
    ->name('admin.consultorios.confirmDelete')
    ->middleware('auth');

// Eliminar paciente (DELETE)
Route::delete('/admin/consultorios/{id}', [ConsultorioController::class, 'destroy'])
    ->name('admin.consultorios.destroy')
    ->middleware('auth');


    //======================================== DOCTORES =================================

// Listado de doctores
Route::get('/admin/doctores', [App\Http\Controllers\DoctorController::class, 'index'])
    ->name('admin.doctores.index')
    ->middleware('auth');

// Crear doctor (formulario)
Route::get('/admin/doctores/create', [App\Http\Controllers\DoctorController::class, 'create'])
    ->name('admin.doctores.create')
    ->middleware('auth');

// Guardar doctor (POST)
Route::post('/admin/doctores/store', [App\Http\Controllers\DoctorController::class, 'store'])
    ->name('admin.doctores.store')
    ->middleware('auth');

// Mostrar doctor específico
Route::get('/admin/doctores/{doctor}', [App\Http\Controllers\DoctorController::class, 'show'])
    ->name('admin.doctores.show')
    ->middleware('auth');

// Editar doctor (formulario)
Route::get('/admin/doctores/{doctor}/edit', [App\Http\Controllers\DoctorController::class, 'edit'])
    ->name('admin.doctores.edit')
    ->middleware('auth');

// Actualizar doctor (PUT)
Route::put('/admin/doctores/{id}', [App\Http\Controllers\DoctorController::class, 'update'])
    ->name('admin.doctores.update')
    ->middleware('auth');

// Confirmar eliminación de doctor (opcional)
Route::get('/admin/doctores/{id}/confirm-delete', [App\Http\Controllers\DoctorController::class, 'confirmDelete'])
    ->name('admin.doctores.confirmDelete')
    ->middleware('auth');

// Eliminar doctor (DELETE)
Route::delete('/admin/doctores/{id}', [App\Http\Controllers\DoctorController::class, 'destroy'])
    ->name('admin.doctores.destroy')
    ->middleware('auth');


     //======================================== HORARIOS =================================

// Listado de doctores
Route::get('/admin/horarios', [App\Http\Controllers\HorarioController::class, 'index'])
    ->name('admin.horarios.index')
    ->middleware('auth');

// Crear doctor (formulario)
Route::get('/admin/horarios/create', [App\Http\Controllers\HorarioController::class, 'create'])
    ->name('admin.horarios.create')
    ->middleware('auth');

// Guardar doctor (POST)
Route::post('/admin/horarios/store', [App\Http\Controllers\HorarioController::class, 'store'])
    ->name('admin.horarios.store')
    ->middleware('auth');

// Mostrar doctor específico
Route::get('/admin/horarios/{doctor}', [App\Http\Controllers\HorarioController::class, 'show'])
    ->name('admin.horarios.show')
    ->middleware('auth');

// Editar doctor (formulario)
Route::get('/admin/horarios/{doctor}/edit', [App\Http\Controllers\HorarioController::class, 'edit'])
    ->name('admin.horarios.edit')
    ->middleware('auth');

// Actualizar doctor (PUT)
Route::put('/admin/horarios/{id}', [App\Http\Controllers\HorarioController::class, 'update'])
    ->name('admin.horarios.update')
    ->middleware('auth');

// Confirmar eliminación de doctor (opcional)
Route::get('/admin/horarios/{id}/confirm-delete', [App\Http\Controllers\HorarioController::class, 'confirmDelete'])
    ->name('admin.horarios.confirmDelete')
    ->middleware('auth');

// Eliminar doctor (DELETE)
Route::delete('/admin/horarios/{id}', [App\Http\Controllers\HorarioController::class, 'destroy'])
    ->name('admin.horarios.destroy')
    ->middleware('auth');

    //rutas para el historico de clinicos
    Route::get('/admin/historial', [App\Http\Controllers\HistorialController::class, 'index'])
    ->name('can:admin.historial.index')
    ->middleware('auth');

    Route::get('/admin/historial/create', [App\Http\Controllers\HistorialController::class, 'create'])
    ->name('admin.historial.create')
    ->middleware('auth');

    Route::post('/admin/historial/store', [App\Http\Controllers\HistorialController::class, 'store'])
    ->name('admin.historial.store')
    ->middleware('auth');

    Route::get('/admin/historial/{id}', [App\Http\Controllers\HistorialController::class, 'show'])
    ->name('admin.historial.show')
    ->middleware('auth');

    Route::get('/admin/historial/{id}/edit', [App\Http\Controllers\HistorialController::class, 'edit'])
    ->name('admin.historial.edit')
    ->middleware('auth');

    Route::put('/admin/historial/{id}', [App\Http\Controllers\HistorialController::class, 'update'])
    ->name('admin.historial.update')
    ->middleware('auth');

    Route::get('/admin/historial/{id}/confirm-delete', [App\Http\Controllers\HistorialController::class, 'confirmDelete'])
    ->name('admin.historial.confirmDelete')
    ->middleware('auth');

    Route::delete('/admin/historial/{id}', [App\Http\Controllers\HistorialController::class, 'destroy'])
    ->name('admin.historial.destroy')
    ->middleware('auth');

    Route::delete('/admin/historial/pdf', [App\Http\Controllers\HistorialController::class, 'pdf'])
    ->name('admin.historial.pdf')
    ->middleware('auth');
    

    Route::get('/admin/manual', [App\Http\Controllers\ManualController::class, 'index'])
    ->name('admin.manuales.index')
    ->middleware('auth');

    Route::get('/admin/manual/create', [App\Http\Controllers\ManualController::class, 'create'])
    ->name('admin.manuales.create')
    ->middleware('auth');








    



    






