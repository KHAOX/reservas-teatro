<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuarios;
use App\Http\Requests\UsuariosRequest;

class UsuariosController extends Controller
{
    public function index(){
       	$usuarios = usuarios::orderBy('id', 'DESC')->paginate();
       	return view('usuarios.index', compact('usuarios'));
    }

    public function create(){    	
    	return view('usuarios.create');
    }

    public function store(UsuariosRequest $request){
    	$usuario = new usuarios;
    	$usuario->nombre = $request->nombre;
    	$usuario->apellidos = $request->apellidos;
		$usuario->save();

    	return redirect()->route('usuarios.index')->with('info', 'Usuario Guardado');
    }

    public function edit($id){
    	$usuario = usuarios::find($id);
    	return view('usuarios.edit', compact('usuario'));
    }


    public function update(UsuariosRequest $request, $id){
    	$usuario = usuarios::find($id);
    	$usuario->nombre = $request->nombre;
    	$usuario->apellidos = $request->apellidos;
		$usuario->save();

    	return redirect()->route('usuarios.index')->with('info', 'Usuario actualizado');
    }

    public function show($id){
    	$usuario = usuarios::find($id);
    	return view('usuarios.show', compact('usuario'));
    }

    public function destroy($id){
    	$usuario = usuarios::find($id);
    	$usuario->delete();
    	return back()->with('info', 'Usuario Eliminado');    	
    }
}
