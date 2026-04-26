<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = Paciente::all();
        return view('admin.pacientes.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|max:250',
            'apellidos' => 'required|max:250',
            'fecha_nacimiento' => 'required|date',
            'cedula' => 'required|max:250|unique:pacientes',
            'telefono' => 'required|max:250',
            'direccion' => 'required|max:250',
            'sexo' => 'required|max:250',
            'estado_civil' => 'required|max:250',
            'ocupacion' => 'required|max:250',
            'peso' => 'required|numeric',
            'altura' => 'required|numeric',
            'tipo_sangre' => 'required|max:250',
            'alergias' => 'required',
            'enfermedades' => 'required',
            'medicamentos' => 'required',
            'antecedentes' => 'required',
            'contacto_emergencia' => 'required',
            'observaciones' => 'required',
            'email' => 'required|email|max:250|unique:pacientes',
            'fecha_consulta' => 'nullable|date',
        ]);
        

        $paciente = new Paciente();
        $paciente->nombres = $request->nombres;
        $paciente->apellidos = $request->apellidos;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->cedula = $request->cedula;
        $paciente->telefono = $request->telefono;
        $paciente->direccion = $request->direccion;
        $paciente->sexo = $request->sexo;
        $paciente->estado_civil = $request->estado_civil;
        $paciente->ocupacion = $request->ocupacion;
        $paciente->peso = $request->peso;
        $paciente->altura = $request->altura;
        $paciente->tipo_sangre = $request->tipo_sangre;
        $paciente->alergias = $request->alergias;
        $paciente->enfermedades = $request->enfermedades;
        $paciente->medicamentos = $request->medicamentos;
        $paciente->antecedentes = $request->antecedentes;
        $paciente->contacto_emergencia = $request->contacto_emergencia;
        $paciente->observaciones = $request->observaciones;
        $paciente->email = $request->email;
        $paciente->fecha_consulta = $request->fecha_consulta;
        $paciente->save();


        return redirect()->route('admin.pacientes.index')
            ->with('success', 'Paciente actualizado correctamente')
            ->with('icon', 'success');

       
           
    }

    /**
     * Display the specified resource.
     */
    //para declarar las 
    public function show($id)
    {
        $paciente = Paciente::findOrFail($id);
          return view('admin.pacientes.show',compact('paciente'));
          
    }

    /**
     * Show the form for editing the specified resource.
     */
public function edit($id)
{
    $paciente = Paciente::findOrFail($id);  // Busca manualmente el paciente
    return view('admin.pacientes.edit', compact('paciente'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $paciente = Paciente::find($id);


        $request->validate([
            'nombres' => 'required|max:250',
            'apellidos' => 'required|max:250',
            'fecha_nacimiento' => 'required|date',
            'cedula' => 'required|max:250|unique:pacientes,cedula,'.$paciente->id,
            'telefono' => 'required|max:250',
            'direccion' => 'required|max:250',
            'sexo' => 'required|max:250',
            'estado_civil' => 'required|max:250',
            'ocupacion' => 'required|max:250',
            'peso' => 'required|numeric',
            'altura' => 'required|numeric',
            'tipo_sangre' => 'required|max:250',
            'alergias' => 'required',
            'enfermedades' => 'required',
            'medicamentos' => 'required',
            'antecedentes' => 'required',
            'contacto_emergencia' => 'required',
            'observaciones' => 'required',
            'email' => 'required|email|max:250|unique:pacientes,email,'.$paciente->id,
            'fecha_consulta' => 'nullable|date',
        ]);

        $paciente->nombres = $request->nombres;
        $paciente->apellidos = $request->apellidos;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->cedula = $request->cedula;
        $paciente->telefono = $request->telefono;
        $paciente->direccion = $request->direccion;
        $paciente->sexo = $request->sexo;
        $paciente->estado_civil = $request->estado_civil;
        $paciente->ocupacion = $request->ocupacion;
        $paciente->peso = $request->peso;
        $paciente->altura = $request->altura;
        $paciente->tipo_sangre = $request->tipo_sangre;
        $paciente->alergias = $request->alergias;
        $paciente->enfermedades = $request->enfermedades;
        $paciente->medicamentos = $request->medicamentos;
        $paciente->antecedentes = $request->antecedentes;
        $paciente->contacto_emergencia = $request->contacto_emergencia;
        $paciente->observaciones = $request->observaciones;
        $paciente->email = $request->email;
        $paciente->fecha_consulta = $request->fecha_consulta;
        $paciente->save();


        return redirect()->route('admin.pacientes.index')
            ->with('success', 'Paciente actualizado correctamente')
            ->with('icon', 'success');
            
    }

    /**
     * Remove the specified resource from storage.
     */
        public function confirmDelete($id){
                $paciente = Paciente::findOrFail($id);
                return view('admin.pacientes.delete', compact('paciente'));
        }
    


    public function destroy($id)
    {
        Paciente::destroy($id);
        
        return redirect()->route('admin.pacientes.index')
            ->with('success', 'Paciente eliminado correctamente');
    }
}