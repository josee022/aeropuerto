<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aeropuerto extends Model
{
    use HasFactory;

    public function vuelosOrigen () {
        return $this->hasMany(Vuelo::class, 'origen_id');
    }

    public function vuelosDestino () {
        return $this->hasMany(Vuelo::class, 'destino_id');
    }
}
