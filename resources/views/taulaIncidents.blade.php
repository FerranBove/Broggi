@extends('templates.main')
    <link rel="stylesheet" href=" {{ asset('css/app.css') }} " >
    <script src="{{ asset('js/app.js') }} "></script>
    <link rel="stylesheet" href="{{ asset ('css/myCSS.css')}}">

@section('titulo')
    
    Taula incidències
    
@endsection

@section('menu')

    <li class="nav-item ">
        <a class="nav-link" href="{{ route('recursos')}}"> RECURSOS </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href=""> ALERTANTS </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href=""> LLISTA ALERTES </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="http://localhost:8080/projecte/broggi-projecte/public/taulaIncidencia"> VIDEOS </a>
    </li>
@endsection

@section('principal')



<taula-incidents></taula-incidents>



@endsection