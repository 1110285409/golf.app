<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
   
    
    protected $fillable = [
        'campo_id',
        'jugador_id',
        'fecha_reserva',
        'hora_inicio',
        'duracion',
        'numero_jugadores',
    ];
    
    protected $casts = [
        'fecha_reserva' => 'date',
        'hora_inicio' => 'datetime',
    ];
    
    public function campo()
    {
        return $this->belongsTo(Campo::class);
    }
    
    public function jugador()
    {
        return $this->belongsTo(Jugador::class);
    }
}
