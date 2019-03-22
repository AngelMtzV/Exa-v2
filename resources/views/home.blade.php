@extends('layouts.app')

@section('botonNavUsuarios')
{{ 'active' }}
@endsection

@section('content')
      <div id="app">
          <main>
              @if(auth()->user()->id_tipoUsuario == 1)
                @include('admin.inicioAdmin')
              @else
                @include('user.inicio')
              @endif
          </main>
      </div>
    </div>
    <!-- End of Main Content -->
@endsection
