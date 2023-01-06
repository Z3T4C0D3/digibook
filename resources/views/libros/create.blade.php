@extends('layouts.app')

@section("libros")
    active
@endsection
@section('styles')

@endsection
@section("content")
<script>
    $(document).ready(function() {
        // Select2 Multiple
        $('.select2-multiple').select2({
            placeholder: "Select",
            allowClear: true
        });
    });
</script>
    <div class="header">
        <form id="c_form-h" method="post" action="{{url('books')}}" enctype="multipart/form-data">
            @csrf
        
        </div>
            <div class="row d-flex justify-content-center">
            <div class="col-5">
                <div class="row">
                    <div class="d-flex justify-content-center card">
                        <div class="card-body">
                            <h1 class="text-center">Registro de libros</h1>
                            <div class="d-lg-flex">
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
                                            <select checked="checked" class="form-control @error('editoriales_id')is-invalid @enderror" id="editoriales_id" name="editoriales_id">
                                                <option selected="0"> Elegir editorial </option>
                                                @foreach ($editorial as $edit)
                                                    <option value="{{$edit->id}}"> {{$edit->descripcion}} </option>
                                                @endforeach
                                            </select>
                                            @error('id_editoriales')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                    </div>
                                   
                                </div>
                                <div class="my-2 d-lg-flex">
                                        <label class="col-sm-2">Categoria</label>
                                            <div class="d-flex col-lg-9 ">
                                                <select checked="checked" class="form-control @error('categorias_id     ')is-invalid @enderror" id="categorias_id" name="categorias_id">
                                                    <option selected="0"> Elegir categoria </option>
                                                    @foreach ($categoria as $cate)
                                                        <option value="{{$cate->id}}"> {{$cate->descripcion}} </option>
                                                    @endforeach
                                                </select>
                                                @error('categorias_id')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                        </div>
                                        
                                        </div>
                            <div class="my-2 d-flex">
                                <label class="col-2 d-flex">Autores</label>
                                <div class="form-group col-9">
                                    <div class="form-group">
                                        <select class="select2-multiple form-control" name="autores_id[]" multiple="multiple" id="autores_id">
                                            @foreach($autores as $autor)
                                                <option value="{{$autor->id}}">{{$autor->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                </div>
                            </div>
                            <div class="my-2 d-lg-flex">
                                <label for="anio" class="col-2">Imagen</label>
                                <div class="col-10">
                                    <input type="file" class="form-control @error('file')is-invalid @enderror" id="file" name="file" placeholder="Archivo" accept='image/*'value="{{old('file')}}">
                                    @error('file')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-body">
                            <label class="mb-2 col-12">Numero de copias</label>
                            <div class="d-flex">
                                <input type="number" class="form-control @error('num_copia')is-invalid @enderror" id="num_copia" name="num_copia" placeholder="numero de copias" value="{{old('num_copia')}}">
                                @error('num_copia')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-dark text-capitalize border border-left border-right
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
