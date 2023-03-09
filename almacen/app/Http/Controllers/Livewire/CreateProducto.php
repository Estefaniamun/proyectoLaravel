<?php

namespace App\Http\Livewire;

use App\Models\Car;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateCar extends Component
{
    use WithFileUploads;
    
    public $nombre, $descripcion, $foto, $fecha_caduciad;

    public $mostrar = false;
    public function render()
    {
        return view('livewire.create-producto');
    }

    public function valorForm(){
        if($this->mostrar == true){
            $this->mostrar=false;
        }else{
            $this->mostrar=true;
        }
    }

    public function guardar(){
        $nombrefoto = time() . "-" . $this->foto->getClientOriginalName();
        $this->foto->storeAs('public/img_productos', $nombrefoto);
        Producto::create([
            'nombre'=>$this->nombre,
            'descripcion'=>$this->descripcion,
            'foto'=>$nombrefoto,
            'fecha_caducidad'=>$this->fecha_caduciad,
            'user_id'=>Auth::user()->id,
            
        ]);

    }
}