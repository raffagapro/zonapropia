@extends('layouts.app')

@section('title', $post->title)

@section('content')
  @include('invertirPage.posts.banner')

  <div class="container pb-5">
    <div class="row mt-5 py-2 text-center">
      <div class="col-6 mx-auto">
        <h1 class="page-title">{{ $post->title }}</h1>
        <p class="page-body">{{ $post->subtitle }}</p>
      </div>

    </div>

    <div class="row mt-4 py-2">
      <div class="col-10 mx-auto">
        @php
            $body = explode('~', $post->body )
        @endphp
        @foreach ($body as $b)
          <p class="page-body">{{ $b}}</p>
        @endforeach
      </div>

    </div>

    <div class="mt-5 text-center">
      <h3 class="page-text">Lorem Ipsum</h3>
    </div>
    <div class="row my-4  py-2">
      <div class="col-4 p-1">
        <div class="card">
          <img src="assets/images/placeholders/cardTopPlaceholder4.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h4 class="card-title">Lorem Ipsum</h4>
            <p class="card-text">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna…
            </p>
            <a class="card-link text-dark" href="">Leer más <i class="fas fa-arrow-right main-color"></i></a>
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
            <a class="card-link text-dark" href="">Leer más <i class="fas fa-arrow-right main-color"></i></a>
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
            <a class="card-link text-dark" href="">Leer más <i class="fas fa-arrow-right main-color"></i></a>
          </div>
        </div>
      </div>

    </div>

    <div class="row mb-5 text-center">
      <div class="col-4 mx-auto">
        paginate here
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
