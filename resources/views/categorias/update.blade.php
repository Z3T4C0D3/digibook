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
                        <h1 class="text-center">Actualizar Categoria</h1>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-6 d-flex justify-content-center">
                        <form id="c_form-h" method="post" action="{{route('categories.update',$category->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row d-flex justify-content-center">
                                <div class="row"><label class="col-12">Descripcion de la categoria</label></div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-12"><input type="text" class="form-control @error('descripcion')is-invalid @enderror" placeholder="Descripcion de la categoria" id="descripcion" name="descripcion" value="{{$category->descripcion}}">
                                @error('descripcion')
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