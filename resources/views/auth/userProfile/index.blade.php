@extends('layouts.app')
@section('title', 'Perfil del Usuario')

@section('content')
  <div>
    <div class="row m-0 pl-0 pr-0">
      <!-- Left Bar -->
      @include('auth.userProfile.leftSideBar')
      <!-- Right Panel -->
      @include('auth.userProfile.rightMainPanel')
    </div>
  </div>

  @if(session('status'))
    <x-sweet-alert-admin :message="session('status')"/>
  @endif
@endsection
