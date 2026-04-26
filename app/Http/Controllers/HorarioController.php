<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Doctor; // Assuming you have a Doctor model
use App\Models\Consultorio; // Assuming you have a Consultorio model
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $horarios = Horario::with('doctor', 'consultorio')->get();
        return view('admin.horarios.index', compact('horarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctores = Doctor::all(); // Assuming you have a Doctor model
        $consultorios = Consultorio::all(); // Assuming you have a Consultorio model
        return view('admin.horarios.create', compact('doctores', 'consultorios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dia' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            
        ]);
        Horario::create($request->all());
        
        return  redirect()->route('admin.horarios.index')
            ->with('success', 'Horario creado exitosamente.')
            ->with('icon', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Horario $horario)
    {
        $horarios = Horario::with(['doctor', 'consultorio'])->get();
return view('admin.horarios.show', compact('horarios'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Horario $horario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Horario $horario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Horario $horario)
{
    $horario->delete();
    return redirect()->route('admin.horarios.index')
        ->with('success', 'Horario eliminado correctamente');
}
}
