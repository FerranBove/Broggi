<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tipo_Incident;
use Illuminate\Http\Request;

use App\Http\Resources\TipoIncidentResource;

class TipoIncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipusIncidents = Tipo_Incident::all();
        
        return new TipoIncidentResource($tipusIncidents);
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
     * @param  \App\Models\Tipo_Incident  $tipo_Incident
     * @return \Illuminate\Http\Response
     */
    public function show(Tipo_Incident $tipo_Incident)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tipo_Incident  $tipo_Incident
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipo_Incident $tipo_Incident)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipo_Incident  $tipo_Incident
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipo_Incident $tipo_Incident)
    {
        //
    }
}
