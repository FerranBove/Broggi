<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comarca;
use Illuminate\Http\Request;

use App\Http\Resources\ComarcaResource;

class ComarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comarques = Comarca::with('municipis')->get();
        
        return new ComarcaResource($comarques);
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
     * @param  \App\Models\Comarca  $comarca
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comarca = Comarca::where("provincies_id", $id)->with('municipis')->get();

        return new ComarcaResource($comarca);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comarca  $comarca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comarca $comarca)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comarca  $comarca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comarca $comarca)
    {
        //
    }
}
