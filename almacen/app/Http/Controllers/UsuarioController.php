<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function index(){
       
        return view('usuarios.index');
    }

    
    public function create(){
        return view('usuarios.create');
    }


    public function show($id){

    }



    public function edit($id){

    }


    public function destroy($id){
        
    }
}
