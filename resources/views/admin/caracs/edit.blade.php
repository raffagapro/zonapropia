@extends('layouts.adminDashboard')
@section('title', 'Modificar Caracteristica')

@section('content')
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">

      {{-- Title --}}
      <div class="row align-items-center">
        <h2 class="card-title mb-section-card-title">{{ $car->name }}&nbsp</h2>
        <a href="{{ route('caracs.index') }}" class="border-left mt-3 td-none">&nbsp Regresar a Caracteristicas.</a>
      </div>

      {{-- General info form --}}
      <div class="card mb-section-card">
        {{-- Title --}}
        <h4 class="card-title mb-section-card-title mt-1 mb-4">Modificar Caracteristica</h4>
        {{-- General info --}}
        <div class="container">
          <form action="{{ route('caracs.update', $car->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input
                type="text" name="nombre"
                class="form-control"
                placeholder="Nombre" value="{{ $car->name }}">
            </div>
            {{-- descripcion --}}
            <div class="form-group">
              <label for="descripcion">Descripcion</label>
              <textarea class="form-control" name="descripcion" rows="3">{{ $car->descripcion }}</textarea>
            </div>
            {{-- icono --}}
            <div class="form-group">
              <label for="icono">Icono <i class="{{ $car->icono }}"></i></label>
              <input type="text" name="icono" class="form-control" placeholder="fas fa-address-card" value="{{ $car->icono }}">
              <small>Buscar Icono en <a href="https://fontawesome.com/" target="_blank">Font Awesome</a>. Copiar el contenido de la clase. <b>Ejemplo:</b> &lt;i class="fas fa-address-card"&gt;. <b>Ingresar: <span class="text-danger">fas fa-address-card</span></b>.</small>
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
