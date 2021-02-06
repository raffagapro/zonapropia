@extends('layouts.adminDashboard')
@section('title', 'Agregar Unidad')

@section('content')
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">

      {{-- Title --}}
      <div class="row align-items-center">
        <h2 class="card-title mb-section-card-title">Agregar Unidad&nbsp</h2>
        <a
          href="javascript:void(0);"
          class="border-left mt-3 td-none"
          onclick="event.preventDefault(); document.getElementById('{{ 'unidadesPro'.$proyecto->id }}').submit();"
          >
          &nbsp Regresar a Unidades - {{$proyecto->name}}.
        </a>
        <form id="{{ 'unidadesPro'.$proyecto->id }}"
          action="{{ route('unidad.zIndex', $proyecto->id) }}"
          method="Post"
          style="display: none;"
          >@csrf
        </form>
      </div>

      {{-- General info form --}}
      <div class="card mb-section-card">
        {{-- Title --}}
        <h4 class="card-title mb-section-card-title mt-1 mb-4">Información general</h4>
        {{-- General info --}}
        <div class="container">
          <form action="{{ route('unidad.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="proyect_id" value="{{ $proyecto->id }}">
            {{-- label --}}
            <div class="form-group">
              <label for="label">Etiqueta</label>
              <input type="text" name="label" class="form-control @error('label') is-invalid @enderror" value="{{ old('label') }}">
              @error('label')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- status / tipologia --}}
            <div class="form-group row">
              {{-- status --}}
              <div class="col-6">
                <label for="nombre">Status</label>
                <select class="form-control" name="status" value="{{ old('status') }}">
                  <option value=0 @if ((int)old('status') === 0) selected @endif>Inhabilitada</option>
                  <option value=1 @if ((int)old('status') === 1) selected @endif>Disponible</option>
                  <option value=2 @if ((int)old('status') === 2) selected @endif>Reservada</option>
                  <option value=3 @if ((int)old('status') === 3) selected @endif>Promesada</option>
                </select>
                @error('status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- tipologias --}}
              <div class="col-6">
                <label for="tipologia">Tipologias</label>
                <select class="form-control" name="tipologia" value="{{ old('tipologia') }}">
                  <option value=0 @if ((int)old('tipologia') === 0) selected @endif>Sin tipologia</option>
                  @foreach ($proyecto->tipografias as $tipo)
                    <option value={{ $tipo->id }} @if ((int)old('tipologia') === $tipo->id ) selected @endif>{{ $tipo->modelo }}</option> 
                  @endforeach
                </select>
                @error('status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            <button type="submit" class="btn bg-main-color navBar-btn text-light float-right mb-3">Agregar Unidad</button>
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
