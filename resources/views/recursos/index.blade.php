@extends('templates.main')

@section('titulo')
RECURSOS
@endsection

@section('menu')

{{-- lo que s'afegeix a la navBar quan et registres --}}
    <li class="nav-item ">
        <a class="nav-link" href="{{ route('recursos')}}"> RECURSOS </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="http://localhost:80/proyecto/broggi-projecte/public/taulaIncidencia"> ALERTANTS </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="http://localhost:80/proyecto/broggi-projecte/public/taulaIncidencia"> LLISTA INCIDÈNCIES </a>
    </li>
@endsection

@section('principal')

<recurs-component></recurs-component>
@endsection
