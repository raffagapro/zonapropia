@extends('layouts.adminDashboard')
@section('title', 'Panel de Tags')

@section('content')
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">

      {{-- Title --}}
      <div class="row align-items-center">
        <h2 class="card-title mb-section-card-title">Tags&nbsp</h2>
        <span class="border-left mt-3">&nbsp&nbspMostrando {{$tags->count()}} de {{$tags->total()}} resultados.</span>
      </div>

      {{-- Table --}}
      <div class="card mb-section-card">
        <div class="card-body pt-0">
          <table class="table table-hover mt-4 table-responsive-sm">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Color</th>
                <th scope="col">Control</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($tags as $tag)
                <tr>
                  <th scope="row">{{ $tag->id }}</th>
                  <td>
                    <a href="{{ route('tag.edit', $tag->id) }}">
                      {{ $tag->name }}
                    </a>
                  </td>
                  <td>
                    <span class="badge badge-{{ $tag->color }}"> Tag </span>
                  </td>
                  <td>
                    <a
                      href="javascript:void(0);"
                      class="btn btn-sm btn-danger"
                      onclick="
                        event.preventDefault();
                        swal.fire({
                          text: '¿Deseas eliminar el Tag?',
                          showCancelButton: true,
                          cancelButtonText: `Cancelar`,
                          cancelButtonColor:'#62A4C0',
                          confirmButtonColor:'red',
                          confirmButtonText:'Eliminar',
                          icon:'error',
                        }).then((result) => {
                          if (result.isConfirmed) {
                            document.getElementById('{{ 'tagDestroy'.$tag->id }}').submit();
                          }
                        });
                      "
                      data-toggle="tooltip" data-placement="top" title="Borrar Tag">
                      <i class="fas fa-trash"></i>
                    </a>
                    <form id="{{ 'tagDestroy'.$tag->id }}"
                      action="{{ route('tag.destroy', $tag->id) }}"
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
          {{$tags->links()}}
        </div>
      </div>

      {{-- Add Notice --}}
      <div class="card mb-section-card">
        <div class="card-body pt-0">
          {{-- Title --}}
          <h4 class="card-title mb-section-card-title mt-1 mb-4">Agregar Tag</h4>
          {{-- Form --}}
          <div class="container">
            <form action="{{ route('tag.store') }}" method="POST">
              @csrf
              {{-- Name --}}
              <div class="form-group">
                <input type="text" name="nombre" class="form-control" placeholder="Nombre">
              </div>
              {{-- Color --}}
              <div class="form-group">
                <h5>Seleccionar Color</h5>
                {{-- verde --}}
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="color" value="success">
                  <label class="form-check-label" for="inlineRadio1">
                    <span class="badge badge-success">Tag</span>
                  </label>
                </div>
                {{-- rojo --}}
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="color" value="danger">
                  <label class="form-check-label text-danger" for="inlineRadio1">
                    <span class="badge badge-danger">Tag</span>
                  </label>
                </div>
                {{-- azul claro --}}
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="color" value="info">
                  <label class="form-check-label text-info" for="inlineRadio1">
                    <span class="badge badge-info">Tag</span>
                  </label>
                </div>
                {{-- gris --}}
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="color" value="secondary">
                  <label class="form-check-label text-info" for="inlineRadio1">
                    <span class="badge badge-secondary">Tag</span>
                  </label>
                </div>
                {{-- azul --}}
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="color" value="primary">
                  <label class="form-check-label text-info" for="inlineRadio1">
                    <span class="badge badge-primary">Tag</span>
                  </label>
                </div>
                {{-- amarillo --}}
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="color" value="warning">
                  <label class="form-check-label text-info" for="inlineRadio1">
                    <span class="badge badge-warning">Tag</span>
                  </label>
                </div>
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
