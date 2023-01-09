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
                        <h1 class="text-center">Devoluciones</h1>
                    </div>
                </div>

                <div class="row d-flex justify-content-center">
                    <div class="col-10 d-flex justify-content-center">
                        <a href="returns/create" class="btn btn-primary">Nuevo</a>        
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-10 d-flex justify-content-center">
                        <table class="table table-bordered table-dark border-primary mt-4">
                           <thead class="thead-dark text-center">
                               <tr>
                                   <th>ID</th>
                                   <th>USUARIO</th>
                                   <th>FECHA</th>
                                   <th>OBSERVACIONES</th>
                                   <th>OPCIONES</th>
                               </tr>
                               <tbody>
                                   @foreach($devoluciones as $devolucion)
                                    <tr>
                                        <th>{{$loop->index+1}}</th>
                                        <td>{{auth()->user()->name}}</td>
                                        <td>{{$devolucion->created_at}}</td>
                                        <td>{{$devolucion->observaciones}}</td>
                                        <td>
                                            <div class="row d-flex justify-content-center">
                                                
                                                <div class="col-5 d-flex justify-content-center">
                                                    <form action="{{route('returns.destroy',$devolucion->id)}}" method="POST">
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