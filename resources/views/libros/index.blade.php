@extends('layouts.app')

@section("libros")
    active
@endsection
@section("content")
  <div class="py-1">
      <div class="container col-12">
          <div class="row">
              <div class="d-flex justify-content-center card text-bg-dark mb-3">
                  <div class="card-body">
                      <div class="py-3">
                          <div class="container">
                              <div class="row">
                                  <div class="col-md-12">
                                      <h1 class="text-center">Libros<br></h1>
                                  </div>
                              </div>
                              <div class="col-md-12 text-center">
                                  @can('crear-libro')
                                      <a href="books/create" class="btn btn-primary"title="Nuevo Registro">
                                          Crear nuevo libro
                                      </a>
                                  @endcan
                              </div>
                              <div class="row py-1">
                                  <div class="col-md-12">
                                      <div class="table-responsive">
                                          <table class="table table-bordered table-dark border-primary mt-4 ">
                                              <thead class="thead-dark">
                                              <tr>
                                                  <th>#</th>
                                                  <th>TITULO</th>
                                                  <th>CODIGO</th>
                                                  <th>AÑO</th>
                                                  <th>Opciones</th>
                                              </tr>
                                              </thead>
                                              <tbody>
                                              @foreach($libro as $datos)
                                                  <tr>
                                                      <th>{{$loop->index+1}}</th>
                                                      <td>{{$datos->titulo}}</td>
                                                      <td>{{$datos->codigo}}</td>
                                                      <td>{{$datos->anio_publicacion}}</td>
                                                      <td>
                                                          <div class="d-flex">
                                                              
                                                              @can('borrar-libro')
                                                                  <form action="{{route('books.destroy',$datos->id)}}" method="post">
                                                                      @csrf
                                                                      @method('delete')
                                                                      <button class="btn btn-danger" ype="submit">
                                                                        Eliminar
                                                                      </button>
                                                                  </form>
                                                              @endcan
                                                              <a class="btn btn-primary ms-2" href="{{route('libros.show',$datos->id)}}"
                                                                data-toggle="tooltip" rel="tooltip" data-placement="top" title="Editar datos">
                                                                 Ver Libro
                                                             </a>
                                                              <!--
                                                              @can('ver-libro')
                                                              <a class="btn btn-info" href="{{route('books.show',$datos->id)}}">Ver
                                                                  </a>
                                                              @endcan-->
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
@endsection
