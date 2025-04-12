<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Campo;
use App\Models\Jugador;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservas = Reserva::with(['campo', 'jugador'])->get();
        return view('reservas.index', compact('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $campos = Campo::all();
        $jugadores = Jugador::all();
        return view('reservas.create', compact('campos', 'jugadores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'campo_id' => 'required|exists:campos,id',
            'jugador_id' => 'required|exists:jugadores,id',
            'fecha_reserva' => 'required|date|after_or_equal:today',
            'hora_inicio' => 'required',
            'duracion' => 'required|integer|min:30',
            'numero_jugadores' => 'required|integer|min:1|max:4',
        ]);

        Reserva::create($validated);

        return redirect()->route('reservas.index')
            ->with('success', 'Reserva creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reseerva $reseerva)
    {
        return view('reservas.show', compact('reserva'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reserva $reserva)
    {
        $campos = Campo::all();
        $jugadores = Jugador::all();
        return view('reservas.edit', compact('reserva', 'campos', 'jugadores')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reserva $reserva)
    {
        $validated = $request->validate([
            'campo_id' => 'required|exists:campos,id',
            'jugador_id' => 'required|exists:jugadores,id',
            'fecha_reserva' => 'required|date',
            'hora_inicio' => 'required',
            'duracion' => 'required|integer|min:30',
            'numero_jugadores' => 'required|integer|min:1|max:4',
        ]);

        $reserva->update($validated);

        return redirect()->route('reservas.index')
            ->with('success', 'Reserva actualizada exitosamente.'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reserva $reserva)
    {
        $reserva->delete();

        return redirect()->route('reservas.index')
            ->with('success', 'Reserva eliminada exitosamente.');
    }
}
