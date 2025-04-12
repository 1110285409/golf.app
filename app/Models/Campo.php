<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campo extends Model
{
    
    
    protected $fillable = [
        'nombre',
        'ubicacion',
        'numero_hoyos',
        'tipo',
        'tarifa',
    ];
    
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
