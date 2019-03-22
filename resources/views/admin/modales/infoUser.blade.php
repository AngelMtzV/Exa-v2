<!-- Modal-->
    <div class="modal fade" id="myModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header cabecera">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title text-white">{{$user->usuario}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center>
                    <img src="{{asset('imagenes/usuario.png')}}" name="aboutme" width="140" height="140" border="0" class="img-circle"></a>
                    <h3 class="media-heading TextTitulos">{{$user->name}} {{$user->apellidos}} <small>De {{$user->estado}}</small></h3>
                    <span><strong>Profesión: </strong></span>
                        <span class="label label-warning">{{$user->profesion}}</span>
                    </center>
                    <hr>
                    <center>
                    <h5 class="text-left TextTitulos"><strong>Datos: </strong></h5>
                        <div class="row">
                          <div class="col">
                            <p class="card-text">Nombre: <strong class="datos" ">{{$user->name}}</strong></p>
                            <p class="card-text">Usuario: <strong class="datos" ">{{$user->usuario}}</strong></p>
                            <p class="card-text">Correo electrónico: <strong class="datos" ">{{$user->email}}</strong></p>
                            <p class="card-text">Telefono: <strong class="datos" ">{{$user->telefono}}</strong></p>
                            <p class="card-text">Celular: <strong class="datos" ">{{$user->celular}}</strong></p>
                          </div>
                          <div class="col">
                            <p class="card-text">Estado: <strong class="datos" ">{{$user->estado}}</strong></p>
                            <p class="card-text">Esatdo civil: <strong class="datos" ">{{$user->estado_civil}}</strong></p>
                            <p class="card-text">Genero: <strong class="datos" ">{{$user->genero}}</strong></p>
                            <p class="card-text">Fecha de nacimiento: <strong class="datos" ">{{$user->fecha_nacimiento}}</strong></p>
                            <p class="card-text">Tipo de usuario: <strong class="datos" ">{{ $user->id_tipoUsuario == 1 ? 'Administrador' : 'Practicante' }}</strong></p>
                          </div>
                        </div>
                    <br>
                    </center>
                </div>
                <div class="modal-footer">
                    <center>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('usuarios.edit',Crypt::encrypt($user->id)) }}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i> Editar</a>
                            </div>
                            <div class="col-md-6">
                                
                                <form id="userEliminar{{$user->id}}" action="{{ Route('usuarios.destroy',Crypt::encrypt($user->id)) }}" method="POST">
                                  {{ csrf_field() }}
                                    @method('DELETE')
                                </form>
                                <button class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm eliminar" type="submit" data-id="{{$user->id}}" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fas fa-trash-alt"></i> Eliminar</button>
                            </div>
                        </div>
                        
                    </center>
                </div>
            </div>
        </div>
    </div> 