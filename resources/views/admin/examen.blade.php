@extends('layouts.app')

@section('content')
<form action="{{ route('imgExamen.store') }}" enctype="multipart/form-data" method="post">
	@csrf
	<div class="container">
		<div class="custom-file">
		  <input type="file" accept="image/*" class="custom-file-input" id="cargarImg" name="cargarImg">
		  <label class="custom-file-label">Selecciona una imagen</label>
		</div>
		<input type="submit" value="Guardar" class="btn btn-primary">
	</div>
</form>
@foreach($imagenes as $imagen)
	<div class="container">
		<img src="{{ asset('img/'.$imagen->imagen) }}" width="300" height="200">
	</div>
@endforeach

@endsection