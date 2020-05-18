@extends('templates.main')

@section('titulo')
HOME
@endsection

@section('menu')

{{-- lo que s'afegeix a la navBar quan et registres --}}
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

<div class="container">

    @include('partial.errores')
    <div class="card mt-2" style="background-color: #FFC4C2;">
        <div class=" card-body">
        <a href="" class="btn btn-secondary" style="background-color: #8C031C;">AFEGIR INCIDÈNCIA</a>
        </div>
    </div>

    <div class="card mt-2" style="background-color: #FFC4C2;">
        <div class="card-header text-white" style="background-color: #8C031C;">
            Llista incidències
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>TELÈFON</th>
                    <th>ADREÇA</th>
                    <th>INCIDÈNT</th>
                    <th>ALERTANT</th>
                    <th>DESCRIPCIÓ</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($ as $) --}}
                    <tr>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td>
                            <form action=" " method="GET">
                                <button type="submit" class="btn btn-primary btn-sm">EDITAR</button>
                            </form>
                        </td>
                        <td>
                            <form action=" " method="POST">
                               @method('delete')
                               @csrf
                                <button type="submit" class="btn btn-danger btn-sm">ELIMINAR</button>
                            </form>
                        </td>
                    </tr>
                {{-- @endforeach --}}
            </tbody>
        </table>
    </div>
</div>

@endsection
