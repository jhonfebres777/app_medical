<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('admin.usuarios.create');
    }

    public function store(Request $request)
    {
        // 1. Validar los datos
        $request->validate([
            'name' => 'required|max:250',
            'email' => 'required|max:250|unique:users',
            'password' => 'required|max:250|confirmed',
        ]);

        // 2. Crear el usuario
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password); 
        $usuario->save();

        // 3. Redireccionar con mensaje
        return redirect()->route('admin.usuarios.index')
            ->with('mensaje', 'Usuario creado correctamente')
            ->with('icon', 'success');
    }
    
    public function show($id)
    {
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.show', compact('usuario'));
    }

    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        // 1. Validar los datos
        $request->validate([
            'name' => 'required|max:250',
            'email' => 'required|max:250|unique:users,email,' . $id,
            'password' => 'nullable|max:250|confirmed',
        ]);

        // 2. Buscar el usuario
        $usuario = User::findOrFail($id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;

        // 3. Actualizar la contraseña solo si se proporciona
        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->password);
        }

        $usuario->save();

        // 4. Redireccionar con mensaje
        return redirect()->route('admin.usuarios.index')
            ->with('mensaje', 'Usuario actualizado correctamente')
            ->with('icon', 'success');
    }
    

    public function confirmDelete($id)
    {
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.delete', compact('usuario'));
    }

   public function destroy($id)
{
    $usuario = User::findOrFail($id);
    $usuario->delete();

    // Redirige al listado de usuarios con mensaje de éxito
    return redirect()->route('admin.usuarios.index')
        ->with('mensaje', 'Usuario eliminado correctamente')
        ->with('icon', 'success');
}



    
}