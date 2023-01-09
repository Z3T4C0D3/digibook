@extends('layouts.app')

@push('scripts')
<script type="text/javascript">
document.addEventListener('alpine:init', () => {
  Alpine.data('app', () => ({
		libros:{!!$libros!!},
    libro:null,
    copia:null,
    copias(){return getCopias(this.libro)},
		
  }))
});
console.log(libros);
const getLibros = () => {
  return {!!$libros!!};
}
const getCopias = (libro) => {
  return {!!$copias!!};
}

</script>
@endpush

@section("estantes")
    active
@endsection
@section("content")
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center"><b class="text-center">Generar Nuevo Prestamo</b></h1>
        </div>
      </div>
    </div>
  </div>

  <div class="container col-sm-12">
      <div class="row">
          <div class="d-flex justify-content-center card">
              <div class="card-body">
                  <form id="c_form-h" method="POST" action="{{url('loans')}}">
                    @csrf
                      <input type="hidden" name="users_id" value="{{auth()->user()->id}}">
                      <div x-data="app" x-cloak>
                        <label>Libros:</label>
                        <select x-model="libro">
                          <option value="">Selecciona un libro</option>
                          <template x-for="libro in libros">
                            <option :value="libro.id"><span x-text="libro.titulo"></span></option>
                          </template>
                        </select>
                        
                        
                        <label x-show="libro">Copia:
                          <select x-model="copia" >
                            <template x-for="copia in copias">
                              <option x-show="copia.libros_id == libro":value="copia.id"><span x-text="copia.copia"></span></option>
                            </template>
                          </select>
                        </label>
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

