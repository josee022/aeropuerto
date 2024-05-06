<?php

namespace App\Http\Controllers;

use App\Models\Aeropuerto;
use App\Models\Compania;
use App\Models\Vuelo;
use Illuminate\Http\Request;

class VueloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('vuelos.index', [
            'vuelos' => Vuelo::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vuelos.create', [
            'aeropuertos' => Aeropuerto::all(),
            'companias' => Compania::all(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'origen_id' => 'required|exists:aeropuertos,id',
            'destino_id' => 'required|exists:aeropuertos,id',
            'compania_id' => 'required|exists:companias,id',
            'plazas' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:1',
            'codigo_vuelo' => 'required|unique:vuelos,codigo_vuelo|regex:/^[A-Za-z]{2}\d{4}$/',
            'salida' => 'required|date',
            'llegada' => 'required|date',
        ]);

        $vuelo = new Vuelo();
        $vuelo->origen_id = $validated['origen_id'];
        $vuelo->destino_id = $validated['destino_id'];
        $vuelo->compania_id = $validated['compania_id'];
        $vuelo->plazas = $validated['plazas'];
        $vuelo->precio = $validated['precio'];
        $vuelo->codigo_vuelo = $validated['codigo_vuelo'];
        $vuelo->salida = $validated['salida'];
        $vuelo->llegada = $validated['llegada'];
        $vuelo->save();
        session()->flash('success', 'El vuelo se ha creado correctamente.');
        return redirect()->route('vuelos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vuelo $vuelo)
    {
        return view('vuelos.show', [
            'vuelo' => $vuelo,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vuelo $vuelo)
    {
        return view('vuelos.edit', [
            'vuelo' => $vuelo,
            'aeropuertos' => Aeropuerto::all(),
            'companias' => Compania::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vuelo $vuelo)
    {
        $validated = $request->validate([
            'origen_id' => 'required|exists:aeropuertos,id',
            'destino_id' => 'required|exists:aeropuertos,id',
            'compania_id' => 'required|exists:companias,id',
            'plazas' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:1',
            'salida' => 'required|date',
            'llegada' => 'required|date|after:salida',
        ]);

        $vuelo->origen_id = $validated['origen_id'];
        $vuelo->destino_id = $validated['destino_id'];
        $vuelo->compania_id = $validated['compania_id'];
        $vuelo->plazas = $validated['plazas'];
        $vuelo->precio = $validated['precio'];
        $vuelo->salida = $validated['salida'];
        $vuelo->llegada = $validated['llegada'];
        $vuelo->save();

        session()->flash('success', 'El vuelo se ha actualizado correctamente.');
        return redirect()->route('vuelos.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vuelo $vuelo)
    {
        $vuelo->delete();
        session()->flash('success', 'El vuelo se ha eliminado correctamente.');
        return redirect()->route('vuelos.index');
    }
}
