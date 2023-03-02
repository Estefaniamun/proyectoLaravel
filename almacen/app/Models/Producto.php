<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'fecha_caducidad',
        'user_id'
    ];

    public function own(){
        return $this->belongsTo(User::class);
    }

    public function almacen(){
        return $this->hasMany(Almacen::class);
    }
}
