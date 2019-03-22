@extends('layouts.app')

@section('botonNavExamenes')
{{ 'active' }}
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Registrar nuevo examen</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('examenesAdmin.store') }}">
              @csrf
              <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" id="nombre" name="nombre" placeholder="Nombre del examen" required>
                    <div class="valid-feedback">
                      @if ($errors->has('nombre'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('nombre') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="descripcion">Descripción</label>
                    <input type="text" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" id="descripcion" name="descripcion" placeholder="Este examen trata de..." required>
                    <div class="valid-feedback">
                      @if ($errors->has('descripcion'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('descripcion') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="no_preguntas">{{ __('Número de preguntas') }}</label>
                      <input type="text" class="form-control{{ $errors->has('no_preguntas') ? ' is-invalid' : '' }}" id="no_preguntas" name="no_preguntas" placeholder="Número total de preguntas" aria-describedby="inputGroupPrepend" required>
                      <div class="invalid-feedback">
                        @if ($errors->has('no_preguntas'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('no_preguntas') }}</strong>
                            </span>
                        @endif
                    </div>
                  </div>
              </div>
              <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="fecha">Fecha</label>
                    <input type="date" class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" id="fecha" name="fecha" required>
                    <div class="valid-feedback">
                      @if ($errors->has('fecha'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('fecha') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="tiempo">Tiempo</label>
                    <input type="time" class="form-control{{ $errors->has('tiempo') ? ' is-invalid' : '' }}" id="tiempo" name="tiempo" min="01:00" required>
                    <div class="valid-feedback">
                      @if ($errors->has('tiempo'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('tiempo') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="id_estado">{{ __('Estado') }}</label>
                      <select id="id_estado" name="id_estado" class="form-control">
                          <option selected disabled>Elija...</option>
                          @forelse($estado as $valor)
                          <option value="{{ $valor->id }}" >{{ $valor->descripcion }}</option> 
                          @empty
                          <option>No hay registros</option> 
                          @endforelse
                      </select>
                      <div class="invalid-feetback">
                          @if ($errors->has('id_estado'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('id_estado') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
              </div>
              <hr>
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
