<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compra extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'id',
        'id_producto',
        'id_usuario',
        'precio',
    ];

    


    public function producto(){
        return $this->hasMany(Producto::class);
    }

    public function user(){
        return $this->hasMany(User::class);
    }
}
