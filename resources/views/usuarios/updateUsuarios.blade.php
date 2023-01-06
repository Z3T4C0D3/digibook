@extends('layouts.app')

@section("usuarios")
    active
@endsection
@section("content")
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center"><b class="text-center">Actualizar Usuario</b></h1>
        </div>
      </div>
    </div>
  </div>
  <div class="container col-sm-4">
      <div class="row">
          <div class="d-flex justify-content-center card">
              <div class="card-body">
                  @if ($errors->any())
                      <div class="alert alert-dark alert-dismissible fade show" role="alert">
                          <strong>¡Revise los campos!</strong>
                          @foreach ($errors->all() as $error)
                              <span class="badge badge-danger">{{ $error }}</span>
                          @endforeach
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                  @endif

                  {!! Form::model($user, ['method' => 'PATCH','route' => ['usuarios.update', $user->id]]) !!}
                  <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <label for="name">Nombre</label>
                              {!! Form::text('name', null, array('class' => 'form-control')) !!}
                          </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <label for="email">E-mail</label>
                              {!! Form::text('email', null, array('class' => 'form-control')) !!}
                          </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <label for="password">Password</label>
                              {!! Form::password('password', array('class' => 'form-control')) !!}
                          </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <label for="">Roles</label>
                              {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control')) !!}
                          </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12 my-1 text-center">
                          <button type="submit" class="btn btn-dark text-capitalize border border-left border-right
                            border-top border-bottom border-light rounded-lg active text-decoration-none">Guardar</button>
                      </div>
                  </div>
                  {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>
@endsection
