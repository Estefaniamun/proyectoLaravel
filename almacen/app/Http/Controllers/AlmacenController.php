<?php

namespace App\Http\Controllers;
use App\Models\Almacen;

use Illuminate\Http\Request;

class AlmacenController extends Controller
{
    public function index(){
        return view('almacenes.index');
    }


    public function create(){
        return view('almacenes.create');
    }


    public function edit($id){

    }


    public function destroy($id){
        
    }
}
