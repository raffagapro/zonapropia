@extends('layouts.app')
@section('title', 'Cotizacion')


@section('content')
  @include('cotizacion.banner')
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">
      {{-- number bar --}}
      <div class="card">
        <div class="card-body">
          <div class="row justify-content-center">
            <div class="col-1 justify-content-center">
              <div class="newProfileBtn bg-main-color text-light">
                <span style="font-size: 20px" >1</span>
              </div>
              <small class="main-color">Cotización</small>
            </div>
            <div class="col-3 justify-content-center"><hr></div>
            <div class="col-1 justify-content-center">
              <div class="newProfileBtn bg-disable text-light">
                <span style="font-size: 20px" >2</span>
              </div>
              <small class="color-disable">Reserva</small>
            </div>
            <div class="col-3 justify-content-center"><hr></div>
            <div class="col-1 justify-content-center">
              <div class="newProfileBtn bg-disable text-light">
                <span style="font-size: 20px" >3</span>
              </div>
              <small class="color-disable"">Promesa</small>
            </div>
          </div>
        </div>
      </div>

      {{-- title & reserva btn --}}
      <div class="row mt-5 align-items-center">
        <div class="col-6">
          <img src="{{ asset('/assets/images/success-img.png') }}" style="width: auto; height: 350px" alt="">
        </div>
        <div class="col-6">
          <h2 class="text-secondary">Su Reserva<br> a sido realizada con éxito </h2>
          <p>Para continuar con la promesa presione el botón</p>
          <a href="{{ route('userProfile.index') }}" class="btn btn-sm btn-block bg-main-color text-light pl-5 pr-5">Cotizaciones</a>
        </div>
      </div>

    </div>
  </div>

@endsection
