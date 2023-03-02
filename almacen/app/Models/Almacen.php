<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Almacen extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'almacen';
    protected $fillable = [
        'id',
        'fecha_alta',
        'fecha_baja',
        'nombre_producto',
        'descripcion_producto',
        'producto_id'
    ];

    public function own(){
        return $this->belongsTo(Producto::class);
    }
}
