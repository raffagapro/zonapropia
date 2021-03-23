@extends('layouts.adminDashboard')
@section('title', 'Agregar Post')

@section('content')
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">

      {{-- Title --}}
      <div class="row align-items-center">
        <h2 class="card-title mb-section-card-title">Agregar Post&nbsp</h2>
        <a href="{{ route('post.index') }}" class="border-left mt-3 td-none">&nbsp Regresar a Post.</a>
      </div>

      {{-- General info form --}}
      <div class="card mb-section-card">
        {{-- Title --}}
        <h4 class="card-title mb-section-card-title mt-1 mb-4">Información general</h4>
        {{-- General info --}}
        <div class="container">
          <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- Titutlo --}}
            <div class="form-group">
              <label for="titulo">Titulo</label>
              <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror" value="">
              @error('titulo')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            {{-- Subtitulo --}}
            <div class="form-group">
              <label for="subtitle">Subtitulo</label>
              <input type="text" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror" value="">
              @error('subtitle')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            {{-- Video --}}
            <div class="form-group">
              <label for="video">Video</label>
              <input type="text" name="video" class="form-control @error('video') is-invalid @enderror" value="">
              @error('video')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            {{-- Body --}}
            <div class="form-group">
              <label for="body">Texto</label>
              <textarea class="form-control" name="body" rows="3"></textarea>
            </div>
            <button type="submit" class="btn bg-main-color navBar-btn text-light float-right mb-3">Agregar Post</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  @if(session('status'))
    <x-sweet-alert-admin :message="session('status')"/>
  @endif
  @isset($status)
    <x-sweet-alert-admin :message="$status"/>
  @endisset
@endsection

@section('scripts')
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
  <script src="{{ asset('js/ajax/regionSwitcherCreate.js') }}" ></script>
@endsection
