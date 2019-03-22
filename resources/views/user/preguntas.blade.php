<!--Formulario para imprimir las preguntas dinamicamente-->

<form name="guardar_preguntas" method="POST" action="{{ route('preguntas.store') }}" id="formid">
	<input type="text" id="idExamen" name="idExamen" value="{{ $examen->id }}" hidden>
	{{ csrf_field() }}
	@forelse($preguntas as $pregunta)
	@php
		@$cont++
	@endphp
	<div class="container">
		<div class="card">
		  <div class="card-header primary" style="background-color: #4e73df">
		    <strong><pre style="color: #fff">{{ $cont }}.-{{ $pregunta->pregunta }}</pre></strong>
		  </div>
		  @if($pregunta->imagen != "")
		  	<div class="container">
		  		<img src="{{ asset('img/'.$pregunta->imagen) }}" width="300" height="200">
		  	</div>
		  @endif
		  <div class="card-body">
		    <div class="form-group form-check"><!---Cambien{{ $pregunta->id }}[] por {{ $pregunta->pregunta }}[] -->
	          <input value="1"  type="radio" class="form-check-input option-input radio" name="{{ $pregunta->pregunta }}[]" id="Check" checked>
		      <label class="form-check-label" for="exampleCheck1"><pre> a) {{ $pregunta->opcion1 }}</pre></label>
	        </div>
	        <div class="form-group form-check">
	          <input value="2" type="radio" class="form-check-input option-input radio" name="{{ $pregunta->pregunta }}[]" id="Check">
		      <label class="form-check-label" for="exampleCheck2"><pre> b) {{ $pregunta->opcion2 }}</pre></label>
	        </div>
	        <div class="form-group form-check">
	          <input value="3" type="radio" class="form-check-input option-input radio" name="{{ $pregunta->pregunta }}[]" id="Check">
		      <label class="form-check-label" for="exampleCheck3"><pre> c) {{ $pregunta->opcion3 }}</pre></label>
	        </div>
	        @if($pregunta->opcion4 != "")
		    <div class="form-group form-check">
	          <input value="4" type="radio" class="form-check-input option-input radio" name="{{ $pregunta->pregunta }}[]" id="Check">
		      <label class="form-check-label" for="exampleCheck4"><pre> d) {{ $pregunta->opcion4 }}</pre></label>
	        </div>
	        @endif
	        @if($pregunta->opcion5 != "")
	        <div class="form-group form-check">
	          <input value="5" type="radio" class="form-check-input option-input radio" name="{{ $pregunta->pregunta }}[]" id="Check">
		      <label class="form-check-label" for="exampleCheck5"><pre> e) {{ $pregunta->opcion5 }}</pre></label>
	        </div>
	        @endif
	        @if($pregunta->opcion6 != "")
	        <div class="form-group form-check">
	          <input value="6" type="radio" class="form-check-input option-input radio" name="{{ $pregunta->pregunta }}[]" id="Check">
		      <label class="form-check-label" for="exampleCheck6"><pre> f) {{ $pregunta->opcion6 }}</pre></label>
	        </div>
	        @endif
		  </div>
		</div><hr>
	</div>
	@empty
	<h3>No existen registros</h3>
	@endforelse
	<div class="container my-auto">
		<div class="text-center my-auto">
			<a type="submit" id="enviar" class="btn btn-primary" onclick="ver()"><strong style="color: #fff;">Finaizar examen <i class="fab fa-telegram-plane"></i></strong></a>
		</div>
	</div>
</form>


<!--<script type="text/javascript">
var message='Si presiona Aceptar Perdera lo todo lo que ha realizado.';
	function salir(e)
	{
		var message = "Si abandonas la página tus respuestas se guardarán en el estado actual ¿Quieres salir del axamen?";
		var evtobj=window.event? event : e;
		if(evtobj == e)
		{ 	
			if (!evtobj.clientY)
			{
				evtobj.returnValue = message;
				document.getElementById('formid').submit();
			}
		}else{
			if (evtobj.clientY < 0)
			{
				evtobj.returnValue = message;
			}
		}
	}
</script>


<script type="text/javascript">
	window.onbeforeunload = function (e) {
			var message = "You have not saved your changes.", e = e || window.event;
			if (e) {
				e.returnValue = message;
			}
			return message;
	}
	$("formid").submit(function() {
		submitted = true;
	});
</script>

<script type="text/javascript">
var message='Si presiona Aceptar Perdera lo todo lo que ha realizado.';
	function salir(e)
	{
		var evtobj=window.event? event : e;

		if(evtobj == e)
		{
			//firefox
			if (!evtobj.clientY)
			{
				alert(message)
				evtobj.returnValue = message;
			}
		}else{

			if (evtobj.clientY < 0)
			{
				alert(message)
				evtobj.returnValue = message;

			}
		}
	}
</script>-->

<!--<script type="text/javascript"> 	
//window.onbeforeunload = confirmacion;
function confirmacion(e) {
var pregunta = confirm("Salir de esta página?")
if (pregunta){
alert("Adios!")
window.location.href = "{{URL::to('home')}}"
}
else{
alert("Gracias por permanecer en la página!")
}
}
</script>
<input type="button" onclick=" confirmacion()" value="Salir de la página" />-->