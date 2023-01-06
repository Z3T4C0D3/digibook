@extends('layouts.app')

@section("usuarios")
    active
@endsection
@section("content")
        <div class="container col-12">
            <div class="row">
                <div class="d-flex justify-content-center card">
                    <div class="card-body">
                        <div class="py-3">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h1 class="text-center">Usuarios<br></h1>
                                            </div>
                                            <div class="col-md-12 text-center"><a class="btn btn-primary" href="usuarios/create" title="Nuevo Registro">Nuevo</a>
                                            </div>
                                            <div class="row py-1">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered ">
                                                            <thead class="thead-dark">
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Nombre</th>
                                                                <th>Correo</th>
                                                                <th>Rol</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($usuarios as $datos)
                                                                <tr>
                                                                    <th>{{$loop->index+1}}</th>
                                                                    <td>{{$datos->name}}</td>
                                                                    <td>{{$datos->email}}</td>
                                                                    <td>@if(!empty($datos->getRoleNames()))
                                                                            @foreach($datos->getRoleNames() as $rolName)
                                                                                <h5>{{$rolName}}</h5>
                                                                            @endforeach
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex">
                                                                            @can('editar-usuario')
                                                                                <a class="btn btn-warning mx-2"href="{{route('usuarios.edit',$datos->id)}}">
                                                                                    Modificar
                                                                                </a>@endcan
                                                                            @can('borrar-usuario')
                                                                                <form method="POST" action="{{route('usuarios.destroy',$datos->id)}}">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button class="btn btn-danger"type="submit">
                                                                                        Eliminar
                                                                                    </button>
                                                                                </form>
                                                                            @endcan
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                              @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
