@extends('layouts.app')

@section('content')
  <x-proyect-details.banner />
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">
      <!-- Top Section -->
      <x-proyect-details.topSection />
      <!-- NAV BTNS -->
      <x-proyect-details.miniNavBar />
      <!-- Datos financieros del proyecto -->
      <x-proyect-details.datosFinancieros />

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
        <x-proyect-details.similar-slider />
      </div>


    </div>
  </div>
@endsection

{{-- @section('scripts')

<script src="{{ asset('js/calendar.js') }}" defer></script>
@endsection --}}
