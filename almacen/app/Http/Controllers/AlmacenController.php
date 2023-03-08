<?php

namespace App\Http\Controllers;
use App\Models\Almacen;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlmacenController extends Controller
{
    public function index(){
        $producto = Producto::find(Auth::id());
        return view('almacenes.index')->width('almacen', $producto->almacen()->get());
    }


    public function create(){
        return view('almacenes.create');
    }


    public function edit($id){

    }


    public function destroy($id){
        
    }
}
