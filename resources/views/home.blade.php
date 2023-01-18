@extends('layouts.app')

@section('content')
<div class="container">
    
    

        <div class="row row-cols-4 justify-content-center">
            @foreach ($libros as $libro)
            <div class="card text-bg-secondary mb-3 border me-2 mt-2" >
                <div class="card-header border text-bg-dark mt-2">
                    <h5 class="card-title text-center">{{$libro->titulo}}</h5>
                </div>
                <div class="row g-0">
                  <div class="col-md-12 mb-2 border">
                    <a class="" href="{{route('libros.show',$libro->id)}}">
                        <img src="{{Storage::url($libro->image->url)}}" class="card-img" width="150" height="300" style="">
                    </a>
                  </div>
                  
                </div>
              </div>
            @endforeach
        </div>
    
</div>

    

@endsection
