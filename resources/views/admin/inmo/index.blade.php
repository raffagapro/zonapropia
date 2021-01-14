@extends('layouts.adminDashboard')
@section('title', 'Panel de Inmobiliarias')

@section('content')
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">
      {{-- Title --}}
      <div class="row align-items-center">
        <h2 class="card-title mb-section-card-title mb-3">Inmobiliarias&nbsp</h2>
        <a href="{{ route('inmo.create')}}" class="td-none">
          <i class="fas fa-plus-circle fa-2x main-color"
            data-toggle="tooltip" data-placement="top" title="Agregar Inmobiliaria">
          </i>
          &nbsp
        </a>
        <span class="border-left">&nbsp Mostrando {{$inmos->count()}} de {{$inmos->total()}} resultados. &nbsp</span>
      </div>

      {{-- Filters --}}
      <form action="{{ route('inmo.filter') }}" method="get">
        <div class="row">
          {{-- Buscar --}}
          <div class="col">
            <input type="text"
              class="form-control form-control-sm"
              name="search" placeholder="Buscar"
              @isset($searched)
                value="{{ $searched }}"
              @endisset
            >
          </div>
          {{-- Btns --}}
          <div class="col-2">
            <button type="submit" class="btn btn-sm bg-main-color btn-block navBar-btn text-light">
              <i class="fas fa-search"></i>
            </button>
          </div>
          <div class="col-2">
            <a href="{{ route('inmo.index')}}" class="btn btn-sm bg-main-color btn-block navBar-btn text-light">
              Remover Filtros
            </a>
          </div>
        </div>
      </form>

      {{-- Table --}}
      <div class="card mb-section-card">
        <div class="card-body pt-0">
          <table class="table table-hover mt-4 table-responsive-sm">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Logo</th>
                <th scope="col">Control</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($inmos as $inmo)
                <tr>
                  <th scope="row">{{ $inmo->id }}</th>
                  <td>
                    <a href="{{ route('inmo.edit', $inmo->id) }}">
                      {{ $inmo->name }}
                    </a>
                  </td>
                  <td>
                    <img src="{{ asset($inmo->logo) }}" alt="" class="inmoTb">
                  </td>
                  <td>
                    <a
                      href="javascript:void(0);"
                      class="btn btn-sm btn-danger"
                      onclick="event.preventDefault(); document.getElementById('{{ 'inmoDestroy'.$inmo->id }}').submit();"
                      data-toggle="tooltip" data-placement="top" title="Borrar Inmobiliaria">
                      <i class="fas fa-trash"></i>
                    </a>
                    <form id="{{ 'inmoDestroy'.$inmo->id }}"
                      action="{{ route('inmo.destroy', $inmo->id) }}"
                      method="POST"
                      style="display: none;"
                      >@method('DELETE') @csrf
                    </form>
                    @if ( (int)$inmo->destacar === 1 )
                      <a
                        href="javascript:void(0);"
                        class="btn btn-sm btn-danger"
                        onclick="event.preventDefault(); document.getElementById('{{ 'inmoHide'.$inmo->id }}').submit();"
                        data-toggle="tooltip" data-placement="top" title="Esconder Inmobiliaria">
                        <i class="fas fa-eye-slash"></i>
                      </a>
                      <form id="{{ 'inmoHide'.$inmo->id }}"
                        action="{{ route('inmo.hide', $inmo->id) }}"
                        method="POST"
                        style="display: none;"
                        >@method('PUT') @csrf
                      </form>
                    @else
                      <a
                        href="javascript:void(0);"
                        class="btn btn-sm btn-success"
                        onclick="event.preventDefault(); document.getElementById('{{ 'inmoShow'.$inmo->id }}').submit();"
                        data-toggle="tooltip" data-placement="top" title="Destacar Inmobiliaria">
                        <i class="fas fa-eye"></i>
                      </a>
                      <form id="{{ 'inmoShow'.$inmo->id }}"
                        action="{{ route('inmo.show', $inmo->id) }}"
                        method="POST"
                        style="display: none;"
                        >@method('PUT') @csrf
                      </form>
                    @endif
                  </td>
                </tr>
              @empty
                <tr>
                  <th class="main-color">No se encontraron inmobiliarias en el registro.</th>
                </tr>
              @endforelse
            </tbody>
          </table>
          {{-- Paginator --}}
          {{$inmos->links()}}
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
