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
                        <h1 class="text-center">Actualizar autor</h1>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-10 d-flex justify-content-center">
                        <form id="c_form-h" method="post" action="{{route('authors.update',$author->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row d-flex justify-content-center">
                                <div class="row"><label class="col-12">Nombre del autor</label></div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-12 "><input type="text" class="form-control @error('nombre')is-invalid @enderror" placeholder="Nombre del autor" id="nombre" name="nombre" value="{{$author->nombre}}">
                                @error('nombre')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                </div>
                                </div>
                            </div>
                            <div class="text-center">
                               <button type="submit" class="mt-3 btn btn-primary">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection