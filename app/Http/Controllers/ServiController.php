<?php

namespace App\Http\Controllers;

use App\Models\Empre;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use App\Models\Servi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ServiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servis = DB::select("CALL serv()");
       return Inertia::render(
           'Servis/Index',
           [
               'servis' => $servis
            ]
        );
    }
 
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empres= Empre::all();
        return Inertia::render(
            'Servis/Create',
            [
            'empres'=>$empres
            ]
        );
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
            'Nombre_Servicio' => 'required',
            'empresID' => 'required',
            'Fecha' => 'required',
            'Hora' => 'required',
            'Ubicacion' => 'required',
            'Encargado' => 'required',
            'Cantida_Meseros' => 'required',
            'Precio' => 'required'
        ]);
        Servi::create([
            'Nombre_Servicio' => $request->Nombre_Servicio,
            'empresID' => $request->empresID,
            'Fecha' => $request->Fecha,
            'Hora' => $request->Hora,
            'Ubicacion' => $request->Ubicacion,
            'Encargado' => $request->Encargado,
            'Cantida_Meseros' => $request->Cantida_Meseros,
            'Precio' => $request->Precio,
            'Observaciones' => $request->Observaciones
        ]);
        sleep(1);
         return redirect()->route('servis.index')->with('message','Servicio Agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servi  $servi
     * @return \Illuminate\Http\Response
     */
    public function show(Servi $servi)
    {
  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servi  $servi
     * @return \Illuminate\Http\Response
     */
    public function edit(Servi $servi)
    {
        $empres= Empre::all();
        return Inertia::render(
            'Servis/Edit',
            [
                'servi' => $servi,
                'empres'=>$empres
                
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servi  $servi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servi $servi)
    {
        $request->validate([
            'Nombre_Servicio' => 'required',
            'empresID' => 'required',
            'Fecha' => 'required',
            'Hora' => 'required',
            'Ubicacion' => 'required',
            'Encargado' => 'required',
            'Cantida_Meseros' => 'required',
            'Precio' => 'required',
           
        ]);
        $servi->Nombre_Servicio = $request->Nombre_Servicio;
        $servi->empresID = $request->empresID;
        $servi->Fecha = $request->Fecha;
        $servi->Hora = $request->Hora;
        $servi->Ubicacion = $request->Ubicacion;
        $servi->Encargado = $request->Encargado;
        $servi->Cantida_Meseros = $request->Cantida_Meseros;
        $servi->Precio = $request->Precio;
        $servi->Observaciones = $request->Observaciones;
        $servi->save();
        sleep(1);
        return redirect()->route('servis.index')->with('message','Servicio Actualizado');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servi  $servi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servi $servi)
    {
        $servi->delete();
 
        return redirect()->route('servis.index')->with('message','Servicio eliminado');
        sleep(1);
    }
}
