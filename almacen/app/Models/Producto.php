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
        'foto',
        'fecha_caducidad',
        'user_id'
    ];

    public function compras(){
        return $this->belongsToMany(Compra::class, 'producto_id');
    }

    public function users(){
        return $this->hasMany(User::class);
    }
}
