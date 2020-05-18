@extends('templates.main')

@section('titulo')
    <link rel="stylesheet" href=" {{ asset('css/app.css') }} " >
    <script src="{{ asset('js/app.js') }} "></script>
    Nova Incidència
    
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
@endsection

@section('principal')

<taula-general></taula-general>


@endsection
