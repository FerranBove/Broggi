<?php

namespace App\Http\Controllers;

use App\Models\Alertant;
use Illuminate\Http\Request;

class AlertantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Alertant  $alertant
     * @return \Illuminate\Http\Response
     */
    public function show(Alertant $alertant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alertant  $alertant
     * @return \Illuminate\Http\Response
     */
    public function edit(Alertant $alertant)
    {
        //
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
        $alertant->id = $alertant->id;
        $alertant->nom = $request->input('nom');
        $alertant->cognoms = $request->input('cognoms');
        $alertant->adreca = $request->input('adreca');
        $alertant->municipis_id = $request->input('municipi');
        $alertant->telefon = $request->input('telef');
        $alertant->tipus_alertant_id = $request->input('tipusAlertant');


        try{
            $alertant->save();
        }
        catch(QueryException $e){
            $error=Utilitat::errorMessage($e);
            $request->session()->flash('error', $error);
            return redirect()->action('AlertantController@edit')->withInput();
        }

        return redirect()->action('AlertantController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alertant  $alertant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alertant $alertant)
    {
        //
    }
}
