<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\Empre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class EmpreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  
        $empres = Empre::all();
      return Inertia::render(
         'Empres/Index',
            [
                'empres' => $empres
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
            'Empres/Create'
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
            'Nombre_emp' => 'required',
        ]);
        Empre::create([
            'Nombre_emp' => $request->Nombre_emp,
            'dir_emp' => $request->dir_emp,
            'direc_emp' => $request->direc_emp,
            'rfc' => $request->rfc,
            'tel' => $request->tel
        ]);
        sleep(1);
         return redirect()->route('empres.index')->with('message','Empresa Agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empre  $empre
     * @return \Illuminate\Http\Response
     */
    public function show(Empre $empre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empre  $empre
     * @return \Illuminate\Http\Response
     */
    public function edit(Empre $empre)
    {
        return Inertia::render(
            'Empres/Edit',
            [
                'empre' => $empre
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empre  $empre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empre $empre)
    {
        $request->validate([
            'Nombre_emp' => 'required',
        ]);
        $empre->Nombre_emp = $request->Nombre_emp;
        $empre->dir_emp = $request->dir_emp;
        $empre-> direc_emp = $request->direc_emp;
        $empre-> rfc = $request->rfc;
        $empre->tel = $request->tel;
        $empre->save();
        sleep(1);
        return redirect()->route('empres.index')->with('message','Empresa Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empre  $empre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empre $empre)
    {
        $empre->delete();
 
        return redirect()->route('empres.index')->with('message','Empresa eliminada');
        sleep(1);
    }
}
