@extends('layouts.app')

@section("libros")
    active
@endsection
@section("content")
    <div class="py-1">
        <div class="container col-12">
            <div class="row">
                <div class="d-flex justify-content-center card">
                    <div class="card-body">
                        <div class="py-3">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-10 d-flex justify-content-center">
                                                <h1 class="text-center">Tabla Roles<br></h1>
                                            </div>
                                            <div class="my-1 col-md-12 text-center">
                                                @can('crear-rol')
                                                    <div class="col-md-12 text-center"><a class="btn btn-primary" href="roles/create" title="Nuevo Registro">Nuevo</a>
                                            </div>
                                                @endcan
                                            </div>
                                            <div class="row d-flex justify-content-center">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered ">
                                                            <thead class="thead-dark">
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Rol</th>
                                                                <th>Opciones</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($roles as $datos)
                                                                <tr>
                                                                    <th>{{$loop->index+1}}</th>
                                                                    <td>{{$datos->name}}</td>
                                                                    <td>
                                                                        <div class="d-flex">
                                                                            @can('editar-rol')
                                                                                <a class="btn btn-warning mx-2"
                                                                                   href="{{route('roles.edit',$datos->id)}}">
                                                                                    Actualizar
                                                                                </a>
                                                                            @endcan
                                                                            @can('borrar-rol')
                                                                                <form action="{{route('roles.destroy',$datos->id)}}" method="post">
                                                                                    @csrf
                                                                                    @method('delete')
                                                                                    <button class="btn btn-danger"
                                                                                            type="submit">
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
    </div>
@endsection
