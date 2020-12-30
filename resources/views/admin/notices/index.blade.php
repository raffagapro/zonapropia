@extends('layouts.adminDashboard')
@section('title', 'Panel de Anuncios')

@section('content')
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">
      {{-- Alert Section --}}
      @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{session('status')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif

      {{-- Title --}}
      <div class="row align-items-center">
        <h2 class="card-title mb-section-card-title">Anuncios&nbsp</h2>
        <span class="border-left mt-3">&nbsp&nbspMostrando {{$notices->count()}} de {{$notices->total()}} resultados.</span>
      </div>

      {{-- Table --}}
      <div class="card mb-section-card">
        <div class="card-body pt-0">
          <table class="table table-hover mt-4 table-responsive-sm">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Titulo</th>
                <th scope="col">Fecha</th>
                <th scope="col">Control</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($notices as $notice)
                <tr>
                  <th scope="row">{{ $notice->id }}</th>
                  <td>
                    <a href="{{ route('notice.edit', $notice->id) }}">
                      {{ $notice->title }}
                    </a>
                  </td>
                  <td>{{ $notice->created_at->diffForHumans() }}</td>
                  <td>
                    <a
                      href="javascript:void(0);"
                      class="btn btn-sm btn-danger"
                      onclick="event.preventDefault(); document.getElementById('{{ 'noticeDestroy'.$notice->id }}').submit();"
                      data-toggle="tooltip" data-placement="top" title="Borrar Anuncio">
                      <i class="fas fa-trash"></i>
                    </a>
                    <form id="{{ 'noticeDestroy'.$notice->id }}"
                      action="{{ route('notice.destroy', $notice->id) }}"
                      method="POST"
                      style="display: none;"
                      >@method('DELETE') @csrf
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          {{-- Paginator --}}
          {{$notices->links()}}
        </div>
      </div>

      {{-- Add Notice --}}
      <div class="card mb-section-card">
        <div class="card-body pt-0">
          {{-- Title --}}
          <h4 class="card-title mb-section-card-title mt-1 mb-4">Agregar Anuncio</h4>
          {{-- Form --}}
          <div class="container">
            <form action="{{ route('notice.store') }}" method="POST">
              @csrf
              <div class="form-group">
                <input type="text" name="titulo" class="form-control" placeholder="Titulo">
              </div>
              <div class="form-group">
                <textarea class="form-control" name="mensaje" rows="3" placeholder="Escriba aquí su anuncio"></textarea>
              </div>
              <button type="submit" class="btn bg-main-color navBar-btn text-light float-right mb-3">Guardar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

{{-- @section('scripts')

<script src="{{ asset('js/calendar.js') }}" defer></script>
@endsection --}}
