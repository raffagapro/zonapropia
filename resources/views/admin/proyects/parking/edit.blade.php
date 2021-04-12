@extends('layouts.adminDashboard')
@section('title', 'Editar Estacionamiento')

@section('content')
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">

      {{-- Title --}}
      <div class="row align-items-center">
        <h2 class="card-title mb-section-card-title">Editar Estacionamiento: {{$pSpot->name}}&nbsp</h2>
        <a href="{{ route('aProyect.edit', $pSpot->proyecto->id) }}" class="border-left mt-3 td-none">&nbsp Regresar a Proyecto.</a>
      </div>

      {{-- General info form --}}
      <div class="card mb-section-card">
        {{-- Title --}}
        <h4 class="card-title mb-section-card-title mt-1 mb-4">Información general</h4>
        {{-- General info --}}
        <div class="container">
          <form action="{{ route('estacionamiento.update', $pSpot->id) }}" method="POST">
            @csrf
            @method('PUT')
            {{-- bombre/piso/estatus --}}
            <div class="form-group row">
              <div class="col-8">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ $pSpot->name }}">
                @error('nombre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- piso  --}}
              <div class="col-2">
                <label for="piso">Piso</label>
                  <input type="number" min="1" name="piso" class="form-control @error('piso') is-invalid @enderror" value="{{ $pSpot->piso }}">
                @error('piso')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- status  --}}
              <div class="col-2">
                <label for="status">Status</label>
                <select class="form-control" name="status">
                  <option disabled>Status</option>
                  <option value=0 @if ((int)$pSpot->status === 0) selected @endif>Ocupado</option>
                  <option value=1 @if ((int)$pSpot->status === 1) selected @endif>Disponible</option>
                </select>
                @error('status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

            </div>
            <div class="form-group row">
              {{-- unidades  --}}
              <div class="col">
                <label for="unidad">Unidad</label>
                <select class="form-control" name="unidad">
                  <option selected disabled>Seleccionar Unidad</option>
                  @if ($pSpot->unidad)
                    <option value=0>Sin Unidad</option>
                  @endif
                  @foreach ($pSpot->proyecto->unidades as $unidad)
                    @if ($pSpot->unidad)
                      <option value="{{ $unidad->id }}" @if ((int)$pSpot->unidad->id  === (int)$unidad->id) selected @endif>{{ $unidad->modelo }}</option> 
                    @else
                      <option value="{{ $unidad->id }}">{{ $unidad->modelo }}</option>   
                    @endif
                  @endforeach                  
                </select>
                @error('status')
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

@section('scripts')
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
  <script src="{{ asset('js/ajax/proyectSwitcherEdit.js') }}" ></script>
@endsection
