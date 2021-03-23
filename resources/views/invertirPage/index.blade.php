@extends('layouts.app')

@section('title', 'Por qué invertir')

@section('content')
  @include('invertirPage.banner')

  <div class="container mb-5">
    <div class="row my-5 py-3 text-center">
      <div class="col-6 mx-auto">
        <h1 class="page-title">Lorem Ipsum</h1>
        <p class="page-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
          labore et dolore magna</p>
      </div>

    </div>
    <div class="col text-right">
      <p class="page-display">Mostrando <span class="main-color">{{$posts->count()}} - {{$posts->total()}}</span> articulos</p>
    </div>
    <div class="row my-2">
      @forelse ($posts as $post)
        <x-blog.postitem :post="$post"/>
      @empty
          No hay articulos en la base de datos.
      @endforelse
    </div>

    {{-- <div class="row my-2">
      <div class="col-4 p-1">
        <div class="card">
          <img src="assets/images/placeholders/cardTopPlaceholder4.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h4 class="card-title">Lorem Ipsum</h4>
            <p class="card-text">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna…
            </p>
            <a class="card-link text-dark" href="{{ route('InvertirPost.index') }}">Leer más <i class="fas fa-arrow-right main-color"></i></a>
          </div>
        </div>
      </div>

      <div class="col-4 p-1">
        <div class="card">
          <img src="assets/images/placeholders/cardTopPlaceholder5.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h4 class="card-title">Lorem Ipsum</h4>
            <p class="card-text">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna…
            </p>
            <a class="card-link text-dark" href="{{ route('InvertirPost.index') }}">Leer más <i class="fas fa-arrow-right main-color"></i></a>
          </div>
        </div>
      </div>

      <div class="col-4 p-1">
        <div class="card">
          <img src="assets/images/placeholders/cardTopPlaceholder6.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h4 class="card-title">Lorem Ipsum</h4>
            <p class="card-text">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna…
            </p>
            <a class="card-link text-dark" href="{{ route('InvertirPost.index') }}">Leer más <i class="fas fa-arrow-right main-color"></i></a>
          </div>
        </div>
      </div>

    </div>

    <div class="row my-2">
      <div class="col-4 p-1">
        <div class="card">
          <img src="assets/images/placeholders/cardTopPlaceholder7.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h4 class="card-title">Lorem Ipsum</h4>
            <p class="card-text">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna…
            </p>
            <a class="card-link text-dark" href="{{ route('InvertirPost.index') }}">Leer más <i class="fas fa-arrow-right main-color"></i></a>
          </div>
        </div>
      </div>

      <div class="col-4 p-1">
        <div class="card">
          <img src="assets/images/placeholders/cardTopPlaceholder8.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h4 class="card-title">Lorem Ipsum</h4>
            <p class="card-text">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna…
            </p>
            <a class="card-link text-dark" href="{{ route('InvertirPost.index') }}">Leer más <i class="fas fa-arrow-right main-color"></i></a>
          </div>
        </div>
      </div>

      <div class="col-4 p-1">
        <div class="card">
          <img src="assets/images/placeholders/cardTopPlaceholder9.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h4 class="card-title">Lorem Ipsum</h4>
            <p class="card-text">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna…
            </p>
            <a class="card-link text-dark" href="{{ route('InvertirPost.index') }}">Leer más <i class="fas fa-arrow-right main-color"></i></a>
          </div>
        </div>
      </div>

    </div> --}}

    <div class="row text-center">
      <div class="col-4 mx-auto my-4">
        {{$posts->links()}}
      </div>

    </div>

  </div>

@endsection

{{-- @section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/range-jqui/range_style.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/select2/select2.css') }}"/>
@endsection

@section('scripts')
  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
  <script src="{{ asset('js/ajax/regionSwitcherHome.js') }}" ></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection --}}
