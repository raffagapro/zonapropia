@extends('layouts.adminDashboard')
@section('title', 'Panel de Proyectos')

@section('content')
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">
      {{-- Title --}}
      <div class="row align-items-center">
        <h2 class="card-title mb-section-card-title mb-3">Tipologias&nbsp</h2>
        <a href="{{ route('tipo.create') }}" class="td-none">
          <i class="fas fa-plus-circle fa-2x main-color"
            data-toggle="tooltip" data-placement="top" title="Agregar Tipologia">
          </i>
          &nbsp
        </a>
        <span class="border-left">&nbsp Mostrando {{$tipologias->count()}} de {{$tipologias->total()}} resultados. &nbsp</span>
      </div>

      {{-- Table --}}
      <div class="card mb-section-card">
        <div class="card-body pt-0">
          <table class="table table-hover mt-4 table-responsive-sm">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Titulo</th>
                <th scope="col">Media</th>
                <th scope="col">Control</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($tipologias as $tipo)
                <tr>
                  <th scope="row">{{ $tipo->id }}</th>
                  {{-- titulo --}}
                  <td>
                    <a href="{{ route('tipo.edit', $tipo->id) }}">
                      {{ $tipo->titulo }}
                    </a>
                  </td>
                  {{-- Media --}}
                  <td>
                    <img src="{{ Storage::url($tipo->media) }}" class="tipoImg">
                  </td>
                  {{-- Control --}}
                  <td>
                    {{-- delete --}}
                    <a
                      href="javascript:void(0);"
                      class="btn btn-sm btn-danger"
                      onclick="event.preventDefault(); document.getElementById('{{ 'delTipo'.$tipo->id }}').submit();"
                      data-toggle="tooltip" data-placement="top" title="Remover Tipologia">
                      <i class="fas fa-times"></i>
                    </a>
                    <form id="{{ 'delTipo'.$tipo->id }}"
                      action="{{ route('tipo.destroy', $tipo->id) }}"
                      method="POST"
                      style="display: none;"
                      >@method('DELETE') @csrf
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <th class="main-color">No se encontraron tipologias en el registro.</th>
                </tr>
              @endforelse
            </tbody>
          </table>
          {{-- Paginator --}}
          {{$tipologias->links()}}
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

{{-- @section('scripts')

<script src="{{ asset('js/calendar.js') }}" defer></script>
@endsection --}}
