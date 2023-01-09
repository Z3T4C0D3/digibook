@extends('layouts.app')

@section("libros")
    active
@endsection
@section('styles')

@endsection
@section("content")
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        // Select2 Multiple
        $('.autores').select2({
            theme: "classic",
            placeholder: "Eligir autor",
            
        });
        $('.categorias').select2({
            theme: "classic",
            placeholder: "Eligir categoria",
            
        });
    });
</script>
    <div class="header">
        <form id="c_form-h" method="post" action="{{url('books')}}" enctype="multipart/form-data">
            @csrf
        
        </div>
            <div class="row d-flex justify-content-center">
            <div class="col-7">
                <div class="row">
                    <div class="d-flex justify-content-center card bg-secondary text-dark mb-3">
                        <div class="card-body border border-white mt-2 mb-2 border-rounded">
                            <div class="card-header bg-dark border border-white">
                                <h1 class="text-center  text-white mb-2">Registro de libros</h1>
                            </div>
                            
                            <div class="d-lg-flex mb-2 mt-2">
                                <label for="title" class="col-2">Titulo del libro</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control @error('titulo')is-invalid @enderror" id="titulo" name="titulo" placeholder="Titulo del libro" value="{{old('titulo')}}">
                                    @error('titulo')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-lg-flex">
                                <label for="title" class="col-2">Codigo del libro</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control @error('codigo')is-invalid @enderror" id="codigo" name="codigo" placeholder="Codigo del libro" value="{{old('codigo')}}">
                                    @error('codigo')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="my-2 d-lg-flex">
                                <label for="anio" class="col-2">Año de publicación</label>
                                <div class="col-10">
                                    <input type="text" class="form-control @error('anio_publicacion')is-invalid @enderror" id="anio_publicacion" name="anio_publicacion" placeholder="Año del libro" value="{{old('anio_publicacion')}}">
                                    @error('anio_publicacion')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-lg-flex">
                                <label for="title" class="col-2">Descripcion Libro</label>
                                <div class="col-md-10">
                                    <textarea type="text" class="form-control @error('descripcion')is-invalid @enderror" id="descripcion" name="descripcion" placeholder="Descripcion del libro" value="{{old('descripcion')}}"></textarea>
                                    @error('descripcion')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                           
                            <div class="my-2 d-lg-flex">
                                    <label class="col-sm-2">Editorial</label>
                                        <div class="d-flex col-lg-9 ">
                                            <select checked="checked" class="form-control @error('editoriales_id')is-invalid @enderror" id="editoriales_id" name="editoriales_id" required="required" style=" text: 0px 0px 4px black;">
                                                <option selected="0"> Elegir editorial </option>
                                                @foreach ($editorial as $edit)
                                                    <option value="{{$edit->id}}"> {{$edit->descripcion}} </option>
                                                @endforeach
                                            </select>
                                            @error('editoriales_id')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                    </div>
                                    
                                </div> 
                                
                            <div class="my-2 d-flex">
                                <label class="col-2 d-flex">Categorias</label>
                                <div class="form-group">
                                    <div class="form-group">
                                        <select class="categorias" style="width: 100% height:100%" name="categorias[]" multiple="multiple" id="categorias">
                                            @foreach ($categoria as $cate)
                                                        <option value="{{$cate->id}}"> {{$cate->descripcion}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                                        
                                        
                            <div class="my-2 d-flex">
                                <label class="col-2 d-flex">Autores</label>
                                <div class="form-group">
                                    <div class="form-group">
                                        <select class="autores" style="width: 100%" name="autores[]" multiple="multiple" id="autores">
                                            @foreach($autores as $autor)
                                                <option value="{{$autor->id}}">{{$autor->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                                <label class="mb-2 col-12">Numero de copias</label>
                                <div class="d-flex">
                                    <input type="number" class="form-control @error('num_copia')is-invalid @enderror" id="num_copia" name="num_copia" placeholder="Agregue numero de copias" value="{{old('num_copia')}}">
                                    @error('num_copia')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                            <div class="my-2 d-flex">
                                <label for="anio" class="col-2 d-flex">Imagen</label>
                                <div class=" form-group col-9">
                                    <div class="form-group">
                                        <input type="file" class="form-control @error('file')is-invalid @enderror" id="file" name="file" placeholder="Archivo" accept='image/*'value="{{old('file')}}">
                                        @error('file')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success btn-lg text-capitalize border border-left border-right
                                border-top border-bottom border-light rounded-lg active text-decoration-none mt-5">Guardar<br></button>
                            </div>

                            </div>
                    </div>
                </div>
            </div>
            <div class="footer">
            
            </div>
        </form>
    </div>
@endsection
@section('scripts')

@endsection
