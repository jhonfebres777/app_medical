<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctores = Doctor::all();
        return view('admin.doctores.index', compact('doctores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
              return view('admin.doctores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nombres' => 'required|max:250',
        'apellidos' => 'required|max:250',
        'especialidad' => 'required|max:250',
        'telefono' => 'nullable|max:15',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
    ]);

    $usuario = new User();
    $usuario->name = $request->nombres;
    $usuario->email = $request->email;
    $usuario->password = Hash::make($request->password); 
    $usuario->save();

    $doctor = new Doctor();
    $doctor->nombres = $request->nombres;
    $doctor->apellidos = $request->apellidos;
    $doctor->especialidad = $request->especialidad;
    $doctor->telefono = $request->telefono;
    $doctor->user_id = $usuario->id;
    $doctor->save();

    return redirect()->route('admin.doctores.index')
        ->with('mensaje', 'Usuario creado correctamente')
        ->with('icon', 'success');
}

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        return view('admin.doctores.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        return view('admin.doctores.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $id)
    {

        $doctor = Doctor::findOrFail($id->id);
        $request->validate([
            'nombres' => 'required|max:250',
            'apellidos' => 'required|max:250',
            'especialidad' => 'required|max:250',
            'telefono' => 'nullable|max:15',
            'email' => 'required|email|unique:users,email,' . $doctor->user_id,
            'password' => 'nullable|min:6',
        ]);
       
        $doctor->nombres = $request->nombres;
        $doctor->apellidos = $request->apellidos;
        $doctor->especialidad = $request->especialidad;
        $doctor->telefono = $request->telefono;
        $doctor->save();

        // Actualizar el usuario asociado
        // Asegúrate de que el usuario existe antes de intentar actualizarlo


        $usuario = User::findOrFail($doctor->user_id);
        $usuario->name = $request->nombres;
        $usuario->email = $request->email;

        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->password);
        }

        $usuario->save();

        return redirect()->route('admin.doctores.index')
            ->with('mensaje', 'Doctor actualizado correctamente')
            ->with('icon', 'success');

        
    }

    /**
     * Remove the specified resource from storage.
     */
     public function confirmDelete($id){
                $doctor = Doctor::findOrFail($id);
                return view('admin.doctores.delete', compact('doctor'));
        }
    


    public function destroy($id)
    {
        Doctor::destroy($id);
        
        return redirect()->route('admin.doctores.index')
            ->with('success', 'Doctor eliminado correctamente');
    }
    }

