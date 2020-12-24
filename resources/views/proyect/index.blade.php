@extends('layouts.app')
@section('title', 'Proyecto Single')


@section('content')
  @include('proyect.banner')
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">
      <!-- Top Section -->
      @include('proyect.topSection')
      <!-- NAV BTNS -->
      @include('proyect.miniNavBar')
      <!-- Datos financieros del proyecto -->
      @include('proyect.datosFinancieros')

      {{-- Main Body Sections --}}
      <!-- Info -->
      <x-proyect-details.info />
      <!-- Char -->
      <x-proyect-details.char />
      <!-- Info Financiera -->
      <x-proyect-details.info-financiera />
      <!-- Comparativa -->
      <x-proyect-details.comparativa />

      <!-- Proyectos Similares -->
      <div class="row">
        @include('proyect.similar-slider ')
      </div>

    </div>
  </div>
@endsection

{{-- @section('scripts')

<script src="{{ asset('js/calendar.js') }}" defer></script>
@endsection --}}
