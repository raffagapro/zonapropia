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
            <div class="form-group row">
              {{-- Ciudad --}}
              <div class="col-4">
                <input type="text" name="ciudad" class="form-control @error('ciudad') is-invalid @enderror" placeholder="Ciudad" value="">
                @error('ciudad')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
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
              {{-- Region --}}
              <div class="col-4">
                <select class="form-control" name="region">
                  <option disabled selected>Region</option>
                  @foreach ($regions as $region)
                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              {{-- Longitud --}}
              <div class="col-4">
                <input type="text" name="longitud" class="form-control @error('longitud') is-invalid @enderror" placeholder="Longitud" value="">
                @error('longitud')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- Latitud --}}
              <div class="col-4">
                <input type="text" name="latitud" class="form-control @error('latitud') is-invalid @enderror" placeholder="Latitud" value="">
                @error('latitud')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- Inmobiliarias --}}
              <div class="col-4">
                <select class="form-control" name="role">
                  <option  value=0 selected>Inmobiliaria</option>
                  @foreach ($inmos as $inmo)
                    <option value="{{ $inmo->id }}">{{ $inmo->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              {{-- Categories --}}
              <div class="col-4">
                <select class="form-control" name="role">
                  <option  value=0 disabled selected>Categoria</option>
                  @foreach ($cats as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                  @endforeach
                </select>
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
              {{-- Latitud --}}
              <div class="col-4">
                <input type="text" name="latitud" class="form-control @error('latitud') is-invalid @enderror" placeholder="Latitud" value="">
                @error('latitud')
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
            {{-- File --}}
            <div class="form-group row">
              <div class="col-4">
                <input
                  type="file"
                  class="form-control-file @error('logo') is-invalid @enderror"
                  data-default-file="url_of_your_file"
                  name="logo"/>
                @error('logo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="col mt4">
                <input class="form-check-input" type="checkbox" value=1 name="destacar">
                <label class="form-check-label" for="defaultCheck1">
                  Destacar en barra de logos.
                </label>
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
