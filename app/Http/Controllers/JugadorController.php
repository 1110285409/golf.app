<?php

namespace App\Http\Controllers;

use App\Models\Jugador;
use Illuminate\Http\Request;

class JugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jugadores = Jugador::all();
        return view('jugadores.index', compact('jugadores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jugadores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email|unique:jugadores,email',
            'direccion' => 'required|string|max:255',
            'handicap' => 'nullable|numeric|min:0',
        ]);

        Jugador::create($validated);

        return redirect()->route('jugadores.index')
            ->with('success', 'Jugador creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jugador $jugador)
    {
        $reservas = $jugador->reservas;
        return view('jugadores.show', compact('jugador', 'reservas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jugador $jugador)
    {
        return view('jugadores.edit', compact('jugador'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jugador $jugador)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email|unique:jugadores,email,' . $jugador->id,
            'direccion' => 'required|string|max:255',
            'handicap' => 'nullable|numeric|min:0',
        ]);

        $jugador->update($validated);

        return redirect()->route('jugadores.index')
            ->with('success', 'Jugador actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jugador $jugador)
    {
        $jugador->delete();

        return redirect()->route('jugadores.index')
            ->with('success', 'Jugador eliminado exitosamente.');
    }
}
