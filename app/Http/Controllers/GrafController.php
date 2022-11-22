<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\Graf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class GrafController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grafs = DB::select("CALL rel_ser()");
        return Inertia::render(
            'Modules/str/Graficos',
            [
                'grafs' => $grafs
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Graf  $graf
     * @return \Illuminate\Http\Response
     */
    public function show(Graf $graf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Graf  $graf
     * @return \Illuminate\Http\Response
     */
    public function edit(Graf $graf)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Graf  $graf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Graf $graf)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Graf  $graf
     * @return \Illuminate\Http\Response
     */
    public function destroy(Graf $graf)
    {
        //
    }
}
