<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    public function index(){
        $compras = Compra::all();
        
        return view('compras.index')->with('compras', $compras);
    }

    public function create(){
        $productos = Producto::all();
        $usuarios = User::all();
        return view('compras.create')->with('productos', $productos)->with('usuarios', $usuarios);
    } 
    public function store(Request $request)
    {
        $request->validate([
            'id_producto' => 'required',
            'id_usuario' => 'required',
            'precio' => 'required',
        ]);

        try {
            $compra = new Compra();
            $compra->id_producto = Producto::find($request->id_producto);
            $compra->id_usuario = Auth::id();
            $compra->precio = $request->precio;
            
            $compra->save();
            return redirect()->route('compra.index')->with('status', "Compra creado correctamente");
        } catch (QueryException $e) {
            return redirect()->route('compra.index')->with('status', "No se ha podido crear el compra");
        }
    }

    public function show($id){
        $compra = Compra::find($id);
      
        return view('compras.show')->with('compra', $compra);
    }
    public function edit($id){
        $compra = Compra::find($id);
       $productos = Producto::all();
       $usuarios = User::all();
        return view('compras.edit')->with('compra', $compra)->with('productos', $productos)->with('usuarios', $usuarios);
    }

    public function update(Request $request, $id){
        $request->validate([
            'id_producto'=>'required',
            'id_usuario'=>'required',
            'precio'=>'required',

        ]);
        try{
            $compra = Compra::find($id);
            $compra->id_producto = Producto::find($request->id_producto);
            $compra->id_usuario = Auth::id();
            $compra->precio = $request->precio;
            
            $compra->save();
            return redirect()->route('compras.index')->with('status', "Compra modificada correctamente");
        } catch (QueryException $e) {
            return redirect()->route('compras.index')->with('status', "No se ha podido modificar la compra");
        }        
    }

    public function destroy($id){
        try{
            $compra = Compra::find($id);
            $compra->delete();
            return redirect()->route('compra.index')->with('status', "Compra eliminada correctamente");
        } catch (QueryException $e) {
            return redirect()->route('compra.index')->with('status', "No se ha podido eliminar la compra");
        }
        
    }
}
