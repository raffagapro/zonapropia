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
      <div class="tab-content" id="pills-tabContent">
        <!-- Info -->
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
          <x-proyect-details.info :proyect="$proyect" />
        </div>
        <!-- Char -->
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
          <x-proyect-details.char :proyect="$proyect" />
        </div>
        <!-- Info Financiera -->
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
          <x-proyect-details.info-financiera :proyect="$proyect" />
        </div>
        <!-- Comparativa -->
        <div class="tab-pane fade" id="pills-comp" role="tabpanel" aria-labelledby="pills-comp-tab">
          <x-proyect-details.comparativa :proyect="$proyect" />
        </div>
      </div>

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
