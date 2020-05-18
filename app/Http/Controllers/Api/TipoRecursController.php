<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tipo_Recurs;
use Illuminate\Http\Request;

use App\Http\Resources\TipoRecursResource;

class TipoRecursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposRecurs = Tipo_Recurs::with('recursos')->get();
        
        return new TipoRecursResource($tiposRecurs);
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
     * @param  \App\Models\Tipo_Recurs  $tipo_Recurs
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoRecurs = Tipo_Recurs::find($id)->with('recursos')->get();

        return new TipoRecursResource($tipoRecurs);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tipo_Recurs  $tipo_Recurs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipo_Recurs $tipo_Recurs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipo_Recurs  $tipo_Recurs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipo_Recurs $tipo_Recurs)
    {
        //
    }
}
