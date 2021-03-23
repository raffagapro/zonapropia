@extends('layouts.adminDashboard')
@section('title', 'Modificar Tag')

@section('content')
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">

      {{-- Title --}}
      <div class="row align-items-center">
        <h2 class="card-title mb-section-card-title">{{ $tag->name }}&nbsp</h2>
        <a href="{{ route('tag.index') }}" class="border-left mt-3 td-none">&nbsp Regresar a Tags.</a>
      </div>

      {{-- General info form --}}
      <div class="card mb-section-card">
        {{-- Title --}}
        <h4 class="card-title mb-section-card-title mt-1 mb-4">Modificar Tag</h4>
        {{-- General info --}}
        <div class="container">
          <form action="{{ route('tag.update', $tag->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input
                type="text" name="nombre"
                class="form-control"
                placeholder="Nombre" value="{{ $tag->name }}">
            </div>
            {{-- Color/Visibility  --}}
            <div class="row">
              <div class="form-group col-6">
                <h5>Seleccionar Color</h5>
                {{-- verde --}}
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input" type="radio" name="color"
                    value="success" @if ($tag->color === "success") checked @endif
                  >
                  <label class="form-check-label" for="inlineRadio1">
                    <span class="badge badge-success">Tag</span>
                  </label>
                </div>
                {{-- rojo --}}
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input" type="radio" name="color"
                    value="danger" @if ($tag->color === "danger") checked @endif
                  >
                  <label class="form-check-label text-danger" for="inlineRadio1">
                    <span class="badge badge-danger">Tag</span>
                  </label>
                </div>
                {{-- azul claro --}}
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input" type="radio" name="color"
                    value="info" @if ($tag->color === "info") checked @endif
                  >
                  <label class="form-check-label text-info" for="inlineRadio1">
                    <span class="badge badge-info">Tag</span>
                  </label>
                </div>
                {{-- gris --}}
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input" type="radio" name="color"
                    value="secondary" @if ($tag->color === "secondary") checked @endif
                  >
                  <label class="form-check-label text-info" for="inlineRadio1">
                    <span class="badge badge-secondary">Tag</span>
                  </label>
                </div>
                {{-- azul --}}
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input" type="radio" name="color"
                    value="primary" @if ($tag->color === "primary") checked @endif
                  >
                  <label class="form-check-label text-info" for="inlineRadio1">
                    <span class="badge badge-primary">Tag</span>
                  </label>
                </div>
                {{-- amarillo --}}
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input" type="radio" name="color"
                    value="warning" @if ($tag->color === "warning") checked @endif
                  >
                  <label class="form-check-label text-info" for="inlineRadio1">
                    <span class="badge badge-warning">Tag</span>
                  </label>
                </div>
              </div>

              <div class="form-group col-6">
                <h5>Visibilidad</h5>
                {{-- verde --}}
                <select class="form-control" name="vis">
                  <option value=0 @if ((int)$tag->visibility === 0) selected @endif>Ambos</option>
                  <option value=1 @if ((int)$tag->visibility === 1) selected @endif>Proyectos</option>
                  <option value=2 @if ((int)$tag->visibility === 2) selected @endif>Posts</option>
                </select>
              </div>
            </div>

             <div class="row">

              

            </div>
            <button type="submit" class="btn bg-main-color navBar-btn text-light float-right mb-3">Actualizar</button>
          </form>
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
