@extends('layouts.adminDashboard')
@section('title', 'Modificar Anuncio')

@section('content')
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">

      {{-- Alert Section --}}
      @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{session('status')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif

      {{-- Title --}}
      <div class="row align-items-center">
        <h2 class="card-title mb-section-card-title">{{ $notice->title }}&nbsp</h2>
        <a href="{{ route('notice.index') }}" class="border-left mt-3">&nbsp&nbsp Regresar a Anuncios.</a>
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
              <input
                type="text" name="titulo"
                class="form-control"
                placeholder="Titulo" value="{{ $notice->title }}">
            </div>
            <div class="form-group">
              <div class="form-group">
                <textarea
                  class="form-control"
                  name="mensaje" rows="3"
                  placeholder="Escriba aquí su anuncio">{{ $notice->body }}</textarea>
              </div>
            </div>
            <button type="submit" class="btn bg-main-color navBar-btn text-light float-right mb-3">Actualizar</button>
          </form>
        </div>
      </div>

    </div>
  </div>
@endsection

{{-- @section('scripts')

<script src="{{ asset('js/calendar.js') }}" defer></script>
@endsection --}}
