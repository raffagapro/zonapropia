@extends('layouts.app')
@section('title', 'Home')

@section('content')
  @include('home.mainCarrousel')
  <x-inmo-logo-bar/>
  <div class="container">
    @include('home.ventaProjectSec')
    @include('home.buscaPropSec')
    @include('home.ventajasSec')
    @include('home.venderFromSec')
  </div>
@endsection

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/range-jqui/range_style.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/select2/select2.css') }}"/>
@endsection

@section('scripts')
  <script src="{{ asset('js/ajax/regionSwitcherHome.js') }}" ></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
