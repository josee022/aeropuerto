<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    use HasFactory;

    public function aeropuertoOrigen () {
        return $this->belongsTo(Aeropuerto::class, 'origen_id');
    }

    public function aeropuertoDestino () {
        return $this->belongsTo(Aeropuerto::class, 'destino_id');
    }

    public function reservas() {
        return $this->hasMany(Reserva::class);
    }

    public function compania() {
        return $this->belongsTo(Compania::class);
    }
}
