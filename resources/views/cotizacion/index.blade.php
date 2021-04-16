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
      <div class="row mt-5">
        <div class="col-6">
          <h4 class="b-border pb-3">&nbsp&nbspDetalles de la Unidad</h4>
        </div>
        <div class="col-6 text-right">
          <button type="button" class="btn btn-sm bg-main-color text-light pl-5 pr-5">Reserva Online</button>
        </div>
      </div>

      {{-- tipologia & info  --}}
      <div class="row align-items-end">
        <div class="col-4">
          <img src="{{ asset('/assets/images/mini-floorplan-sample.png') }}" alt="">
        </div>
        <div class="col-8 pb-3">
          {{-- unidad  --}}
          <div class="row">
            <div class="col-6 text-left">
              <h5 style="margin-bottom: 0"><b>Unidad</b></h5>
            </div>
            <div class="col-6 text-right">
              <p class="text-right" style="margin-bottom: 0">{{ $cotizacion->proyecto->name.", Unidad:".$cotizacion->unidad->modelo }}</p>
            </div>
          </div>
          <hr style="margin: 0">

          {{-- Orientación  --}}
          <div class="row mt-1">
            <div class="col-6 text-left">
              <h5 style="margin-bottom: 0"><b>Orientación</b></h5>
            </div>
            <div class="col-6 text-right">
              @switch($cotizacion->unidad->orientacion)
                  @case(1)
                    <p class="text-right" style="margin-bottom: 0">Sur Poniente</p>
                    @break
                  @case(2)
                    <p class="text-right" style="margin-bottom: 0">Nor Oriente</p>
                    @break
                  @default
                    <p class="text-right" style="margin-bottom: 0">Sin Orientacion</p>
              @endswitch
            </div>
          </div>
          <hr style="margin: 0">

          {{-- Dormitorios  --}}
          <div class="row mt-1">
            <div class="col-6 text-left">
              <h5 style="margin-bottom: 0"><b>Dormitorios</b></h5>
            </div>
            <div class="col-6 text-right">
              <p class="text-right" style="margin-bottom: 0">{{ $cotizacion->unidad->dormitorios }}</p>
            </div>
          </div>
          <hr style="margin: 0">

          {{-- Baños  --}}
          <div class="row mt-1">
            <div class="col-6 text-left">
              <h5 style="margin-bottom: 0"><b>Baños</b></h5>
            </div>
            <div class="col-6 text-right">
              <p class="text-right" style="margin-bottom: 0">{{ $cotizacion->unidad->banos }}</p>
            </div>
          </div>
          <hr style="margin: 0">

          {{-- M. municipal  --}}
          <div class="row mt-1">
            <div class="col-6 text-left">
              <h5 style="margin-bottom: 0"><b>M. municipal</b></h5>
            </div>
            <div class="col-6 text-right">
              <p class="text-right" style="margin-bottom: 0">{{ $cotizacion->unidad->superficie_municipal }}m<sup>2</sup></p>
            </div>
          </div>
          <hr style="margin: 0">

          {{-- M.totales --}}
          <div class="row mt-1">
            <div class="col-6 text-left">
              <h5 style="margin-bottom: 0"><b>M.totales</b></h5>
            </div>
            <div class="col-6 text-right">
              <p class="text-right" style="margin-bottom: 0">{{ $cotizacion->unidad->superficie_total }}m<sup>2</sup></p>
            </div>
          </div>
          <hr style="margin: 0">

        </div>
      </div>

      {{-- title & subtitle --}}
      <div class="row align-items-end mt-5">
        <div class="col-6">
          <h4>Detalles comercial</h4>
          <h5>Precio desde</h5>
        </div>
        <div class="col-6 text-right">
          <h5 class="main-color">UF {{ $cotizacion->unidad->precio_venta }}</h5>
        </div>
      </div>
      <hr style="margin: 0">

      {{-- Simulacion de pago --}}
      <div class="mt-5">
        <h4>Simulación de pago</h4>
        <table class="table table-sm">
          <thead class="thead-light">
            <tr>
              <th scope="col">Item</th>
              <th scope="col">UF</th>
              <th scope="col">Precio</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">Ahorro mínimo</th>
              <td>80</td>
              <td>2.291.366</td>
            </tr>
            <tr>
              <th scope="row">Subsidio base</th>
              <td>125</td>
              <td>3.580.259</td>
            </tr>
            <tr>
              <th scope="row">Bono captación</th>
              <td>50</td>
              <td>1.432.104</td>
            </tr>
            <tr>
              <th scope="row">Bono integración</th>
              <td>250</td>
              <td>7.160.518</td>
            </tr>
            <tr>
              <th scope="row">Precio propiedad</th>
              <td>2010</td>
              <td>57.570.561</td>
            </tr>
            <tr>
              <th scope="row">Total del beneﬁcio</th>
              <td>-505</td>
              <td>-14.464.245</td>
            </tr>
            <tr>
              <th scope="row">Crédito Hipotecario</th>
              <td>1505</td>
              <td>43.106.315</td>
            </tr>
          </tbody>
        </table>
      </div>

      {{-- Simulación de dividendo --}}
      <div class="mt-5">
        <h4>Simulación de dividendo</h4>
        <table class="table table-sm">
          <thead class="thead-light">
            <tr>
              <th scope="col">tasa/años</th>
              <th scope="col">15</th>
              <th scope="col">20</th>
              <th scope="col">25</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">3.5%</th>
              <td>215.800</td>
              <td>207.564</td>
              <td>193.564</td>
            </tr>
            <tr>
              <th scope="row">4.0%</th>
              <td>227.531</td>
              <td>202.450</td>
              <td>205.796</td>
            </tr>
            <tr>
              <th scope="row">4.5%</th>
              <td>239.599</td>
              <td>210.000</td>
              <td>218.413</td>
            </tr>
            <tr>
              <th scope="row">5.0%</th>
              <td>257.800</td>
              <td>190.000</td>
              <td>215.800</td>
            </tr>
          </tbody>
        </table>
      </div>

      {{-- left btns  --}}
      <div class="text-right mt-5">
        <button type="button" class="btn btn-sm main-color pl-5 pr-5 mr-3">
          <img src="/assets/images/logos/bci-logo.png" style="height: .8rem;" class="mb-1">
          &nbsp&nbspPre aprobación
        </button>
        <button type="button" class="btn btn-sm bg-main-color text-light pl-5 pr-5" data-toggle="modal" data-target="#cotizadorModal">Seguir cotizando</button>
      </div>
      


    </div>
  </div>

  {{-- cotizador Modal --}}
  <div class="modal fade" id="cotizadorModal" tabindex="-1" aria-labelledby="cotizadorModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body">
          <div class="row cotizador-modal-container">
            <div class="col-12 text-center">
              <h4 style="text-center"><b>Cotiza o Reserva Online</b></h4>
            </div>
            {{-- from --}}
            <div class="col-12 mt-4">
              <form>
                  <div class="form-row">
                      {{-- Tipologias  --}}
                      <div class="col-md-6 mb-3">
                          <select class="form-control" name="tipologia" id="tipologia">
                              <option selected disabled>Tipologias</option> 
                              {{--  @foreach ($proyect->getTipologias2() as $t2)
                                  <option value="{{ $t2[1][0].','.$t2[1][1] }}">{{ $t2[0] }}</option> 
                              @endforeach  --}}
                          </select>
                      </div>

                      {{-- modelo  --}}
                      <div class="col-md-6 mb-3">
                          <select class="form-control" id="model" name="model">
                              <option selected disabled>Modelo</option>
                              {{--  @foreach ($proyect->unidades as $unidad)
                                  <option value="{{ $unidad->id }}">{{ $unidad->modelo }}</option> 
                              @endforeach  --}}
                          </select>
                      </div>

                      {{-- orientacion --}}
                      <div class="col-md-6 mb-3">
                          <select class="form-control" id="orientacion" name="orientacion">
                              <option selected disabled>Orientacion</option> 
                              <option value=0 >Sin Orientación</option>
                              <option value=1 >Sur Poniente</option>
                              <option value=2 >Nor Oriente</option>
                          </select>
                      </div>
                      
                      {{-- Piso --}}
                      <div class="col-md-6 mb-3">
                          <select class="form-control" id="piso" name="piso">
                              <option selected disabled>Piso</option>
                              {{--  @foreach ($proyect->getPisos() as $p)
                                  <option value="{{ $p }}">{{ $p }}</option> 
                              @endforeach  --}}
                          </select>
                      </div>

                      {{-- Rut --}}
                      <div class="col-md-6 mb-3" id="rutCont" style="display: none">
                          <input type="text" class="form-control mb-contact-from-input" name="rut" placeholder="¿Cuál es tu rut?">
                      </div>

                      {{-- Nombre Completo --}}
                      <div class="col-md-6 mb-3" id="nameCont" style="display: none">
                          <input type="text" class="form-control mb-contact-from-input" name="nombre" placeholder="Nombre completo">
                      </div>

                      {{-- telefono --}}
                      <div class="col-md-6 mb-3" id="phoneCont" style="display: none">
                          <input type="text" class="form-control mb-contact-from-input" name="phone" placeholder="Teléfono">
                      </div>

                      {{-- telefono --}}
                      <div class="col-md-6 mb-3" id="emailCont" style="display: none">
                          <input type="text" class="form-control mb-contact-from-input" name="email" placeholder="¿Cuál es tu email?">
                      </div>

                      <div class="col mt-4">
                          <div class="text-center mb-2" id="errorCont" style="display: none">
                              <i class="fas fa-exclamation-circle text-danger"></i>
                              <small class="text-danger text-center">¡Necesitas seleccionar un modelo!</small>
                          </div>
                          <input type="hidden" id="unidadId">
                          <div class="row">
                            <div class="col-6">
                              <button id="contBtn" class="btn btn-block bg-main-color general-btn">Continuar</button>
                              <button type="submit" id="sendCotBtn" class="btn btn-block bg-main-color general-btn" style="display: none">Enviar Cotizacion</button>
                            </div>

                            <div class="col-6">
                              <a href="{{ route('cotizacion.reserva')}}" class="btn btn-block bg-main-color general-btn">Reserva Online</a>
                              {{--  <button id="reserva" class="btn btn-block bg-main-color general-btn">Reserva Online</button>  --}}
                            </div>
                          </div>
                      </div>
                  </div>
              </form>
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
