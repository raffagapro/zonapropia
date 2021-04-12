@extends('layouts.adminDashboard')
@section('title', 'Modificar Anuncio')

@section('content')
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">

      {{-- Title --}}
      <div class="row align-items-center">
        <h2 class="card-title mb-section-card-title">{{ $notice->title }}&nbsp</h2>
        <a href="{{ route('notice.index') }}" class="border-left mt-3 td-none">&nbsp Regresar a Anuncios.</a>
      </div>

      {{-- General info form --}}
      <div class="card mb-section-card">
        {{-- Title --}}
        <h4 class="card-title mb-section-card-title mt-1 mb-4">Modificar Anuncio</h4>
        {{-- General info --}}
        <div class="container">
          <form action="{{ route('notice.update', $notice->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="titulo">Titulo</label>
              <input
                type="text" name="titulo"
                class="form-control @error('titulo') is-invalid @enderror"
                placeholder="Titulo" value="{{ $notice->title }}"
              >
              <small id="emailHelp" class="form-text text-danger text-right">*Requerido.</small>
              @error('titulo')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <div class="form-group">
                <label for="mensaje">Mensaje</label>
                <textarea
                  class="form-control @error('mensaje') is-invalid @enderror"
                  name="mensaje" rows="3"
                  placeholder="Escriba aquí su anuncio">{{ $notice->body }}
                </textarea>
                <small id="emailHelp" class="form-text text-danger text-right">*Requerido.</small>
                @error('mensaje')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
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
