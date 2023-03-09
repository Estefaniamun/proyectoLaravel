<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    public function index(){
        $productos = Producto::all();
        return view('productos.index')->with('productos', $productos);
    }


    public function create(){
        return view('productos.create');
    } 
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'foto' => 'required|image',
            'fecha_caducidad'=>'required'
        ]);

        try {
            $producto = new Producto();
            $producto->nombre = $request->nombre;
            $producto->descripcion = $request->descripcion;
            $producto->fecha_caducidad = $request->fecha_caducidad;
            $producto->user_id = Auth::id();
            $nombrefoto = time() . "-" . $request->file('foto')->getClientOriginalName();
            $producto->foto = $nombrefoto;
            $producto->save();
            $request->file('foto')->storeAs('public/img_productos', $nombrefoto);
            return redirect()->route('producto.index')->with('status', "Producto creado correctamente");
        } catch (QueryException $e) {
            return redirect()->route('producto.index')->with('status', "No se ha podido crear el producto");
        }
    }

    public function show($id){
        $producto = Producto::find($id);
        $url = 'storage/img_productos/';
        return view('producto.show')->with('producto', $producto)->with('url', $url);
    }
    public function edit($id){
        $producto = Producto::find($id);
        $url = 'storage/img_productos';
        return view('productos.edit')->with('producto', $producto)->with('url', $url);
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre'=>'required',
            'descripcion'=>'required',
            'foto' => 'required|image',
            'fecha_caducidad'=>'required',

        ]);
        try{
            $producto = Producto::find($id);
            $producto->nombre = $request->nombre;
            $producto->descripcion = $request->descripcion;
            $producto->fecha_caducidad = $request->fecha_caducidad;
            $producto->user_id = Auth::id();
            if (is_uploaded_file($request->foto)) {
                $nombrefoto = time() . "-" . $request->file('foto')->getClientOriginalName();
                $producto->foto = $nombrefoto;
                $request->file('foto')->storeAs('public/img_productos', $nombrefoto);
            }
            $producto->save();
            return redirect()->route('producto.index')->with('status', "Producto modificado correctamente");
        } catch (QueryException $e) {
            return redirect()->route('producto.index')->with('status', "No se ha podido modificar el producto");
        }        
    }

    public function destroy($id){
        try{
            $producto = Producto::find($id);
            $producto->delete();
            return redirect()->route('producto.index')->with('status', "Producto eliminado correctamente");
        } catch (QueryException $e) {
            return redirect()->route('producto.index')->with('status', "No se ha podido eliminado el producto");
        }
        
    }
}
