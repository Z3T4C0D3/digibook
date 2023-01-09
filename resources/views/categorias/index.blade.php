@extends('layouts.app')

@section("libros")
    active
@endsection
@section("content")
    <div class="container">
        <div class="card text-bg-dark mb-3">
            <div class="card-body">
                <div class="row d-flex justify-content-center">
                    <div class="col-10 d-flex justify-content-center">
                        <h1 class="text-center">Categorias</h1>
                    </div>
                </div>

                <div class="row d-flex justify-content-center">
                    <div class="col-10 d-flex justify-content-center">
                        <a href="categories/create" class="btn btn-primary">Nuevo</a>        
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-10 d-flex justify-content-center">
                        <table class="table table-bordered table-dark border-primary mt-4">
                           <thead class="thead-dark text-center">
                               <tr>
                                   <th>ID</th>
                                   <th>DESCRIPCION</th>
                                   <th>OPCIONES</th>
                               </tr>
                               <tbody>
                                   @foreach($categorias as $categoria)
                                    <tr>
                                        <th>{{$loop->index+1}}</th>
                                        <td>{{$categoria->descripcion}}</td>
                                        <td>
                                            <div class="row d-flex justify-content-center">
                                                <div class="col-5 d-flex justify-content-center">
                                                    <a class="btn btn-warning mx-2" href="{{route('categories.edit',$categoria->id)}}">Actualizar</a>
                                                </div>
                                                <div class="col-5 d-flex justify-content-center">
                                                    <form action="{{route('categories.destroy',$categoria->id)}}" method="POST">
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