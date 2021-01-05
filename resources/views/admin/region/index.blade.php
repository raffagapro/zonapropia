@extends('layouts.adminDashboard')
@section('title', 'Panel de Regiones')

@section('content')
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">
      {{-- Title --}}
      <div class="row align-items-center">
        <h2 class="card-title mb-section-card-title mb-3">Regiones&nbsp</h2>
        <a href="{{ route('region.create')}}" class="td-none">
          <i class="fas fa-plus-circle fa-2x main-color"
            data-toggle="tooltip" data-placement="top" title="Agregar Region">
          </i>
          &nbsp
        </a>
        <span class="border-left">&nbsp Mostrando {{$regions->count()}} de {{$regions->total()}} resultados. &nbsp</span>
      </div>

      {{-- Table --}}
      <div class="card mb-section-card">
        <div class="card-body pt-0">
          <table class="table table-hover mt-4 table-responsive-sm">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Control</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($regions as $region)
                <tr>
                  <th scope="row">{{ $region->id }}</th>
                  <td>
                    <a href="{{ route('inmo.edit', $region->id) }}">
                      {{ $region->name }}
                    </a>
                  </td>
                  <td>
                    <a
                      href="javascript:void(0);"
                      class="btn btn-sm btn-danger"
                      onclick="event.preventDefault(); document.getElementById('{{ 'inmoDestroy'.$region->id }}').submit();"
                      data-toggle="tooltip" data-placement="top" title="Borrar Inmobiliaria">
                      <i class="fas fa-trash"></i>
                    </a>
                    <form id="{{ 'inmoDestroy'.$region->id }}"
                      action="{{ route('inmo.destroy', $region->id) }}"
                      method="POST"
                      style="display: none;"
                      >@method('DELETE') @csrf
                    </form>
                    @if ( (int)$region->destacar === 1 )
                      <a
                        href="javascript:void(0);"
                        class="btn btn-sm btn-danger"
                        onclick="event.preventDefault(); document.getElementById('{{ 'inmoHide'.$region->id }}').submit();"
                        data-toggle="tooltip" data-placement="top" title="Esconder Inmobiliaria">
                        <i class="fas fa-eye-slash"></i>
                      </a>
                      <form id="{{ 'inmoHide'.$region->id }}"
                        action="{{ route('inmo.hide', $region->id) }}"
                        method="POST"
                        style="display: none;"
                        >@method('PUT') @csrf
                      </form>
                    @else
                      <a
                        href="javascript:void(0);"
                        class="btn btn-sm btn-success"
                        onclick="event.preventDefault(); document.getElementById('{{ 'inmoShow'.$region->id }}').submit();"
                        data-toggle="tooltip" data-placement="top" title="Destacar Inmobiliaria">
                        <i class="fas fa-eye"></i>
                      </a>
                      <form id="{{ 'inmoShow'.$region->id }}"
                        action="{{ route('inmo.show', $region->id) }}"
                        method="POST"
                        style="display: none;"
                        >@method('PUT') @csrf
                      </form>
                    @endif
                  </td>
                </tr>
              @empty
                <tr>
                  <th class="main-color">No se encontraron regiones en el registro.</th>
                </tr>
              @endforelse
            </tbody>
          </table>
          {{-- Paginator --}}
          {{$regions->links()}}
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
