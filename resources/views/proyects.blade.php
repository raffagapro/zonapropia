@extends('layouts.app')

@section('content')
  <x-proyects.banner />
  <div class="row m-0 pl-0 pr-0">
    <!-- Left Bar -->
    <x-proyects.leftSideBar />
    <!-- Right Panel -->
    <x-proyects.rightMainPanel />
  </div>
@endsection

{{-- @section('scripts')

<script src="{{ asset('js/calendar.js') }}" defer></script>
@endsection --}}
