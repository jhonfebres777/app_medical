<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Secretaria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SecretariaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $secretarias = Secretaria::with('user')->get();
        return view('admin.secretarias.index', compact('secretarias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
                    
            return view('admin.secretarias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datos=$request->all();
        //return response()->json($datos);
        $request->validate([
                'nombres' => 'required|max:250',
                'apellidos' => 'required|max:250',
                'cedula' => 'required|max:250|unique:secretarias', 
                'email' => 'required|max:250|unique:users',
                'password' => 'required|max:250|confirmed',
            ]);

            $usuario = new User();
            $usuario->name = $request->nombres;
            $usuario->email = $request->email;
            $usuario->password = Hash::make($request->password); 
            $usuario->save();

            $secretaria = new Secretaria();
            $secretaria->user_id = $usuario->id;
            $secretaria->nombres = $request->nombres;
            $secretaria->apellidos = $request->apellidos;
            $secretaria->cedula = $request->cedula;
            $secretaria->email = $request->email;
            $secretaria->save();
            

            return redirect()->route('admin.secretarias.index')
            ->with('mensaje', 'Usuario creado correctamente')
            ->with('icon', 'success');
            




    }

    /**
     * Display the specified resource.
     */
    public function show(Secretaria $secretaria)
    {
        return view('admin.secretarias.show', compact('secretaria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Secretaria $secretaria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Secretaria $secretaria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Secretaria $secretaria)
    {
        //
    }
}
