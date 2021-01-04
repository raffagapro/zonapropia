@extends('layouts.adminDashboard')
@section('title', 'Perfil del Usuario')

@section('content')
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">

      {{-- Title --}}
      <div class="row align-items-center">
        <h2 class="card-title mb-section-card-title">{{ $user->name }}&nbsp</h2>
        <a href="{{ route('adminPanel.index') }}" class="border-left mt-3 td-none">&nbsp Regresar a Usuarios.</a>
      </div>

      {{-- General info form --}}
      <div class="card mb-section-card">
        {{-- Title --}}
        <h4 class="card-title mb-section-card-title mt-1 mb-4">Información general</h4>
        {{-- General info --}}
        <div class="container">
          <form action="{{ route('adminPanel.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" placeholder="Nombre" value="{{ $user->name }}">
              @error('nombre')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ $user->email }}">
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <button type="submit" class="btn bg-main-color navBar-btn text-light float-right mb-3">Actualizar</button>
            <a type="submit" class="btn btn-warning float-right mb-3 mr-2">Restablecer Contraseña</a>
          </form>
        </div>
      </div>

      {{-- Roles Section --}}
      <div class="card mb-section-card">
        {{-- Title --}}
        <h4 class="card-title mb-section-card-title mt-1 mb-4">Roles</h4>
        {{-- Roles Form --}}
        <div class="container">
          <form action="{{ route('adminPanel.addRole', $user->id) }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-8 col-lg-10">
                <select class="form-control" name="role">
                  @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-4 col-lg-2">
                <button type="submit" class="btn bg-main-color btn-block navBar-btn text-light mt-3 mt-md-0 mb-3">Agregar Role</button>
              </div>
            </div>
            <div class="mb-3">
              @foreach ($user->roles as $role)
                <span class="badge badge-primary">
                  <a href="{{ route('adminPanel.rmRole', [$user->id, $role->id]) }}"><i class="fas fa-times text-danger"></i></a>
                  {{ $role->name }}
                </span>
              @endforeach
            </div>
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
