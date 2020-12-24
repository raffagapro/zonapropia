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

{{-- @section('scripts')

<script src="{{ asset('js/calendar.js') }}" defer></script>
@endsection --}}
