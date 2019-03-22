  <!--@forelse($consulta as $pregunta)
  @php
    @$contador++
  @endphp
  <div class="container">
    <div class="card">
      @if($pregunta->res_User == $pregunta->res_pregunta)
        <div class="card-header success" style="background-color: #454dbe">
          <strong><pre style="color: #fff">{{ $contador }}.-{{ $pregunta->pregunta }}</pre></strong>
        </div>
      @else
        <div class="card-header danger" style="background-color: #D30303">
          <strong><pre style="color: #fff">{{ $contador }}.-{{ $pregunta->pregunta }}</pre></strong>
        </div>
      @endif
        @if($pregunta->imagen != "")
          <div class="container">
            <img src="{{ asset('img/'.$pregunta->imagen) }}" width="300" height="200">
          </div>
        @endif
        <div class="card-body">
          <div class="form-group form-check">
            <div class="alert alert-info" role="alert">
              <pre> a) {{ $pregunta->opcion1 }}</pre>
              <pre> b) {{ $pregunta->opcion2 }}</pre>
              <pre> c) {{ $pregunta->opcion3 }}</pre>
          @if($pregunta->opcion4 != "")
              <pre> d) {{ $pregunta->opcion4 }}</pre>
          @endif
          @if($pregunta->opcion5 != "")
              <pre> e) {{ $pregunta->opcion5 }}</pre>
          @endif
          @if($pregunta->opcion6 != "")
              <pre> f) {{ $pregunta->opcion6 }}</pre>
          @endif
            </div>
        </div>
      </div>
    </div><hr>
  </div>
  @empty
  <h3>No existen registros</h3>
  @endforelse-->