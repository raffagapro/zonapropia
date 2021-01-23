@extends('layouts.adminDashboard')
@section('title', 'Agregar Proyecto')

@section('content')
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">

      {{-- Title --}}
      <div class="row align-items-center">
        <h2 class="card-title mb-section-card-title">Agregar Proyecto&nbsp</h2>
        <a href="{{ route('aProyect.index') }}" class="border-left mt-3 td-none">&nbsp Regresar a Proyectos.</a>
      </div>

      {{-- General info form --}}
      <div class="card mb-section-card">
        {{-- Title --}}
        <h4 class="card-title mb-section-card-title mt-1 mb-4">Información general</h4>
        {{-- General info --}}
        <div class="container">
          <form action="{{ route('aProyect.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- Nombre --}}
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="">
              @error('nombre')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            {{-- Direccion --}}
            <div class="form-group">
              <label for="direccion">Dirección</label>
              <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror" value="">
              @error('direccion')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            {{-- Reg/Comuna/ciudad --}}
            <div class="form-group row">
              {{-- Region --}}
              <div class="col-3">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <label for="region">Region</label>
                <select class="form-control" name="region" id="region">
                  @foreach ($regions as $region)
                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                  @endforeach
                </select>
              </div>
              {{-- Provincia --}}
              <div class="col-3">
                <label for="provincia">Provincia</label>
                <select class="form-control" name="provincia" id="provincia">
                  @foreach ($regions[0]->provincias as $provincia)
                    <option value="{{ $provincia->id }}">{{ $provincia->name }}</option>
                  @endforeach
                </select>
              </div>
              {{-- Comuna --}}
              <div class="col-3">
                <label for="comuna">Comuna</label>
                <select class="form-control" name="comuna" id="comuna">
                  @foreach ($regions[0]->provincias[0]->comunas as $comuna)
                    <option value="{{ $comuna->id }}">{{ $comuna->name }}</option>
                  @endforeach
                </select>
              </div>
              {{-- Ciudad --}}
              <div class="col-3">
                <label for="ciudad">Ciudad</label>
                <input type="text" name="ciudad" class="form-control @error('ciudad') is-invalid @enderror" value="">
                @error('ciudad')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            {{-- long/lat/inmo --}}
            <div class="form-group row">
              {{-- Latitud --}}
              <div class="col-4">
                <label for="latitud">Latitud</label>
                <input type="text" name="latitud" class="form-control @error('latitud') is-invalid @enderror" value="">
                @error('latitud')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- Longitud --}}
              <div class="col-4">
                <label for="longitud">Longitud</label>
                <input type="text" name="longitud" class="form-control @error('longitud') is-invalid @enderror" value="">
                @error('longitud')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- Inmobiliarias --}}
              <div class="col-4">
                <label for="inmo">Inmobiliaria</label>
                <select class="form-control" name="inmo">
                  <option value=0>Sin Inmobiliaria</option>
                  @foreach ($inmos as $inmo)
                    <option value="{{ $inmo->id }}">{{ $inmo->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            {{-- cat/cuota/bono pie --}}
            <div class="form-group row">
              {{-- Categories --}}
              <div class="col-4">
                <label for="cat">Categoria</label>
                <select class="form-control" name="cat">
                  @foreach ($cats as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                  @endforeach
                </select>
              </div>
              {{-- Cuota Monto --}}
              <div class="col-4">
                <label for="cuotaMonto">Cuota Monto</label>
                <input type="text" name="cuotaMonto" class="form-control @error('cuotaMonto') is-invalid @enderror" value="">
                @error('cuotaMonto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- Bono Pie Monto --}}
              <div class="col-4">
                <label for="bonoPieMonto">Bono Pie Monto</label>
                <input type="text" name="bonoPieMonto" class="form-control @error('bonoPieMonto') is-invalid @enderror" value="">
                @error('bonoPieMonto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            {{-- date/estado/destacado--}}
            <div class="form-group row">
              {{-- fecha limite --}}
              <div class="col-4">
                <label for="fechaLimite">Fecha Limite</label>
                <input
                  type="text"
                  name="fechaLimite"
                  class="form-control @error('fechaLimite') is-invalid @enderror"
                  onfocus="(this.type='date')"
                  onblur="(this.type='text')"
                >
                @error('fechaLimite')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- Status --}}
              <div class="col-4">
                <label for="status">Status</label>
                <select class="form-control" name="status">
                  <option value=0>Borrador</option>
                  <option value=1>Publicado</option>
                </select>
              </div>
              {{-- Destacado --}}
              <div class="col-4">
                <label for="destacar">Destacar</label>
                <select class="form-control" name="destacar">
                  <option value=0>No</option>
                  <option value=1>Si</option>
                </select>
              </div>
            </div>
            {{-- fecha_entrega/etapa_venta/seguridad--}}
            <div class="form-group row">
              {{-- fecha_entrega --}}
              <div class="col-4">
                <label for="fecha_entrega">Fecha Entrega</label>
                <input
                  type="text"
                  name="fecha_entrega"
                  class="form-control @error('fecha_entrega') is-invalid @enderror"
                  value=""
                  onfocus="(this.type='date')"
                  onblur="(this.type='text')"
                >
                @error('fecha_entrega')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- etapa_venta --}}
              <div class="col-4">
                <label for="etapa_venta">Etapa de Venta</label>
                <select class="form-control" name="etapa_venta">
                  <option value=1 >Etapa 1</option>
                  <option value=2 >Etapa 2</option>
                  <option value=3 >Etapa 3</option>
                </select>
              </div>
              {{-- seguridad --}}
              <div class="col-4">
                <label for="seguridad">Seguridad</label>
                <select class="form-control" name="seguridad">
                  <option value=1 >Baja</option>
                  <option value=2 >Media</option>
                  <option value=3 >Alta</option>
                </select>
              </div>
            </div>
            {{-- rooms/bath/MC--}}
            <div class="form-group row">
              {{-- Room Min --}}
              <div class="col-2">
                <label for="minRoom">Dorms Min.</label>
                <input
                  type="number"
                  name="minRoom"
                  min="0"
                  class="form-control @error('minRoom') is-invalid @enderror"
                >
                @error('minRoom')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- Room Max --}}
              <div class="col-2">
                <label for="maxRoom">Dorms Max.</label>
                <input
                  type="number"
                  name="maxRoom"
                  min="0"
                  class="form-control @error('maxRoom') is-invalid @enderror"
                >
                @error('maxRoom')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- Bath Min --}}
              <div class="col-2">
                <label for="minBath">Baño Min.</label>
                <input
                  type="number"
                  name="minBath"
                  min="0"
                  class="form-control @error('minBath') is-invalid @enderror"
                >
                @error('minBath')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- Bath Max --}}
              <div class="col-2">
                <label for="maxBath">Baño Max.</label>
                <input
                  type="number"
                  name="maxBath"
                  min="0"
                  class="form-control @error('maxBath') is-invalid @enderror"
                >
                @error('maxBath')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- MC Min --}}
              <div class="col-2">
                <label for="minMC">m² Min.</label>
                <input
                  type="number"
                  name="minMC"
                  min="0"
                  class="form-control @error('minMC') is-invalid @enderror"
                >
                @error('minMC')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- MC Max --}}
              <div class="col-2">
                <label for="maxMC">m² Max.</label>
                <input
                  type="number"
                  name="maxMC"
                  min="0"
                  class="form-control @error('maxMC') is-invalid @enderror"
                >
                @error('maxMC')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            {{-- descripcion --}}
            <div class="form-group">
              <label for="descripcion">Descripcion del proyecto</label>
              <textarea class="form-control" name="descripcion" rows="3"></textarea>
            </div>
            {{-- texto descatado --}}
            <div class="form-group">
              <label for="textoDestacado">Texto destacado</label>
              <textarea class="form-control" name="textoDestacado" rows="3"></textarea>
            </div>
            {{-- Texto Proyecto --}}
            <div class="form-group">
              <label for="textoProyecto">Texto del proyecto</label>
              <textarea class="form-control" name="textoProyecto" rows="3"></textarea>
            </div>
            {{-- terms --}}
            <div class="form-group">
              <label for="terminos">Terminos</label>
              <textarea class="form-control" name="terminos" rows="3"></textarea>
            </div>
            <button type="submit" class="btn bg-main-color navBar-btn text-light float-right mb-3">Agregar Proyecto</button>
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
  <script src="{{ asset('js/ajax/regionSwitcherCreate.js') }}" ></script>
@endsection
