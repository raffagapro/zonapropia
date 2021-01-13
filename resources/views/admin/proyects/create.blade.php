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
              <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" placeholder="Nombre" value="">
              @error('nombre')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            {{-- Direccion --}}
            <div class="form-group">
              <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror" placeholder="Dirección" value="">
              @error('direccion')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            {{-- Reg/Comuna/ciudad --}}
            <div class="form-group row">
              {{-- Region --}}
              <div class="col-4">
                <select class="form-control" name="region">
                  <option disabled selected>Region</option>
                  @foreach ($regions as $region)
                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                  @endforeach
                </select>
              </div>
              {{-- Comuna --}}
              <div class="col-4">
                <input type="text" name="comuna" class="form-control @error('comuna') is-invalid @enderror" placeholder="Comuna" value="">
                @error('comuna')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- Ciudad --}}
              <div class="col-4">
                <input type="text" name="ciudad" class="form-control @error('ciudad') is-invalid @enderror" placeholder="Ciudad" value="">
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
                <input type="text" name="latitud" class="form-control @error('latitud') is-invalid @enderror" placeholder="Latitud" value="">
                @error('latitud')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- Longitud --}}
              <div class="col-4">
                <input type="text" name="longitud" class="form-control @error('longitud') is-invalid @enderror" placeholder="Longitud" value="">
                @error('longitud')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- Inmobiliarias --}}
              <div class="col-4">
                <select class="form-control" name="inmo">
                  <option  value=0 selected>Inmobiliaria</option>
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
                <select class="form-control" name="cat">
                  <option  value=0 disabled selected>Categoria</option>
                  @foreach ($cats as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                  @endforeach
                </select>
              </div>
              {{-- Cuota Monto --}}
              <div class="col-4">
                <input type="text" name="cuotaMonto" class="form-control @error('cuotaMonto') is-invalid @enderror" placeholder="Cuota Monto" value="">
                @error('cuotaMonto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- Bono Pie Monto --}}
              <div class="col-4">
                <input type="text" name="bonoPieMonto" class="form-control @error('bonoPieMonto') is-invalid @enderror" placeholder="Bono Pie Monto" value="">
                @error('bonoPieMonto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            {{-- descripcion --}}
            <div class="form-group">
              <textarea class="form-control" name="descripcion" rows="3" placeholder="Descripcion del proyecto"></textarea>
            </div>
            {{-- texto descatado --}}
            <div class="form-group">
              <textarea class="form-control" name="textoDestacado" rows="3" placeholder="Texto destacado"></textarea>
            </div>
            {{-- Texto Proyecto --}}
            <div class="form-group">
              <textarea class="form-control" name="textoProyecto" rows="3" placeholder="Texto del proyecto"></textarea>
            </div>
            {{-- terms --}}
            <div class="form-group">
              <textarea class="form-control" name="terminos" rows="3" placeholder="Terminos"></textarea>
            </div>
            {{-- date/estado/destacado--}}
            <div class="form-group row">
              {{-- fecha limite --}}
              <div class="col-4">
                <input
                  type="text"
                  name="fechaLimite"
                  class="form-control @error('fechaLimite') is-invalid @enderror"
                  placeholder="Fecha Limite" value=""
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
                <select class="form-control" name="status">
                  <option disabled selected>Status</option>
                  <option value=0>Borrador</option>
                  <option value=1>Publicado</option>
                </select>
              </div>
              {{-- Destacado --}}
              <div class="col-4">
                <select class="form-control" name="destacar">
                  <option disabled selected>Destacar</option>
                  <option value=0>No</option>
                  <option value=1>Si</option>
                </select>
              </div>
            </div>
            {{-- rooms/bath/MC--}}
            <div class="form-group row">
              {{-- Room Min --}}
              <div class="col-2">
                <input
                  type="number"
                  name="minRoom"
                  min="0"
                  class="form-control @error('minRoom') is-invalid @enderror"
                  placeholder="Dorms Min." value=""
                >
                @error('minRoom')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- Room Max --}}
              <div class="col-2">
                <input
                  type="number"
                  name="maxRoom"
                  min="0"
                  class="form-control @error('maxRoom') is-invalid @enderror"
                  placeholder="Dorms Max" value=""
                >
                @error('maxRoom')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- Bath Min --}}
              <div class="col-2">
                <input
                  type="number"
                  name="minBath"
                  min="0"
                  class="form-control @error('minBath') is-invalid @enderror"
                  placeholder="Baño Min" value=""
                >
                @error('minBath')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- Bath Max --}}
              <div class="col-2">
                <input
                  type="number"
                  name="maxBath"
                  min="0"
                  class="form-control @error('maxBath') is-invalid @enderror"
                  placeholder="Baño Max" value=""
                >
                @error('maxBath')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- MC Min --}}
              <div class="col-2">
                <input
                  type="number"
                  name="minMC"
                  min="0"
                  class="form-control @error('minMC') is-invalid @enderror"
                  placeholder="m² Min" value=""
                >
                @error('minMC')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- MC Max --}}
              <div class="col-2">
                <input
                  type="number"
                  name="maxMC"
                  min="0"
                  class="form-control @error('maxMC') is-invalid @enderror"
                  placeholder="m² Max" value=""
                >
                @error('maxMC')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            <button type="submit" class="btn bg-main-color navBar-btn text-light float-right mb-3">Agregar</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  @if(session('status'))
    <x-sweet-alert-admin :message="session('status')"/>
  @endif
  {{-- <script type="text/javascript">
    console.log(document.getElementsByClassName('dropify'));
    document.getElementsByClassName('dropify').dropify();
  </script> --}}
@endsection
