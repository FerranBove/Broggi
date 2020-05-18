<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Alertant;
use Illuminate\Http\Request;

use App\Http\Resources\AlertantResource;
use App\Http\Resources\MunicipiResource;

class AlertantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alertants = Alertant::all();
        return AlertantResource::collection($alertants);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alertant = new Alertant();

        //$alertant->id = $request->input('id');
        $alertant->nom = $request->input('nom');
        $alertant->cognoms = $request->input('cognoms');
        $alertant->adreca = $request->input('adreca');
        $alertant->municipis_id = $request->input('municipis_id');
        $alertant->telefon = $request->input('telefon');
        $alertant->tipus_alertant_id = $request->input('tipus_alertant_id');

        try{
            $alertant->save();

            $respuesta = (new AlertantResource($alertant))->response()->setStatusCode(201);
        }
        catch (QueryException $e){

            $mensaje = Utilitat::errorMessage($e);

            $respuesta = response()->json(['error'=>$mensaje], 400);
        }

        return $respuesta;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alertant  $alertant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alertant = Alertant::where('id', $id)->with('municipis')->first();

        return new AlertantResource($alertant);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alertant  $alertant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alertant $alertant)
    {
        $alertant = Alertant::find($id);

        if($alertant==null){
            $respuesta = response()->json(['error'=>"registro no encontrado"], 404);
        }
        else{
            $alertant->id = $request->input('id');
            $alertant->nom = $request->input('nom');
            $alertant->cognoms = $request->input('cognoms');
            $alertant->adreca = $request->input('adreca');
            $alertant->municipis_id = $request->input('municipis_id');
            $alertant->telefon = $request->input('telefon');
            $alertant->tipus_alertant_id = $request->input('tipus_alertant_id');
            try{
                $alertant->save();

                $respuesta = (new AlertantResource($alertant))->response()->setStatusCode(201);
            }
            catch (QueryException $e){

                $mensaje = Utilitat::errorMessage($e);

                $respuesta = response()->json(['error'=>$mensaje], 400);
            }
        }
        return $respuesta;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alertant  $alertant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alertant $alertant)
    {
        $alertant = Alertant::find($id);

        if($alertant==null){
            $respuesta = response()->json(['error'=>"registro no encontrado"], 404);
        }
        else{
            try{
                $alertant->delete();
                $respuesta = (new AlertantResource($alertant))->response()->setStatusCode(200);
            }
            catch (QueryException $e){

                $mensaje = Utilitat::errorMessage($e);

                $respuesta = response()->json(['error'=>$mensaje], 400);
            }
        }

        return $respuesta;
    }
}
