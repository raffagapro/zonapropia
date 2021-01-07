@extends('layouts.adminDashboard')
@section('title', 'Modificar Tag')

@section('content')
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">

      {{-- Title --}}
      <div class="row align-items-center">
        <h2 class="card-title mb-section-card-title">{{ $tag->name }}&nbsp</h2>
        <a href="{{ route('tag.index') }}" class="border-left mt-3 td-none">&nbsp Regresar a Tags.</a>
      </div>

      {{-- General info form --}}
      <div class="card mb-section-card">
        {{-- Title --}}
        <h4 class="card-title mb-section-card-title mt-1 mb-4">Modificar Tag</h4>
        {{-- General info --}}
        <div class="container">
          <form action="{{ route('tag.update', $tag->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <input
                type="text" name="nombre"
                class="form-control"
                placeholder="Nombre" value="{{ $tag->name }}">
            </div>
            <button type="submit" class="btn bg-main-color navBar-btn text-light float-right mb-3">Actualizar</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  @if(session('status'))
    <x-sweet-alert-admin :message="session('status')"/>
  @endif
@endsection

{{-- @section('scripts')

<script src="{{ asset('js/calendar.js') }}" defer></script>
@endsection --}}
