<?php

namespace App\Http\Controllers;

use App\SalonSala;
use App\Horario;
use Illuminate\Http\Request;

class SalonSalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salones = SalonSala::with('horarios')->get();
        return view('admin.salon.index',compact('salones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.salon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:3|unique:salones_salas',
            'capacidad' => 'required|numeric',
        ]);

        $salon_sala = SalonSala::create([
            'nombre' => $request['nombre'],
            'capacidad' => $request['capacidad']
        ]);

        for ($h=0; $h < count($request["hora_inicio"]); $h++) { 
            $horario = Horario::make([
                'hora_inicio' => $request['hora_inicio'][$h],
                'hora_fin' => $request['hora_fin'][$h],
                'dia' => $request['dia'][$h],
                'salon_sala_id'  => $salon_sala->id,
            ]);

            $salon_sala->horarios()->save($horario);
        }
        $numero_horarios = count($salon_sala->horarios);

        return redirect()->route("salon.index")->with('msj',"Se ha registrado {$request['nombre']} con {$numero_horarios} horarios disponibles");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SalonSala  $salonSala
     * @return \Illuminate\Http\Response
     */
    public function show(SalonSala $salon)
    {
        return $salon;
        return view('admin.salon.show');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SalonSala  $salonSala
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalonSala $salonSala)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SalonSala  $salonSala
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalonSala $salonSala)
    {
        //
    }
}
