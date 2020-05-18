@extends('templates.main')

@section('titulo')

@endsection

@section('principal')
    {{-- include del form de errores para que se pueda mostrar la alerta --}}
    {{-- @include('partial.errores'); --}}

<div class="container">
	<div class="row">
        <div class="mt-5 mr-auto ml-auto col-6">
    		<div class="" id="loginModal">
              <div class="modal-body">
                <div class="card border border-danger" style="background-color: #FFC4C2;">
                  <ul class="nav nav-tabs border-bottom border-danger"  role="tablist">
                    <li class="active nav-item border-right border-danger">
                        <a class="nav-link text-dark font-weight-bold"href="#login" data-toggle="tab">LOGIN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark font-weight-bold" href="#create" data-toggle="tab" >REGISTRAR-SE</a>
                    </li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active" id="login">
                      <form class="form-horizontal" action="{{action('Auth\LoginController@login')}}" method="POST">
                        @csrf

                        <fieldset class="ml-2 mb-2">

                            <!-- Nom -->
                          <div class="control-group" >
                            <label class="control-label" for="">Nom</label>
                            <div class="controls">
                              <input type="text" id="nom" name="nom" class="input-xlarge" value="{{ old('nom')}}" autofocus>
                            </div>
                          </div>

                            <!-- Contrasenya-->
                          <div class="control-group">
                            <label class="control-label" for="">Contrasenya</label>
                            <div class="controls">
                              <input type="password" id="contrasenya" name="contrasenya" class="input-xlarge" value="{{ old('contrasenya')}}">
                            </div>
                          </div>

                            <!-- Button -->
                          <div class="control-group">
                            <div class="controls mt-2">
                              <button type="submit" class="btn btn-success">Login</button>
                            </div>
                          </div>
                        </fieldset>
                      </form>
                    </div>
                    <div class="tab-pane fade " id="create">
                      <form id="tab" class="ml-2 mb-3">
                          <!-- Codi -->
                            <label class="control-label" for="codi">Codi</label>
                            <div class="controls">
                              <input type="text" id="codi" name="codi" class="input-xlarge">
                            </div>
                            <!-- Nom -->
                            <label class="control-label" for="nom">Nom</label>
                            <div class="controls">
                              <input type="text" id="nomRegistre" name="nom" class="input-xlarge">
                            </div>
                            <!-- Contrasenya -->
                            <label class="control-label" for="contrasenya">Contrasenya</label>
                            <div class="controls">
                              <input type="text" id="contrasenyaRegistre" name="contrasenya" class="input-xlarge">
                            </div>
                            <!-- Rols -->
                            <label class="control-label" for="rols">Rols</label>
                            <div class="controls">
                              <input type="text" id="rols" name="rols" class="input-xlarge">
                            </div>
                        <div>
                          <button type="submit" class="btn btn-primary mt-3">Registrar-se</button>
                        </div>
                      </form>
                    </div>
                </div>
              </div>
            </div>
        </div>
	</div>
</div>
@endsection
