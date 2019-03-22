<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{ asset('imagenes/logocbtm.ico') }}">
        <title>Consulting & B-T</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        
        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/login.css') }}" rel="stylesheet" type="text/css">

    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark " style="background: #0b385d;">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="{{ route('home')}}"><img src="{{ asset('imagenes/logo.png') }}"></a>
        <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                @yield('content')
            </ul>
      </div>
    </nav><br>
    
    <div id="app">
        <main>
            <!--<div style="position: relative; left: 10%; top: 50 %;">
                <img src="{{asset('imagenes/10.gif')}}" class='eye'/>
                <img src="{{asset('imagenes/lap.png')}}" class="heaven"/>
            </div>-->
            <div class="container" style="margin-top: 11%; margin-left: 10%;">                
                <img src="{{asset('imagenes/lap.png')}}" class="img" />
                <img src="{{asset('imagenes/10.gif')}}" class="img2" />
            </div>
        </main>
    </div>

    <!--Scripts de bootstrap-ajax y jquery-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
