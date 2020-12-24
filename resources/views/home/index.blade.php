@extends('layouts.app')
@section('title', 'Home')

@section('content')
  @include('home.mainCarrousel')
  @include('home.logoBar')
  <div class="container">
    @include('home.ventaProjectSec')
    @include('home.buscaPropSec')
    @include('home.ventajasSec')
    @include('home.venderFromSec')
  </div>
@endsection

{{-- @section('scripts')

<script src="{{ asset('js/calendar.js') }}" defer></script>
@endsection --}}
