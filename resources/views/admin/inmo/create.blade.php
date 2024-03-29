@extends('layouts.adminDashboard')
@section('title', 'Agregar Inmobiliaria')

@section('content')
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">

      {{-- Title --}}
      <div class="row align-items-center">
        <h2 class="card-title mb-section-card-title">Agregar Inmobiliaria&nbsp</h2>
        <a href="{{ route('inmo.index') }}" class="border-left mt-3 td-none">&nbsp Regresar a Inmobiliarias.</a>
      </div>

      {{-- General info form --}}
      <div class="card mb-section-card">
        {{-- Title --}}
        <h4 class="card-title mb-section-card-title mt-1 mb-4">Información general</h4>
        {{-- General info --}}
        <div class="container">
          <form action="{{ route('inmo.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- nombre  --}}
            <div class="form-group">
              <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" placeholder="Nombre" value="">
              @error('nombre')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
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
