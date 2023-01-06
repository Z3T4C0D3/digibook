@extends('layouts.app')

@section("libros")
    active
@endsection
@section("content")
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row d-flex justify-content-center">
                    <div class="col-10 d-flex justify-content-center">
                        <h1 class="text-center">Autores</h1>
                    </div>
                </div>

                <div class="row d-flex justify-content-center">
                    <div class="col-10 d-flex justify-content-center">
                        <a href="authors/create" class="btn btn-primary">Nuevo</a>        
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-6 d-flex justify-content-center">
                        <table class="table table-bordered mt-4">
                           <thead class="thead-dark text-center">
                               <tr>
                                   <th>ID</th>
                                   <th>NOMBRE</th>
                                   <th>OPCIONES</th>
                               </tr>
                               <tbody>
                                   @foreach($autores as $autor)
                                    <tr>
                                        <th>{{$loop->index+1}}</th>
                                        <td>{{$autor->nombre}}</td>
                                        <td>
                                            <div class="row d-flex justify-content-center">
                                                <div class="col-5 d-flex justify-content-center">
                                                    <a class="btn btn-warning mx-2" href="{{route('authors.edit',$autor->id)}}">Actualizar</a>
                                                </div>
                                                <div class="col-5 d-flex justify-content-center">
                                                    <form action="{{route('authors.destroy',$autor->id)}}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger"type="submit">Eliminar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                   @endforeach
                               </tbody>
                           </thead> 
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection