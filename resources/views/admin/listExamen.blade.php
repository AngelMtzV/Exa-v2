@extends('layouts.app')

@section('botonNavExamenes')
{{ 'active' }}
@endsection

@section('content')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4 container">
    <h1><img src="{{ asset('imagenes/admin3.png') }}" width="70" height="60"> Administrador - Examenes</h1>

    <a class="d-none d-sm-inline-block  btn-primary shadow-sm"></a>
    <a href="{{ route('examenesAdmin.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user-plus"></i> Nuevo examen</a>
  </div>

  <div class="row col-xl-12 col-lg-12">
    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <!-- Card Header - Dropdown -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Listado de examenes</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <!--<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">-->
                <table id="example" class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>@forelse($examenes as $examen)
                            <tr>
                                <td><i class="fas fa-user-alt"></i> {{ $examen->nombre }}</td>
                                <td><i class="fas fa-envelope-square"></i> {{ $examen->descripcion }}</td>
                                <td style="align-content: center;">
                                  @if($examen->id_estado == 1)
                                  <a data-target="#ModalVer-{{$examen->id}}" data-toggle="modal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm text-white botonesTablas" data-toggle="tooltip" data-placement="top" title="Mostrar"><i class="fas fa-eye"></i> Mostrar</a><br><br>
                                  @endif
                                  <a href="{{ route('examenesAdmin.edit',Crypt::encrypt($examen->id)) }}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm botonesTablas" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i> Editar</a><br><br>
                                  <form id="myform{{$examen->id}}" action="{{ Route('examenesAdmin.destroy', $examen->id) }}" method="POST">
                                    {{ csrf_field() }}
                                      @method('DELETE')
                                  </form>
                                  <button class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm botonesTablas delete" type="submit" data-id="{{$examen->id}}" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fas fa-trash-alt"></i> Eliminar</button>
                                </td>
                                @include('admin.modales.verExamen')
                                @empty
                                <h4 class="alert alert-info"><i class="fas fa-info-circle"></i> Aún no existen registros</h4>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
              </div>
            </div>
          </div>
    </div>
  </div>
</div>
@endsection