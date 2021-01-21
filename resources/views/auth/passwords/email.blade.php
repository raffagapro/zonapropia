@extends('layouts.app')
@section('title', 'Reestablecer Contraseña')

@section('content')
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">

      {{-- Title --}}
      <div class="row align-items-center">
        <h2 class="card-title mb-section-card-title">{{ __('Reestablecer Contraseña') }}&nbsp</h2>
      </div>

      {{-- General info form --}}
      <div class="card mb-section-card">
        {{-- General info --}}
        <div class="container">
          @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
          @endif

          <form method="POST" action="{{ route('password.email') }}">
              @csrf
              <div class="form-group mt-3">
                <label for="exampleInputEmail1">Escriba el email asociado con la cuenta.</label>
                <input
                  type="email" name="email"
                  class="form-control @error('email') is-invalid @enderror"
                  placeholder="Email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <button type="submit" class="btn bg-main-color navBar-btn text-light float-right mb-3">Mandar Link</button>

          </form>
        </div>
      </div>

    </div>
  </div>
@endsection
