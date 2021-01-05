@extends('layouts.adminDashboard')
@section('title', 'Panel de Inmobiliarias')

@section('content')
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">
      {{-- Title --}}
      <div class="row align-items-center">
        <h2 class="card-title mb-section-card-title mb-3">Proyectos&nbsp</h2>
        <a href="{{ route('aProyect.create')}}" class="td-none">
          <i class="fas fa-plus-circle fa-2x main-color"
            data-toggle="tooltip" data-placement="top" title="Agregar Proyecto">
          </i>
          &nbsp
        </a>
        <span class="border-left">&nbsp Mostrando {{$proyects->count()}} de {{$proyects->total()}} resultados. &nbsp</span>
      </div>

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
              @forelse ($proyects as $proyect)
                <tr>
                  <th scope="row">{{ $proyect->id }}</th>
                  <td>
                    <a href="{{ route('inmo.edit', $proyect->id) }}">
                      {{ $proyect->name }}
                    </a>
                  </td>
                  <td><img src="{{ asset($proyect->logo) }}" alt="" class="inmoTb"></td>
                  <td>
                    <a
                      href="javascript:void(0);"
                      class="btn btn-sm btn-danger"
                      onclick="event.preventDefault(); document.getElementById('{{ 'inmoDestroy'.$proyect->id }}').submit();"
                      data-toggle="tooltip" data-placement="top" title="Borrar Inmobiliaria">
                      <i class="fas fa-trash"></i>
                    </a>
                    <form id="{{ 'inmoDestroy'.$proyect->id }}"
                      action="{{ route('inmo.destroy', $proyect->id) }}"
                      method="POST"
                      style="display: none;"
                      >@method('DELETE') @csrf
                    </form>
                    @if ( (int)$proyect->destacar === 1 )
                      <a
                        href="javascript:void(0);"
                        class="btn btn-sm btn-danger"
                        onclick="event.preventDefault(); document.getElementById('{{ 'inmoHide'.$proyect->id }}').submit();"
                        data-toggle="tooltip" data-placement="top" title="Esconder Inmobiliaria">
                        <i class="fas fa-eye-slash"></i>
                      </a>
                      <form id="{{ 'inmoHide'.$proyect->id }}"
                        action="{{ route('inmo.hide', $proyect->id) }}"
                        method="POST"
                        style="display: none;"
                        >@method('PUT') @csrf
                      </form>
                    @else
                      <a
                        href="javascript:void(0);"
                        class="btn btn-sm btn-success"
                        onclick="event.preventDefault(); document.getElementById('{{ 'inmoShow'.$proyect->id }}').submit();"
                        data-toggle="tooltip" data-placement="top" title="Destacar Inmobiliaria">
                        <i class="fas fa-eye"></i>
                      </a>
                      <form id="{{ 'inmoShow'.$proyect->id }}"
                        action="{{ route('inmo.show', $proyect->id) }}"
                        method="POST"
                        style="display: none;"
                        >@method('PUT') @csrf
                      </form>
                    @endif
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
          {{$proyects->links()}}
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
