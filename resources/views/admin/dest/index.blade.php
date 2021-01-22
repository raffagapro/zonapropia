@extends('layouts.adminDashboard')
@section('title', 'Panel de Destacados')

@section('content')
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">

      {{-- Title --}}
      <div class="row align-items-center">
        <h2 class="card-title mb-section-card-title">Destacados&nbsp</h2>
        <span class="border-left mt-3">&nbsp&nbspMostrando {{$dests->count()}} de {{$dests->total()}} resultados.</span>
      </div>

      {{-- Table --}}
      <div class="card mb-section-card">
        <div class="card-body pt-0">
          <table class="table table-hover mt-4 table-responsive-sm">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Orden</th>
                <th scope="col">Nombre</th>
                <th scope="col">Control</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($dests as $dest)
                <tr>
                  <th scope="row">{{ $dest->id }}</th>
                  <th>{{ $dest->orden }}</th>
                  <td>
                    {{ $dest->proyecto->name }}
                  </td>
                  <td>
                    {{-- up --}}
                    @if ($dest->orden !== 1)
                      <a
                        href="javascript:void(0);"
                        class="btn btn-sm btn-primary"
                        onclick="event.preventDefault(); document.getElementById('{{ 'destUp'.$dest->id }}').submit();"
                        data-toggle="tooltip" data-placement="top" title="Subir orden">
                        <i class="fas fa-arrow-up"></i>
                      </a>
                      <form id="{{ 'destUp'.$dest->id }}"
                        action="{{ route('dest.up', $dest->id) }}"
                        method="POST"
                        style="display: none;"
                        >@csrf
                      </form>
                    @endif
                    @if ($dest->orden < count($dests))
                      <a
                        href="javascript:void(0);"
                        class="btn btn-sm btn-primary"
                        onclick="event.preventDefault(); document.getElementById('{{ 'destDown'.$dest->id }}').submit();"
                        data-toggle="tooltip" data-placement="top" title="Bajar orden">
                        <i class="fas fa-arrow-down"></i>
                      </a>
                      <form id="{{ 'destDown'.$dest->id }}"
                        action="{{ route('dest.down', $dest->id) }}"
                        method="POST"
                        style="display: none;"
                        >@csrf
                      </form>
                    @endif
                    {{-- Eliminar --}}
                    <a
                      href="javascript:void(0);"
                      class="btn btn-sm btn-danger"
                      onclick="event.preventDefault(); document.getElementById('{{ 'rmProyect'.$dest->id }}').submit();"
                      data-toggle="tooltip" data-placement="top" title="Remover de destacados">
                      <i class="fas fa-times"></i>
                    </a>
                    <form id="{{ 'rmProyect'.$dest->id }}"
                      action="{{ route('dest.remove', $dest->id) }}"
                      method="POST"
                      style="display: none;"
                      >@csrf
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <th class="main-color">No se encontraron proyectos en el registro.</th>
                </tr>
              @endforelse
            </tbody>
          </table>
          {{-- Paginator --}}
          {{$dests->links()}}
        </div>
      </div>

      {{-- Add Proyect --}}
      <div class="card mb-section-card">
        <div class="card-body pt-0">
          {{-- Title --}}
          <h4 class="card-title mb-section-card-title mt-1 mb-4">Agregar Proyecto</h4>
          {{-- Form --}}
          <div class="container">
            <form action="{{ route('dest.search') }}" method="POST">
              @csrf
              <div class="row">
                <div class="col-8">
                  <input type="text" class="form-control" name="search" placeholder="Nombre del proyecto">
                </div>
                <div class="col-4">
                  <button type="submit" class="btn btn-block bg-main-color navBar-btn text-light float-right mb-3">Buscar</button>
                </div>
              </div>
            </form>
            {{-- Proyect Found Table --}}
            @isset($searched)
              <table class="table table-hover mt-4 table-responsive-sm">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Control</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($searched as $s)
                    <tr>
                      <th scope="row">{{ $s->id }}</th>
                      <td>
                        {{ $s->name }}
                      </td>
                      <td>
                        <a
                          href="javascript:void(0);"
                          class="btn btn-sm btn-primary bg-main-color"
                          onclick="event.preventDefault(); document.getElementById('{{ 'destAdd'.$s->id }}').submit();"
                          data-toggle="tooltip" data-placement="top" title="Agregar Proyecto">
                          <i class="fas fa-plus"></i>
                        </a>
                        <form id="{{ 'destAdd'.$s->id }}"
                          action="{{ route('dest.add', $s->id) }}"
                          method="POST"
                          style="display: none;"
                          >@csrf
                        </form>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <th class="main-color">No se encontraron proyectos en el registro.</th>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            @endisset
          </div>
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
