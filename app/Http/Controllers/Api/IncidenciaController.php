<?php

namespace App\Http\Controllers\Api;

use DateTimeZone;
use Carbon\Carbon;
use App\Clases\Utilitat;

use App\Models\Incidencia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MunicipiResource;
use App\Http\Resources\IncidenciaResource;

class IncidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incidencies = Incidencia::with('municipis', 'alertants', 'incidencies_has_recurs')->get();
        
        return new IncidenciaResource($incidencies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /*$UTC = new DateTimeZone("UTC");
        $now = new DateTime();
        $mytime = Carbon::now();
        $mytime->setTimezone('UTC');*/
        $incidencia = new Incidencia();


        //$incidencia->id_incidencia = $request->input('id_incidencia');
        $incidencia->num_incidencia = $request->input('num_incidencia');
        $incidencia->telefon_alertant = $request->input('telefon_alertant');
        $incidencia->data = $request->input('data');
        $incidencia->hora = $request->input('hora');
        $incidencia->adreca = $request->input('adreca');
        $incidencia->complement_adreca = $request->input('complement_adreca');
        $incidencia->descripcio = $request->input('descripcio');
        $incidencia->municipis_id = $request->input('municipis_id');
        $incidencia->tipus_incident_id = $request->input('tipus_incident_id');
        $incidencia->estats_incidencia_id = 1;
        $incidencia->tipus_alertant_id = $request->input('tipus_alertant_id');
        $incidencia->alertants_id = $request->input('alertants_id');

        /*if ($request->input('incidencies_has_recurs') != null) {
            $recursos = $request->input('incidencies_has_recurs');
            foreach ($recursos as $recurs) {
                $incidencia->incidencies_has_recurs()->attach($recurs, ['prioritat' => 1, //$recurs['recursos_id']

                'hora_activacio' => $now, 
                'hora_mobilitzacio' => $now,
                'hora_assistencia' => $now,
                'hora_transport' => $now,
                'hora_arribada_hospital' => $now,
                'hora_transferencia' => $now,
                'hora_finalitzacio' => $now 
                
                ]);
                /*'hora_activacio' => $recurs['hora_activacio'], 
                'hora_mobilitzacio' => $recurs['hora_mobilitzacio'],
                'hora_assistencia' => $recurs['hora_assistencia'],
                'hora_transport' => $recurs['hora_transport'],
                'hora_arribada_hospital' => $recurs['hora_arribada_hospital'],
                'hora_transferencia' => $recurs['hora_transferencia'],
                'hora_finalitzacio' => $recurs['hora_finalitzacio'] ]); */
          /*  }
        }*/

        /*if ($request->input('afectats') != null) {
            $recursos = $request->input('afectats');
            foreach ($afectats as $afectat) {
                $incidencia->incidencies_has_afectats()->attach($incidencia['afectats_id']);
            }
        }

        if ($request->input('usuaris') != null) {
            $recursos = $request->input('usuaris');
            foreach ($usuaris as $usuari) {
                $incidencia->incidencies_has_usuaris()->attach($incidencia['usuaris_id']);
            }
        }*/



        try {
            $incidencia->save();
            $respuesta = (new IncidenciaResource($incidencia))->response()->setStatusCode(201);
        } catch (QueryException $e) {
            $error=Utilitat::errorMessage($e);
            $request->session()->flash('error', $error);
        }

        return $respuesta;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $incidencia = Incidencia::with('incidencies_has_recurs')->where("provincies_id", $id)->where('estats_incidencia_id', 1)->get();

        return new ComarcaResource($comarca);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $alertant = Alertant::find($id);

        if($alertant==null){
            $respuesta = response()->json(['error'=>"registro no encontrado"], 404);
        }
        /*else{
            $incidencia->num_incidencia = $request->input('num_incidencia');
            $incidencia->telefon_alertant = $request->input('telefon_alertant');
            $incidencia->data = $request->input('data');
            $incidencia->hora = $request->input('hora');
            $incidencia->adreca = $request->input('adreca');
            $incidencia->complement_adreca = $request->input('complement_adreca');
            $incidencia->descripcio = $request->input('descripcio');
            $incidencia->municipis_id = $request->input('municipis_id');
            $incidencia->tipus_incident_id = $request->input('tipus_incident_id');
            $incidencia->estats_incidencia_id = 1;
            $incidencia->tipus_alertant_id = $request->input('tipus_alertant_id');
            $incidencia->alertants_id = $request->input('alertants_id');

            if($request->input('incidencies_has_recurs') != null){
                $recursos = $request->input('incidencies_has_recurs');
                foreach ($recursos as $recurs){
                    $incidencia->incidencies_has_recurs()->attach($recurs['recursos_id'], ['prioritat' => $recurs['prioritat'], 
                    'hora_activacio' => $recurs['hora_activacio'], 
                    'hora_mobilitzacio' => $recurs['hora_mobilitzacio'],
                    'hora_asistencia' => $recurs['hora_asistencia'],
                    'hora_transport' => $recurs['hora_transport'],
                    'hora_arribada_hospital' => $recurs['hora_arribada_hospital'],
                    'hora_transferencia' => $recurs['hora_transferencia'],
                    'hora_finalitzacio' => $recurs['hora_finalitzacio'] ]); 
                }
            }
            try{
                $alertant->save();

                $respuesta = (new AlertantResource($alertant))->response()->setStatusCode(201);
            }
            catch (QueryException $e){

                $mensaje = Utilitat::errorMessage($e);

                $respuesta = response()->json(['error'=>$mensaje], 400);
            }
        }*/
        return $respuesta;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incidencia $incidencia)
    {
        try {
            $incidencia->destroy();
            $respuesta = (new IncidenciaResource($recursos))->response()->setStatusCode(200);
        }
        catch (QueryException $e)
        {
            $mensaje = Utilitats::errorMessage($e);
            $respuesta = response()->json(['error'=>$mensaje], 400);
        }

        return $respuesta;
        //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    }

    public function mostrarFormulari()
    {
        return \view('formulariIncidencia');
    }

    public function mostrarTaula()
    {
        return \view('taulaIncidents');
    }
}
