<?php

namespace App\Http\Controllers;

use App\Models\Campo;
use Illuminate\Http\Request;

class CampoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campos = Campo::all();
        return view('campos.index', compact('campos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('campos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'numero_hoyos' => 'required|integer|min:1',
            'tipo' => 'required|in:público,privado',
            'tarifa' => 'required|numeric|min:0',
        ]);

        Campo::create($validated);

        return redirect()->route('campos.index')
            ->with('success', 'Campo de golf creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Campo $campo)
    {
        return view('campos.show', compact('campo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Campo $campo)
    {
        return view('campos.edit', compact('campo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Campo $campo)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'numero_hoyos' => 'required|integer|min:1',
            'tipo' => 'required|in:público,privado',
            'tarifa' => 'required|numeric|min:0',
        ]);

        $campo->update($validated);

        return redirect()->route('campos.index')
            ->with('success', 'Campo de golf actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Campo $campo)
    {
        $campo->delete();

        return redirect()->route('campos.index')
            ->with('success', 'Campo de golf eliminado exitosamente.');
    }
}
