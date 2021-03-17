@extends('layouts.app')

@section('title', 'Financiamiento')

@section('content')
  @include('respaldo.banner')

  <div class="container mb-5">
    <div class="card mb-4" style="margin-top: -75px">
      <div class="card-body py-5">
        <div class="row">
          <div class="col-4">
            <img src="assets/images/placeholders/respaldoCardPlaceholder1.png" alt="">
          </div>
          <div class="col-8">
            <h4 class="card-text page-text main-color">Zonapropia</h4>
            <p class="page-body">
              Es un portal de subsidio creado el 2020, que busca mejorar la experiencia de las personas, a la hora de buscar y comprar propiedades con subsidio. Esta empresa surge de la necesidad de informar, asesorar y guiar a las personas en la compra de su futuro hogar. Agiliza los procesos de venta ofreciendo un flujo considerable de potenciales clientes y un abanico de alternativas de compra para las personas.
            </p>
            <p class="page-body mt-5 pt-2">
              Es una empresa respaldada por la cámara Chilena de la Construcción y el Minvu.
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="row mb-4">
      <div class="col">
        <div class="accordion" id="misionAccordion">
          <div class="card card-alt">
            <div class="card-header" id="headingOne">
              <div class="row my-2">
                <div class="col text-left">
                  <h2 class="mb-0">Misión</h2>
                </div>
                <div class="col">
                  <button class="btn btn-link btn-block text-right" type="button" data-toggle="collapse" data-target="#collapseMisionAccordion" aria-expanded="true" aria-controls="collapseMisionAccordion">
                    <i class="fas fa-chevron-down text-white"></i>
                  </button>
                </div>
              </div>
              <div id="collapseMisionAccordion" class="collapse py-2 mb-2" aria-labelledby="headingOne" data-parent="#misionAccordion">
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
              </div>
            </div>
        
            
          </div>
        </div>
      </div>

    </div>

    <div class="row mb-4">
      <div class="col">
        <div class="accordion" id="visionAccordion">
          <div class="card card-main">
            <div class="card-header" id="headingOne">
              <div class="row my-2">
                <div class="col text-left">
                  <h2 class="mb-0">Visión</h2>
                </div>
                <div class="col">
                  <button class="btn btn-link btn-block text-right" type="button" data-toggle="collapse" data-target="#collapseVisionAccordion" aria-expanded="true" aria-controls="collapseVisionAccordion">
                    <i class="fas fa-chevron-down text-white"></i>
                  </button>
                </div>
              </div>
              <div id="collapseVisionAccordion" class="collapse py-2 mb-2" aria-labelledby="headingOne" data-parent="#visionAccordion">
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
              </div>
            </div>
        
            
          </div>
        </div>
      </div>

    </div>

    <div class="row my-5 py-5">
      <!-- item -->
      <div class="col-md-6 col-lg-4">
        <div class="card item-main-grid">
        <img src="./assets/images/la_florida_1200.png" alt="" class="item-main-grid-img2">
        <!-- Badges -->
        <div class="row badge-cont">
            <span class="badge cust-badges dark-blue-bg text-light mr-1">Icuadra</span>
            <span class="badge cust-badges badge-danger">DS 19</span>
        </div>
        <div class="card-body">
            <!-- Title & Map Marker -->
            <h5 class="card-title grid-title">Bosques de San Bernardo I</h5>
            <small class="subtitle-mapmarker"><i class="fas fa-map-marker-alt" style="color:red;"></i> San Bernardo</small>
            <!-- Beds & Square Room -->
            <div class="row mt-3">
            <div class="col-lg-6">
                <small class="bed-square-room"><i class="fas fa-bed gm-icon"></i> 2 - 3 dormitorios</small>
            </div>
            <div class="col-lg-6 go-right">
                <small class="bed-square-room"><i class="fas fa-expand-arrows-alt gm-icon"></i> 45 - 70 m<sup>2</sup></small>
            </div>
            </div>
            <hr>
            <!-- Rating and MISC -->
            <div class="row">
            <div class="col-lg-6">
                <i class="fas fa-star star-rating"></i>
                <i class="fas fa-star star-rating"></i>
                <i class="fas fa-star star-rating"></i>
                <i class="fas fa-star star-rating"></i>
                <i class="far fa-star star-rating-empty"></i>
            </div>
            <div class="col-lg-6 go-right">
                <h4 class="rating-anex">Desde UF 1.400</h4>
            </div>
            </div>
        </div>
        </div>
      </div>

      <!-- item -->
      <div class="col-md-6 col-lg-4">
        <div class="card item-main-grid">
        <img src="./assets/images/la_florida_1200.png" alt="" class="item-main-grid-img2">
        <!-- Badges -->
        <div class="row badge-cont">
            <span class="badge cust-badges dark-blue-bg text-light mr-1">Icuadra</span>
            <span class="badge cust-badges badge-danger">DS 19</span>
        </div>
        <div class="card-body">
            <!-- Title & Map Marker -->
            <h5 class="card-title grid-title">Bosques de San Bernardo I</h5>
            <small class="subtitle-mapmarker"><i class="fas fa-map-marker-alt" style="color:red;"></i> San Bernardo</small>
            <!-- Beds & Square Room -->
            <div class="row mt-3">
            <div class="col-lg-6">
                <small class="bed-square-room"><i class="fas fa-bed gm-icon"></i> 2 - 3 dormitorios</small>
            </div>
            <div class="col-lg-6 go-right">
                <small class="bed-square-room"><i class="fas fa-expand-arrows-alt gm-icon"></i> 45 - 70 m<sup>2</sup></small>
            </div>
            </div>
            <hr>
            <!-- Rating and MISC -->
            <div class="row">
            <div class="col-lg-6">
                <i class="fas fa-star star-rating"></i>
                <i class="fas fa-star star-rating"></i>
                <i class="fas fa-star star-rating"></i>
                <i class="fas fa-star star-rating"></i>
                <i class="far fa-star star-rating-empty"></i>
            </div>
            <div class="col-lg-6 go-right">
                <h4 class="rating-anex">Desde UF 1.400</h4>
            </div>
            </div>
        </div>
        </div>
      </div>

      <!-- item -->
      <div class="col-md-6 col-lg-4">
        <div class="card item-main-grid">
        <img src="./assets/images/la_florida_1200.png" alt="" class="item-main-grid-img2">
        <!-- Badges -->
        <div class="row badge-cont">
            <span class="badge cust-badges dark-blue-bg text-light mr-1">Icuadra</span>
            <span class="badge cust-badges badge-danger">DS 19</span>
        </div>
        <div class="card-body">
            <!-- Title & Map Marker -->
            <h5 class="card-title grid-title">Bosques de San Bernardo I</h5>
            <small class="subtitle-mapmarker"><i class="fas fa-map-marker-alt" style="color:red;"></i> San Bernardo</small>
            <!-- Beds & Square Room -->
            <div class="row mt-3">
            <div class="col-lg-6">
                <small class="bed-square-room"><i class="fas fa-bed gm-icon"></i> 2 - 3 dormitorios</small>
            </div>
            <div class="col-lg-6 go-right">
                <small class="bed-square-room"><i class="fas fa-expand-arrows-alt gm-icon"></i> 45 - 70 m<sup>2</sup></small>
            </div>
            </div>
            <hr>
            <!-- Rating and MISC -->
            <div class="row">
            <div class="col-lg-6">
                <i class="fas fa-star star-rating"></i>
                <i class="fas fa-star star-rating"></i>
                <i class="fas fa-star star-rating"></i>
                <i class="fas fa-star star-rating"></i>
                <i class="far fa-star star-rating-empty"></i>
            </div>
            <div class="col-lg-6 go-right">
                <h4 class="rating-anex">Desde UF 1.400</h4>
            </div>
            </div>
        </div>
        </div>
      </div>

    </div>

  </div>

@endsection

{{-- @section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/range-jqui/range_style.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/select2/select2.css') }}"/>
@endsection

@section('scripts')
  @isset($tag)
      <input type="hidden" name="tagId" value="{{ $tag }}">
  @endisset
  @isset($cat)
      <input type="hidden" name="catId" value="{{ $cat }}">
  @endisset
  @isset($comuna)
      <input type="hidden" name="comunaId" value="{{ $comuna }}">
  @endisset
  @isset($region)
      <input type="hidden" name="regionId" value="{{ $region }}">
  @endisset
  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
  <script src="{{ asset('js/ajax/regionSwitcherHome.js') }}" ></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection --}}
