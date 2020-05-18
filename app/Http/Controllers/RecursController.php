<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class RecursController extends Controller
{
    public function index()
    {
        return \view('recursos.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Recurs $recurs)
    {
        //
    }

    public function edit(Recurs $recurs)
    {
        //
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