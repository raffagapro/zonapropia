@extends('layouts.app')

@section('title', 'Financiamiento')

@section('content')
  @include('financiamiento.banner')

  <div class="container-fluid mb-5">
    <div class="row my-5 py-2">
      <div class="col-1"></div>
      <div class="col-5">
        <p class="carrousel-st mb-0">Zonapropia</p>
        <h1 class="page-title">Lorem Ipsum</h1>
        <p class="page-body">
          Contamos con proyectos privados y de subsidio. Encuentra el que se adapte mejor a tus necesidades, según tamaño, ubicación y tipo de propiedad.
        </p>
      </div>

    </div>

    <div class="row pb-5">
      <div class="col-7 px-0">
        <img src="assets/images/main-financiamiento.png" alt="financiamiento-abstract" style="width: auto; height: 75%;">
      </div>
      <div class="col-1"></div>
      <div class="col-4 px-0">
        <img src="assets/images/financiamiento2.png" alt="financiamiento-abstract" style="width: auto; height: 75%;">
      </div>
    </div>

    <div class="row mb-5 py-5">
      <div class="col-1"></div>
      <div class="col-4">
        <p class="carrousel-st mb-0">Zonapropia</p>
        <h1 class="page-title">Lorem Ipsum</h1>
        <ul class="fa-ul page-body">
          <li class="py-3 pl-3"><span class="fa-li"><i class="far fa-check-circle fa-2x main-color"></i></span> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</li>
          <li class="py-3 pl-3"><span class="fa-li"><i class="far fa-check-circle fa-2x main-color"></i></span> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna/li>
          <li class="py-3 pl-3"><span class="fa-li"><i class="far fa-check-circle fa-2x main-color"></i></span> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</li>
          <li class="py-3 pl-3"><span class="fa-li"><i class="far fa-check-circle fa-2x main-color"></i></span> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</li>
        </ul>
      </div>
      <div class="col-7 pr-0">
        <img src="assets/images/panel-laptop.png" alt="" style="width: 100%">
      </div>
    </div>

    <div class="mb-3 text-center">
      <h2 class="page-title">Lorem Ipsum</h2>
    </div>
    <div class="row mb-5 pt-3 pb-5 px-5 mx-5">
      <div class="col-4 p-1">
        <div class="card card-alt">
          <div class="card-body p-4">
            <div class="row">
              <div class="col-9">
                <h4 class="card-title card-title-alt">Seguridad</h4>
                <p class="card-text-alt">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna                </p>
              </div>
              <div class="col-3">
                <i class="fas fa-laptop fa-3x"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-4 p-1">
        <div class="card">
          <div class="card-body p-4">
            <div class="row">
              <div class="col-9">
                <h4 class="card-title card-title-alt">Áreas verdes</h4>
                <p class="card-text-alt">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna                </p>
              </div>
              <div class="col-3">
                <i class="fas fa-laptop fa-3x main-color"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-4 p-1">
        <div class="card card-alt">
          <div class="card-body p-4">
            <div class="row">
              <div class="col-9">
                <h4 class="card-title card-title-alt">Seguridad</h4>
                <p class="card-text-alt">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna                </p>
              </div>
              <div class="col-3">
                <i class="fas fa-laptop fa-3x"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-4 p-1">
        <div class="card">
          <div class="card-body p-4">
            <div class="row">
              <div class="col-9">
                <h4 class="card-title card-title-alt">Seguridad</h4>
                <p class="card-text-alt">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna                </p>
              </div>
              <div class="col-3">
                <i class="fas fa-laptop fa-3x main-color"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-4 p-1">
        <div class="card card-alt">
          <div class="card-body p-4">
            <div class="row">
              <div class="col-9">
                <h4 class="card-title card-title-alt">Seguridad</h4>
                <p class="card-text-alt">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna                </p>
              </div>
              <div class="col-3">
                <i class="fas fa-laptop fa-3x"></i>
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
