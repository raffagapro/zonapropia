@extends('layouts.app')
@section('title', 'Perfil del Usuario')

@section('content')
  <div style="background-color:#f5f5f5;">
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
