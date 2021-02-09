@extends('layouts.adminDashboard')
@section('title', 'Editar Unidad')

@section('content')
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">

      {{-- Title --}}
      <div class="row align-items-center">
        <h2 class="card-title mb-section-card-title">Editar Unidad: {{$unidad->label}}&nbsp</h2>
        <a
          href="javascript:void(0);"
          class="border-left mt-3 td-none"
          onclick="event.preventDefault(); document.getElementById('{{ 'unidadesPro'.$unidad->proyecto->id }}').submit();"
          >
          &nbsp Regresar a Unidades - {{$unidad->proyecto->name}}.
        </a>
        <form id="{{ 'unidadesPro'.$unidad->proyecto->id }}"
          action="{{ route('unidad.zIndex', $unidad->proyecto->id) }}"
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
          <form action="{{ route('unidad.update', $unidad->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="proyect_id" value="{{ $unidad->proyecto->id }}">
            {{-- Label --}}
            <div class="form-group">
              <label for="label">Etiqueta</label>
              <input type="text" name="label" class="form-control @error('label') is-invalid @enderror" value="{{ $unidad->label }}">
              @error('label')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
              
            {{-- status/tipologia --}}
            <div class="form-group row">
              {{-- status --}}
              <div class="col-6">
                <label for="nombre">Status</label>
                <select class="form-control" name="status" value="{{ old('status') }}">
                  <option value=0 @if ((int)$unidad->status === 0) selected @endif>Inhabilitada</option>
                  <option value=1 @if ((int)$unidad->status === 1) selected @endif>Disponible</option>
                  <option value=2 @if ((int)$unidad->status === 2) selected @endif>Reservada</option>
                  <option value=3 @if ((int)$unidad->status === 3) selected @endif>Promesada</option>
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
                  <option value=0 @if ($unidad->tipografia === null) selected @endif>Sin tipologia</option>
                  @foreach ($proyecto->tipografias as $tipo)
                    @if ($unidad->tipografia === null)
                      <option value={{ $tipo->id }} >{{ $tipo->modelo }}</option>  
                    @else
                      <option value={{ $tipo->id }} @if ((int)$unidad->tipografia->id === $tipo->id ) selected @endif>{{ $tipo->modelo }}</option> 
                    @endif
                  @endforeach
                </select>
                @error('tipologia')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            <button type="submit" class="btn bg-main-color navBar-btn text-light float-right mb-3">Actualizar Unidad</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  @if(session('status'))
    <x-sweet-alert-admin :message="session('status')"/>
  @endif
  @isset($status)
    <x-sweet-alert-admin :message="$status"/>
  @endisset
@endsection

{{-- @section('scripts')
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
  <script src="{{ asset('js/ajax/regionSwitcherCreate.js') }}" ></script>
@endsection --}}
