<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo_usuario;
use App\User;
use Alert;

class admninUser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tiposDusuarios = Tipo_usuario::get();
        $usuario = User::find($id);
        return view('admin.editUser', compact('tiposDusuarios','usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        #primero validamos los campos
        $request->validate([
             'name' => ['required', 'string', 'max:255'],
             'email' => ['required', 'string', 'email', 'max:255'],
             'apellidos' => ['required', 'string', 'max:255'],
             'usuario' => ['required', 'string', 'max:255'],
             'estado_civil' => ['required', 'string', 'max:255'],
             'estado' => ['required', 'string', 'max:255'],
             'profesion' => ['required', 'string', 'max:255'],
             'telefono' => ['required'], 
             'celular' => ['required'],
             'genero' => ['required', 'string', 'max:255'],
             'fecha_nacimiento' => ['required', 'string', 'max:255'],
        ]);
        #despues de ser validados
        //se actualiza el usuario
        $usuario = User::find($id);
        $usuario->name = $request->get('name');
        $usuario->email = $request->get('email');
        $usuario->apellidos = $request->get('apellidos');
        $usuario->usuario = $request->get('usuario');
        $usuario->estado_civil = $request->get('estado_civil');
        $usuario->estado = $request->get('estado');
        $usuario->profesion = $request->get('profesion');
        $usuario->telefono = $request->get('telefono');
        $usuario->celular = $request->get('celular');
        $usuario->genero = $request->get('genero');
        $usuario->fecha_nacimiento = $request->get('fecha_nacimiento');
        //Se guardan los datos
        $usuario->save();
        Alert::success('El usuario se actualizo correctamente', '¡Éxito!')->autoclose(3000);
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        #primero buscamos el usuario que se desea eliminar a travez de su id
        $usuario = User::find($id);
        #usamos el metodo delete para destruirlo
        $usuario->delete();
        Alert::success('El usuario se elimino correctamente', '¡Éxito!')->autoclose(3000);
        return redirect()->route('home');
    }
}
