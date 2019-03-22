@extends('welcome')

@section('content')
<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="form-row">
        <div class="col-md-4 ">
            <label for="email" class="text-white">{{ __('Correo electrónico') }}</label>
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="col-md-4 ">
            <label for="password" class="text-white">{{ __('Contraseña') }}</label>
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="col-md-2 ">
            <button type="submit" class="btn btn-primary" style="margin-top: 38%">
                {{ __('Ingresar') }}
            </button>
        </div>
    </div>
</form>
@endsection
