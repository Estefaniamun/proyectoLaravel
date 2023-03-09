<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index(){
       $users = User::all();
        return view('usuarios.index')->with('usuarios', $users);
    }

    
    public function create(){
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'apell' => 'required',
            'address' => 'required',
            'email'=>'required',
            'password'=>'required',
            'rol'=>'required'
        ]);

        try {
            $usuario = new User();
            $usuario->name = $request->name;
            $usuario->apell = $request->apell;
            $usuario->address = $request->address;
            $usuario->email = $request->email;
            $usuario->password = $request->password;
            $usuario->save();
            return redirect()->route('usuario.index')->with('status', "Usuario creado correctamente");
        } catch (QueryException $e) {
            return redirect()->route('usuario.index')->with('status', "No se ha podido crear el usuario");
        }
    }

    public function show($id){
        $usuario = User::find($id);
        $usuarios = User::all();
         return view('usuarios.show')->with('usuario', $usuario)->with('usuarios', $usuarios);
    }



    public function edit($id){
        $usuario = User::find($id);
        return view('usuarios.edit')->with('usuario', $usuario);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name'=>'required',
            'apell'=>'required',
            'address' => 'required',
            'email'=>'required',
            'password'=>'required'

        ]);
        try{
            $usuario = User::find($id);
            $usuario->name = $request->name;
            $usuario->apell = $request->apell;
            $usuario->address = $request->address;
            $usuario->email = $request->email;
            if ($request->password) {
                $usuario->password = Hash::make($request->password);
            }
            $usuario->save();
            return redirect()->route('usuario.index')->with('status', "Usuario modificado correctamente");
        } catch (QueryException $e) {
            return redirect()->route('usuario.index')->with('status', "No se ha podido modificar el usuario");
        }        
    }
    public function destroy($id){
        try{
            $usuario = User::find($id);
            $usuario->delete();
            return redirect()->route('usuario.index')->with('status', "Usuario eliminado correctamente");
        } catch (QueryException $e) {
            return redirect()->route('usuario.index')->with('status', "No se ha podido eliminado el usuario");
        }
    }
}
