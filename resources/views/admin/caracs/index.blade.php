@extends('layouts.adminDashboard')
@section('title', 'Panel de Caracteristicas')

@section('content')
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">

      {{-- Title --}}
      <div class="row align-items-center">
        <h2 class="card-title mb-section-card-title">Caracteristicas&nbsp</h2>
        <span class="border-left mt-3">&nbsp&nbspMostrando {{$caracs->count()}} de {{$caracs->total()}} resultados.</span>
      </div>

      {{-- Table --}}
      <div class="card mb-section-card">
        <div class="card-body pt-0">
          <table class="table table-hover mt-4 table-responsive-sm">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Icono</th>
                <th scope="col">Control</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($caracs as $cars)
                <tr>
                  <th scope="row">{{ $cars->id }}</th>
                  <td>
                    <a href="{{ route('caracs.edit', $cars->id) }}">
                      {{ $cars->name }}
                    </a>
                  </td>
                  <td>
                    <i class="{{ $cars->icono }}"></i>
                  </td>
                  <td>
                    <a
                      href="javascript:void(0);"
                      class="btn btn-sm btn-danger"
                      onclick="
                        event.preventDefault();
                        swal.fire({
                          text: '¿Deseas eliminar la caracteristica?',
                          showCancelButton: true,
                          cancelButtonText: `Cancelar`,
                          cancelButtonColor:'#62A4C0',
                          confirmButtonColor:'red',
                          confirmButtonText:'Eliminar',
                          icon:'error',
                        }).then((result) => {
                          if (result.isConfirmed) {
                            document.getElementById('{{ 'carsDestroy'.$cars->id }}').submit();
                          }
                        });
                      "
                      data-toggle="tooltip" data-placement="top" title="Borrar Tag">
                      <i class="fas fa-trash"></i>
                    </a>
                    <form id="{{ 'carsDestroy'.$cars->id }}"
                      action="{{ route('caracs.destroy', $cars->id) }}"
                      method="POST"
                      style="display: none;"
                      >@method('DELETE') @csrf
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <th class="main-color">No se encontraron tags en el registro.</th>
                </tr>
              @endforelse
            </tbody>
          </table>
          {{-- Paginator --}}
          {{$caracs->links()}}
        </div>
      </div>

      {{-- Add Caracteristicas --}}
      <div class="card mb-section-card">
        <div class="card-body pt-0">
          {{-- Title --}}
          <h4 class="card-title mb-section-card-title mt-1 mb-4">Agregar Caracteristicas</h4>
          {{-- Form --}}
          <div class="container">
            <form action="{{ route('caracs.store') }}" method="POST">
              @csrf
              {{-- Name --}}
              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control">
              </div>
              {{-- descripcion --}}
              <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <textarea class="form-control" name="descripcion" rows="3"></textarea>
              </div>
              {{-- icono --}}
              <div class="form-group">
                <label for="icono">Icono</label>
                <input type="text" name="icono" class="form-control" placeholder="fas fa-address-card">
                <small>Buscar Icono en <a href="https://fontawesome.com/" target="_blank">Font Awesome</a>. Copiar el contenido de la clase. <b>Ejemplo:</b> &lt;i class="fas fa-address-card"&gt;. <b>Ingresar: <span class="text-danger">fas fa-address-card</span></b>.</small>
              </div>
              <button type="submit" class="btn bg-main-color navBar-btn text-light float-right mb-3">Guardar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  @if(session('status'))
    <x-sweet-alert-admin :message="session('status')"/>
  @endif
@endsection

{{-- @section('scripts')

<script src="{{ asset('js/calendar.js') }}" defer></script>
@endsection --}}
