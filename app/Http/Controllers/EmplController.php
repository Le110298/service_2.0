<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\Empl;
use Illuminate\Http\Request;

class EmplController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empls = Empl::all();
        return Inertia::render(
            'Empls/Index',
            [
                'empls' => $empls
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
        return Inertia::render(
            'Empls/Create'
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
            'nombre' => 'required',
            'tel' => 'required'
        ]);
        Empl::create([
            'nombre' => $request->nombre,
            'tel' => $request->tel
        ]);
        sleep(1);
         return redirect()->route('empls.index')->with('message','Empleado Agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empl  $empl
     * @return \Illuminate\Http\Response
     */
    public function show(Empl $empl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empl  $empl
     * @return \Illuminate\Http\Response
     */
    public function edit(Empl $empl)
    {
        return Inertia::render(
            'Empls/Edit',
            [
                'empl' => $empl
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empl  $empl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empl $empl)
    {
        $request->validate([
            'nombre' => 'required',
            'tel' => 'required'
        ]);
        $empl->nombre = $request->nombre;
        $empl->tel = $request->tel;
        $empl->save();
        sleep(1);
        return redirect()->route('empls.index')->with('message','Empleado Actualizado');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empl  $empl
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empl $empl)
    {
      $empl->delete();
 
      return redirect()->route('empls.index')->with('message','Empleado eliminado');
      sleep(1);
    }
}
