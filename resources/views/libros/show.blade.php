@extends('layouts.app')
@section('content')

<div class="container col-8">
    <div class="card text-bg-dark">
        <div class="card-body">
           
            <div class="row">
                <div class="col">
                    <img src="{{Storage::url($libro->image->url)}}" class="card-img" width="100%" height="100%" style="">
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="fs-4">Titulo</label>
                        <p>{{$libro->titulo}}</p>
                    </div>
                    <div class="form-group">
                        <label class="fs-4">Código</label>
                        <p>{{$libro->codigo}}</p>
                    </div>
                    <div class="form-group">
                        <label class="fs-4">Año de publicación</label>
                        <p>{{$libro->anio_publicacion}}</p>
                    </div>
                    <div class="form-group">
                        <label class="fs-4">Descripción</label>
                        <p>{{$libro->descripcion}}</p>
                    </div>
                    <div class="form-group">
                        <label class="fs-4">Editorial</label>
                        <p>{{$libro->editoriales->descripcion}}</p>
                    </div>
                    <div class="form-group">
                        <label class="fs-4">Autor(es)</label>
                        <p>{{$autores->nombre}}</p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
    
@stop