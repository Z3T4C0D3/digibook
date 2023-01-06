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
                        <h1 class="text-center">Categorias</h1>
                    </div>
                </div>

                <div class="row d-flex justify-content-center">
                    <div class="col-10 d-flex justify-content-center">
                        <a href="publishers/create" class="btn btn-primary">Nuevo</a>        
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-6 d-flex justify-content-center">
                        <table class="table table-bordered mt-4">
                           <thead class="thead-dark text-center">
                               <tr>
                                   <th>ID</th>
                                   <th>DESCRIPCION</th>
                                   <th>OPCIONES</th>
                               </tr>
                               <tbody>
                                   @foreach($editoriales as $editorial)
                                    <tr>
                                        <th>{{$loop->index+1}}</th>
                                        <td>{{$editorial->descripcion}}</td>
                                        <td>
                                            <div class="row d-flex justify-content-center">
                                                <div class="col-5 d-flex justify-content-center">
                                                    <a class="btn btn-warning mx-2" href="{{route('publishers.edit',$editorial->id)}}">Actualizar</a>
                                                </div>
                                                <div class="col-5 d-flex justify-content-center">
                                                    <form action="{{route('publishers.destroy',$editorial->id)}}" method="POST">
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