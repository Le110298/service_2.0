<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\Coor_serv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CoorServController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
        $coor_servs = DB::select("CALL rel_ser()");
        //return  $coor_serv;
      //$coor_servs = Coor_serv::all();
        return Inertia::render(
            'Coor_servs/Index',
            [
                'coor_servs' => $coor_servs
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
            'Coor_servs/Create'
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
            'serv_id' => 'required',
            'empl_id' => 'required',
            'val_asig' => 'required'
    ]);
    Coor_serv::create([
        'serv_id' => $request->serv_id,
        'empl_id' => $request->empl_id,
        'val_asig' => $request->val_asig
       
    ]);
    sleep(1);
     return redirect()->route('coor_servs.index')->with('message','Servicio Asignado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coor_serv  $coor_serv
     * @return \Illuminate\Http\Response
     */
    public function show(Coor_serv $coor_serv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coor_serv  $coor_serv
     * @return \Illuminate\Http\Response
     */
    public function edit(Coor_serv $coor_serv)
    {
        return Inertia::render(
            'Coor_servs/Edit',
            [
                'coor_serv' => $coor_serv
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coor_serv  $coor_serv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coor_serv $coor_serv)
    {
        $request->validate([
            'serv_id' => 'required',
            'empl_id' => 'required',
            'val_asig' => 'required'
        ]);
        $coor_serv->serv_id = $request->serv_id;
        $coor_serv->empl_id = $request->empl_id;
        $coor_serv-> val_asig = $request->val_asig;
        $coor_serv->save();
        sleep(1);
        return redirect()->route('coor_servs.index')->with('message','Servicio Reasignado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coor_serv  $coor_serv
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coor_serv $coor_serv)
    {
        $coor_serv->delete();
 
        return redirect()->route('coor_servs.index')->with('message','Asignacion de servicio eliminada');
        sleep(1);
    }
}
