<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Doctor;

class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $historiales = Historial::with('paciente', 'doctor')->get();
        return view('admin.historial.index', compact('historiales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            $pacientes = Paciente::orderBy('apellidos', 'desc')->get();
            return view('admin.historial.create', compact('pacientes'));
    }

    public function pdf()
    {
        $historiales = Historial::with('paciente', 'doctor')->get();
        return view('admin.historial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         return view('admin.historial.store');
    }

    /**
     * Display the specified resource.
     */
    public function show(Historial $historial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Historial $historial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Historial $historial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Historial $historial)
    {
        //
    }
}
