@extends('layouts.app')

@section('content')
  <x-home.mainCarrousel />
  <x-home.logoBar />
  <div class="container">
    <x-home.ventaProjectSec />
    <x-home.buscaPropSec />
    <x-home.ventajasSec />
    <x-home.venderFromSec />
  </div>
@endsection

{{-- @section('scripts')

<script src="{{ asset('js/calendar.js') }}" defer></script>
@endsection --}}
