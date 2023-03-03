<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function index(){
        $user = User::find(Auth::id());
        return view('producto.index')->with('productos', $user->productos()->get());
    }

    
    public function create(){
        return view('productos.create');
    }


    public function show($id){

    }



    public function edit($id){

    }


    public function destroy($id){
        
    }
}
