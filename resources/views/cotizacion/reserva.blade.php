@extends('layouts.app')
@section('title', 'Reserva')


@section('content')
  @include('cotizacion.bannerRes')
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
                <div class="newProfileBtn bg-main-color text-light">
                    <span style="font-size: 20px" >2</span>
                </div>
                <small class="main-color">Reserva</small>
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

        {{-- tipologia & info  --}}
        <div class="row mt-5 align-items-center">
            {{--  left   --}}
            <div class="col-4">
                <img src="{{ asset('/assets/images/mini-floorplan-sample.png') }}" alt="">
            </div>
            {{--  middle   --}}
            <div class="col-4 pb-3">
                <h4 class="mb-5">Producto Parque del Sur</h4>
                <small style="font-size: 16px">Inmobiliaria Icuadra</small><br>
                <small style="font-size: 16px">2 dormitorios 1 baños</small><br>
                <small style="font-size: 16px">Unidad B2-106</small>
                <p class="mt-5" style="font-size: 20px"><span class="main-color">Precio:</span><b> $101,274.3</b></p>
            </div>
            {{--  right   --}}
            <div class="col-4 pb-3">
                <div class="card bg-disable">
                    <div class="card-body">
                        <div class="row">
                            <div class="col"><b>Carrito</b></div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-6 text-left" style="margin-bottom: 0">Subtotal</div>
                            <div class="col-6 text-right" style="margin-bottom: 0">$10.000.000</div>
                        </div>
                        <hr style="margin: 0">
                        <div class="row mt-1">
                            <div class="col">Selecciona el meto de pago</div>
                        </div>
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Tarjeta de débito
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                Tarjeta de crédito 
                            </label>
                          </div>
                        <button type="button" class="btn btn-sm btn-block bg-main-color text-light pl-5 pr-5 mt-4">Pagar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
  </div>
@endsection

@section('scripts')
  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
  <script src="{{ asset('js/ajax/proyect.js') }}" ></script>
  {{-- <script src="{{ asset('js/calendar.js') }}" defer></script> --}}
@endsection
