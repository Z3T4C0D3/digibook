@extends('layouts.app')

@section("estantes")
    active
@endsection
@section("content")
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center"><b class="text-center">Devolver libro</b></h1>
        </div>
      </div>
    </div>
  </div>
  <div class="container col-sm-5">
      <div class="row">
          <div class="d-flex justify-content-center card">
              <div class="card-body">
                  <form id="c_form-h" method="POST" action="{{url('returns')}}">
                    @csrf
                      <div class="my-2 form-group row"><label class="col-12 d-flex justify-content-center">Ingresar el prestamo</label>
                          <div class="col-12 d-flex justify-content-center"><select class="form-select @error('prestamos_id')is-invalid @enderror" aria-label="Default select example" id="prestamos_id" name="prestamos_id">
                                  <option selected="" value="Open this select menu">Selecciona prestamo</option>
                                  @foreach($prestamos as $prestamo)
                                      <option value="{{$prestamo->id}}">{{$prestamo->id}}</option>
                                  @endforeach
                              </select>
                              @error('prestamos_id')
                              <div class="invalid-feedback">{{$message}}</div>
                              @enderror
                          </div>
                      </div>
                      <div class="my-2 form-group row"><label class="col-12 d-flex justify-content-center">Comentarios</label>
                          <div class="col-12 d-flex justify-content-center">
                            <input type="" name="observaciones">
                              @error('observaciones')
                              <div class="invalid-feedback">{{$message}}</div>
                              @enderror
                          </div>
                      </div>

                      <div class="text-center">
                      <button type="submit" class="btn btn-dark text-capitalize border border-left border-right
                            border-top border-bottom border-light rounded-lg active text-decoration-none">Agregar<br></button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
@endsection
