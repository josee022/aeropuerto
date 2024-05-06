<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\User;
use App\Models\Vuelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $reservas = $user->reservas()->orderBy('id')->paginate(5);

        return view('reservas.index', [
            'reservas' => $reservas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reservas.create', [
            'usuarios' => User::all(),
            'vuelos' => Vuelo::all(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'vuelo_id' => 'required|exists:vuelos,id',
            'plazas' => 'nullable|integer|min:1',
        ]);

        $plazas = $request->input('plazas', 1);
        $vuelo = Vuelo::find($validated['vuelo_id']);

        if ($vuelo->plazas >= $plazas) {
            for ($i = 0; $i < $plazas; $i++) {
                $reserva = new Reserva();
                $reserva->user_id = $validated['user_id'];
                $reserva->vuelo_id = $validated['vuelo_id'];
                $reserva->save();
            }
            session()->flash('success', 'Las reservas se han creado correctamente.');
        } else {
            session()->flash('error', 'No hay suficientes plazas disponibles para el vuelo seleccionado.');
        }

        return redirect()->route('reservas.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Reserva $reserva)
    {
        return view('reservas.show', [
            'reserva' => $reserva,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reserva $reserva)
    {
        return view('reservas.edit', [
            'reserva' => $reserva,
            'usuarios' => User::all(),
            'vuelos' => Vuelo::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reserva $reserva)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'vuelo_id' => 'required|exists:vuelos,id',
        ]);

        $reserva->user_id = $validated['user_id'];
        $reserva->vuelo_id = $validated['vuelo_id'];
        $reserva->save();
        session()->flash('success', 'La reserva se ha editado correctamente.');
        return redirect()->route('reservas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reserva $reserva)
    {
        $reserva->delete();
        session()->flash('success', 'La reserva se ha eliminado correctamente.');
        return redirect()->route('reservas.index');
    }
}
