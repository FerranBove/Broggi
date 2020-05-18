<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tipo_alertant;
use Illuminate\Http\Request;

use App\Http\Resources\TipoAlertantResource;

class TipoAlertantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipusAlertants = Tipo_alertant::with('alertants')->get();

        return TipoAlertantResource::collection($tipusAlertants);
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
     * @param  \App\Models\Tipo_alertant  $tipo_alertant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoAlertant = Tipo_alertant::find($id)::with('alertants')->get();

        return new TipoAlertantResource($tipoAlertant);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tipo_alertant  $tipo_alertant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipo_alertant $tipo_alertant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipo_alertant  $tipo_alertant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipo_alertant $tipo_alertant)
    {
        //
    }
}
