@extends('layouts.app')
@section('title', 'Proyectos')

@section('content')
  @include('proyects.banner')
  <div class="row m-0 pl-0 pr-0">
    <!-- Left Bar -->
    @include('proyects.leftSideBar')
    <!-- Right Panel -->
    @include('proyects.rightMainPanel')
  </div>
@endsection

@section('styles')
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
  {{-- <script src="{{ asset('js/calendar.js') }}" defer></script> --}}
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
