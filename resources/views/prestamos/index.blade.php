@extends('layouts.app')

@section("estantes")
    active
@endsection
@section("content")
    <div class="container col-sm-8">
        <div class="row">
            <div class="d-flex justify-content-center card">
                <div class="card-body">
                    <div class="col-md-12">
                        <h1 class="text-center">Tabla Prestamos<br></h1>
                    </div>
                </div>
                <div class="col-md-12 text-center my-1">
                    @can('crear-prestamo')
                        <a class="btn btn-primary" href="loans/create">Solicitar prestamo</a>@endcan
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered ">
                                <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Nombre de usuario</th>
                                    <th>Titulo del libro<br></th>
                                    <th>Numero de copia<br></th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($prestamo as $datos)
                                    <tr>
                                        <th>{{$loop->index+1}}</th>
                                        <td>{{$datos->name}}</td>
                                        <td>{{$datos->titulo}}</td>
                                        <td>{{$datos->copia}}</td>
                                        <td>
                                            <div class="d-flex">
                                            @can('editar-prestamo')
                                                <a class="btn btn-warning"
                                                   href="{{route('loans.edit',$datos->id)}}">Actualizar
                                                </a>@endcan
                                            @can('borrar-prestamo')
                                                <form action="{{route('loans.destroy',$datos->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger"type="submit">Borrar </button>
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
@endsection
