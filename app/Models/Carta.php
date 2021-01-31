<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carta extends Model
{
    use HasFactory;

    public function indice(){
    	return $this->hasMany(IndiceColeccion::class);
    }

    public function venta(){
    	return $this->hasMany(Venta::class);
    }
}
