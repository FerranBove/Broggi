<?php

namespace App\Http\Controllers\Api;

use App\Models\Recurs;
use App\Clases\Utilitat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RecursResource;
use Illuminate\Database\QueryException;

class RecursController extends Controller
{
    public function index()
    {
       $recursos = Recurs::all();

        return new RecursResource($recursos);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($tipus_recurs_id)
    {
        $recurs = Recurs::where('tipus_recurs_id', $tipus_recurs_id)->get();

        return new RecursResource($recurs);
    }

    public function update(Request $request, Recurs $recurs)
    {
        //
    }

    public function destroy(Recurs $recurs)
    {
        //
    }
}