@extends('layouts.adminDashboard')
@section('title', 'Editar Tipologia')

@section('content')
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">

      {{-- Title --}}
      <div class="row align-items-center">
        <h2 class="card-title mb-section-card-title">Editar Tipologia: {{$tipo->modelo}}&nbsp</h2>
        <a
          href="{{ route('unidad.edit', $tipo->unidad->id) }}"
          class="border-left mt-3 td-none"
          >
          &nbsp Regresar a Unidad - {{$tipo->unidad->modelo }}.
        </a>
      </div>

      {{-- General info form --}}
      <div class="card mb-section-card">
        {{-- Title --}}
        <h4 class="card-title mb-section-card-title mt-1 mb-4">Información general</h4>
        {{-- General info --}}
        <div class="container">
          <form action="{{ route('tipo.update', $tipo->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="unidad" value="{{ $tipo->unidad->id }}">
            {{-- modelo --}}
            <div class="form-group">
              <label for="titulo">Titulo</label>
              <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror" value="{{ $tipo->titulo }}">
              @error('modelo')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            {{-- Media --}}
            <div class="form-group">
              <label for="media">Imagen (552x552px, 1MB max)</label><br>
              @if ($tipo->media !== null)
                <img src="{{ asset($tipo->media) }}" alt="">
              @else
                <h1>Sin imagen en registro.</h1>
              @endif
              <input
                type="file"
                class="form-control-file @error('media') is-invalid @enderror"
                data-default-file="url_of_your_file"
                name="media"/>
              @error('media')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <button type="submit" class="btn bg-main-color navBar-btn text-light float-right mb-3">Actualizar Tipologia</button>
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
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
  <script src="{{ asset('js/ajax/regionSwitcherCreate.js') }}" ></script>
@endsection --}}
