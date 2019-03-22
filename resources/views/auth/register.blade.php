@extends('layouts.app')

@section('botonNavUsuarios')
{{ 'active' }}
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Registrar nuevo usuario</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" placeholder="Nombre" required>
                    <div class="valid-feedback">
                      @if ($errors->has('name'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control{{ $errors->has('apellidos') ? ' is-invalid' : '' }}" id="apellidos" name="apellidos" placeholder="Apellidos" required>
                    <div class="valid-feedback">
                      @if ($errors->has('apellidos'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('apellidos') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="usuario">{{ __('Usuario') }}</label>
                      <input type="text" class="form-control{{ $errors->has('usuario') ? ' is-invalid' : '' }}" id="usuario" name="usuario" placeholder="Nombre de usuario" aria-describedby="inputGroupPrepend" required>
                      <div class="invalid-feedback">
                        @if ($errors->has('usuario'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('usuario') }}</strong>
                            </span>
                        @endif
                    </div>
                  </div>
                </div>
              <div class="form-row">
                <div class="col-md-4">
                    <label for="email">{{ __('Correo electrónico') }}</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                        </div>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Ejemplo@gmail.com" value="{{ old('email') }}" required>
                        <div class="invalid-feetback">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-4">
                      <label for="password">{{ __('Contraseña') }}</label>
                      <input id="password" name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                      @if ($errors->has('password'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                  </div>
                  <div class="form-group col-md-4">
                      <label for="password-confirm">{{ __('Confirmar contraseña') }}</label>
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                  </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="telefono">Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono">
                    <div class="invalid-feetback">
                        @if ($errors->has('telefono'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('telefono') }}</strong>
                            </span>
                        @endif
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="celular">Celular</label>
                    <input type="text" class="form-control" id="celular" name="celular">
                    <div class="invalid-feetback">
                        @if ($errors->has('celular'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('celular') }}</strong>
                            </span>
                        @endif
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="genero">Genero</label>
                    <select id="genero" name="genero" class="form-control">
                      <option selected disabled>Elija...</option>
                      <option value="Hombre">Hombre</option>
                      <option value="Mujer">Mujer</option>
                    </select>
                  </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="fecha_nacimiento">Fecha de nacimiento</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
                    <div class="invalid-feetback">
                        @if ($errors->has('fecha_nacimiento'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
                            </span>
                        @endif
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="estado_civil">Estado civil</label>
                    <select id="estado_civil" name="estado_civil" class="form-control">
                      <option selected disabled>Elija...</option>
                      <option value="Soltero/a">Soltero/a</option>
                      <option value="Casado/a">Casado/a</option>
                      <option value="Comprometido/a">Comprometido/a</option>
                      <option value="Unión libre">Unión libre</option>
                      <option value="Separado/a">Separado/a</option>
                      <option value="Divorciado/a">Divorciado/a</option>
                      <option value="Viudo/a">Viudo/a</option>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                      <label for="id_tipoUsuario">{{ __('Tipo de usuario') }}</label>
                      <select id="id_tipoUsuario" name="id_tipoUsuario" class="form-control">
                          <option selected disabled>Elija...</option>
                          @forelse($tiposDusuarios as $valor)
                          @if($valor->id != 1)
                          <option value="{{ $valor->id }}" >{{ $valor->tipo_usuario }}</option> 
                          @endif
                          @empty
                          <option>No hay registros</option> 
                          @endforelse
                      </select>
                      <div class="invalid-feetback">
                          @if ($errors->has('id_tipoUsuario'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('id_tipoUsuario') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
              </div>
              <div class="form row">
                  <div class="form-group col-md-6">
                      <label for="estado">{{ __('Estado') }}</label>
                        <select id="estado" name="estado" class="form-control">
                            <option selected disabled>Elija...</option>
                            <option value="Aguascalientes">Aguascalientes</option>
                            <option value="Baja California">Baja California</option>
                            <option value="Baja California Sur">Baja California Sur</option>
                            <option value="Campeche">Campeche</option>
                            <option value="Coahuila de Zaragoza">Coahuila de Zaragoza</option>
                            <option value="Colima">Colima</option>
                            <option value="Chiapas">Chiapas</option>
                            <option value="Chihuahua">Chihuahua</option>
                            <option value="Distrito Federal">Distrito Federal</option>
                            <option value="Durango">Durango</option>
                            <option value="Guanajuato">Guanajuato</option>
                            <option value="Guerrero">Guerrero</option>
                            <option value="Hidalgo">Hidalgo</option>
                            <option value="Jalisco">Jalisco</option>
                            <option value="México">México</option>
                            <option value="Michoacán de Ocampo">Michoacán de Ocampo</option>
                            <option value="Morelos">Morelos</option>
                            <option value="Nayarit">Nayarit</option>
                            <option value="Nuevo León">Nuevo León</option>
                            <option value="Oaxaca">Oaxaca</option>
                            <option value="Puebla">Puebla</option>
                            <option value="Querétaro">Querétaro</option>
                            <option value="Quintana Roo">Quintana Roo</option>
                            <option value="San Luis Potosí">San Luis Potosí</option>
                            <option value="Sinaloa">Sinaloa</option>
                            <option value="Sonora">Sonora</option>
                            <option value="Tabasco">Tabasco</option>
                            <option value="Tamaulipas">Tamaulipas</option>
                            <option value="Tlaxcala">Tlaxcala</option>
                            <option value="Veracruz">Veracruz</option>
                            <option value="Yucatán">Yucatán</option>
                            <option value="Zacatecas">Zacatecas</option>
                        </select>
                        @if ($errors->has('estado'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('estado') }}</strong>
                            </span>
                        @endif
                    </div>
                  <div class="form-group col-md-6">
                      <label for="profesion">{{ __('Profesión') }}</label>
                      <select id="profesion" name="profesion" class="form-control">
                          <option selected>Elija...</option>
                          <option value="Analista de Sistemas">Analista de Sistemas</option>
                          <option value="Programación Web">Programación Web</option>
                          <option value="Analista en Computación">Analista en Computación</option>
                          <option value="Ciencias de la Computación">Ciencias de la Computación</option>
                          <option value="Ingeniería en Computación">Ingeniería en Computación</option>
                          <option value="Bioinformática">Bioinformática</option>
                          <option value="Geoinformática">Geoinformática</option>
                          <option value="Informática Aplicada a la Gráfica y Animación Digital">Informática Aplicada a la Gráfica y Animación Digital</option>
                          <option value="Ingeniería de Software">Ingeniería de Software</option>
                          <option value="Ingeniería en Desarrollo de Videojuegos y Realidad Virtual">Ingeniería en Desarrollo de Videojuegos y Realidad Virtual</option>
                          <option value="Ingeniería en Informática">Ingeniería en Informática</option>
                          <option value="Licenciatura en Informática">Licenciatura en Informática</option>
                          <option value="Licenciatura en Tecnologías de la Información">Licenciatura en Tecnologías de la Información</option>
                          <option value="Programación de Aplicaciones Móviles">Programación de Aplicaciones Móviles</option>
                          <option value="Programación de Videojuegos (o Simulaciones Virtuales)">Programación de Videojuegos (o Simulaciones Virtuales)</option>
                          <option value="Seguridad Informática">Seguridad Informática</option>
                          <option value="Tecnicatura en Programación">Tecnicatura en Programación</option>
                          <option value="Ingeniería de Sistemas">Ingeniería de Sistemas</option>
                          <option value="Licenciatura en Sistemas de Información">Licenciatura en Sistemas de Información</option>
                          <option value="Ingeniería en Tecnologías de la Información y Comunicación">Ingeniería en Tecnologías de la Información y Comunicación</option>
                          <option value="Otra">Otra</option>
                      </select>
                      <div class="invalid-feetback">
                          @if ($errors->has('carrera'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('carrera') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
              </div><hr>
              <div class="container float-right">
                <div class="text-center my-auto float-right">
                  <button type="submit" class="btn btn-primary">Registrar  <i class="fas fa-save"></i></button>
                </div>
              </div>
            </form>
        </div>
    </div>
</div>
@endsection
