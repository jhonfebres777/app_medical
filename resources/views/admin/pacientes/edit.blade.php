@extends('layouts.admin')
@section('content')
<div class="container">
 
    
    <div class="row justify-content-center mt-4 mb-3">
        <div class="col-md-12">
            <div class="card shadow card-outline card-success">
                <div class="card-header">
                    <h4 class="mb-0">EDITAR PACIENTE: {{ $paciente->nombres }} {{ $paciente->apellidos  }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.pacientes.update', $paciente->id) }}" method="POST">
                        @csrf
                         @method('PUT')
                        <div class="row">
                            <div class="col-md-3">
                                    <label for="nombres="form-label">Introduzca el Nombre</label>
                                    <input type="text" value="{{ $paciente->nombres }}" class="form-control" id="name" name="nombres" required>
                                @error('nombres')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-3">
 
                                    <label for="apellidos" class="form-label">Introduzca los apellidos</label>
                                    <input type="text" value="{{ $paciente->apellidos }}" class="form-control" id="apellidos" name="apellidos" required>
                                @error('apellidos')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                             <div class="col-md-3">
                                    <label for="fecha_nacimiento" class="form-label">Introduzca la fecha nacimiento</label>
                                    <input type="date" value="{{$paciente->fecha_nacimiento }}" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                                @error('fecha_nacimiento')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                            <div class="col-md-3">
                                    <label for="cedula" class="form-label">Introduzca la cedula de identidad</label>
                                    <input type="text" value="{{ $paciente->cedula }}" class="form-control" id="cedula" name="cedula" required>
                                @error('cedula')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                    <label for="telefono" class="form-label">Introduzca el numero de telefono</label>
                                    <input type="text" value="{{ $paciente->telefono }}" class="form-control" id="telefono" name="telefono" required>
                                @error('telefono')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                                 <div class="col-md-3">
                            <label for="direccion" class="form-label">Introduzca la direccion </label>
                            <input type="text" value="{{ $paciente->direccion }}" class="form-control" id="direccion" name="direccion"  required>
                            @error('direccion')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                         <div class="col-md-3">
                            <label for="sexo" class="form-label">Introduzca genero  </label>
                            <select class="form-control" id="sexo" name="sexo" required>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>   
                           
                            @error('sexo')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="estado_civil" class="form-label">Introduzca el estado civil </label>
                            <select class="form-control" id="estado_civilo" name="estado_civil" required>
                                <option value="Soltero">Soltero</option>
                                <option value="Casado">Casado</option>
                                <option value="Divorciado">Divorciado</option>
                                <option value="Viudo">Viudo</option>
                            </select> 
                            
                            @error('estado_civil')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                       <div class="col-md-3">
                            <label for="ocupacion" class="form-label">Introduzca ocupacion </label>
                            <input type="text" value="{{ $paciente->ocupacion}}" class="form-control" id="ocupacion" name="ocupacion"  required>
                            @error('ocupacion')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                       <div class="col-md-3">
                            <label for="peso" class="form-label">Introduzca peso en <keygen>kg</keygen> </label>
                            <input type="text" value="{{ $paciente->peso }}" class="form-control" id="peso" name="peso"  required>
                            @error('peso')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        

                        
                       <div class="col-md-3">
                            <label for="altura" class="form-label">Introduzca altura en <keygen>cm</keygen> </label>
                            <input type="text" value="{{ $paciente->altura}}" class="form-control" id="altura" name="altura"  required>
                            @error('altura')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                      <div class="col-md-3">
                            <label for="tipo_sangre" class="form-label">Introduzca tipo de sangre</label>
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

                        <div class="col-md-3">
                            <label for="alergias" class="form-label">Introduzca tipo de alergias </label>
                            <input type="text" value="{{$paciente->alergias}}" class="form-control" id="alergias" name="alergias"  required>
                            @error('alergias')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label for="enfermedades" class="form-label">Introduzca tipo de enfermedad</label>
                            <input type="text" value="{{$paciente->enfermedades }}" class="form-control" id="enfermedades" name="enfermedades"  required>
                            @error('enfermedades')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                       <div class="col-md-3">
                            <label for="medicamentos" class="form-label">Introduzca medicamentos</label>
                            <input type="text" value="{{ $paciente->medicamentos}}" class="form-control" id="medicamentos" name="medicamentos"  required>
                            @error('medicamentos')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                      <div class="col-md-3">
                            <label for="antecedentes" class="form-label">Introduzca tipo de antecedentes</label>
                            <input type="text" value="{{ $paciente->antecedentes }}" class="form-control" id="antecedentes" name="antecedentes"  required>
                            @error('antecedentes')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                       <div class="col-md-3">
                            <label for="contacto_emergencia" class="form-label">Introduzca un contacto de emergencia</label>
                            <input type="text" value="{{ old($paciente->contacto_emergencia) }}" class="form-control" id="contacto_emergencia" name="contacto_emergencia"  required>
                            @error('contacto_emergencia')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                      <div class="col-md-3">
                            <label for="observaciones" class="form-label">Introduzca observaciones</label>
                            <input type="text" value="{{ $paciente->observaciones}}" class="form-control" id="observaciones" name="observaciones"  required>
                            @error('observaciones')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                       <div class="col-md-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" value="{{ $paciente->email }}" class="form-control" id="email" name="email" required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        </div>
                      
                       
                        <div class="form-group d-flex justify-content-between">
                            <button type="submit" class="btn btn-success">Actualizar Paciente</button>
                            <a href="{{ url('admin/pacientes') }}" class="btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection