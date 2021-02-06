@extends('layouts.adminDashboard')
@section('title', 'Panel de Tipografias')

@section('content')
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">
      {{-- Title --}}
      <div class="row align-items-center">
        <h2 class="card-title mb-section-card-title mb-3">{{$proyecto->name}}&nbsp</h2>
        <a href="{{ route('aProyect.index')}}" class="td-none">
          <i class="fas fa-arrow-alt-circle-left fa-2x main-color"
            data-toggle="tooltip" data-placement="top" title="Regresar a proyectos">
          </i>
          &nbsp
        </a>
        <a href="{{ route('tipo.create', $proyecto->id)}}" class="td-none">
          <i class="fas fa-plus-circle fa-2x main-color"
            data-toggle="tooltip" data-placement="top" title="Agregar Tipologia">
          </i>
          &nbsp
        </a>
        <span class="border-left">&nbsp Mostrando {{$proyecto->tipografias->count()}} tipologias. &nbsp</span>
      </div>

      {{-- Table --}}
      <div class="card mb-section-card">
        <div class="card-body pt-0">
          <table class="table table-hover mt-4 table-responsive-sm">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Model</th>
                <th scope="col">Codigo</th>
                <th scope="col">Status</th>
                <th scope="col">Piso</th>
                <th scope="col">Precio Venta</th>
                <th scope="col">UF m<sup>2</sup></th>
                <th scope="col">Control</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($proyecto->tipografias as $tipo)
                <tr>
                  <th scope="row">{{ $tipo->id }}</th>
                  <td>
                    <a href="{{ route('tipo.edit', $tipo->id) }}">
                      {{ $tipo->modelo }}
                    </a>
                  </td>
                  <td>
                    @if ($tipo->code === null)
                      Sin codigo
                    @else
                      {{ $tipo->code }}
                    @endif
                  </td>
                  <td>
                    @if ($tipo->status === 0)
                      <span class="badge badge-danger">Bloqueada</span>
                    @else
                      <span class="badge badge-primary">Disponible</span>
                    @endif
                  </td>
                  <td>
                    @if ($tipo->piso === null)
                      N/A
                    @else
                      {{ $tipo->piso }}
                    @endif
                  </td>
                  <td>
                    ${{ $tipo->precio_venta }}
                  </td>
                  <td>
                    {{ $tipo->uf_m2 }}
                  </td>
                  <td>
                    {{-- delete --}}
                    <a
                      href="javascript:void(0);"
                      class="btn btn-sm btn-danger"
                      onclick="
                        event.preventDefault();
                        swal.fire({
                          text: '¿Deseas eliminar la tipologia?',
                          showCancelButton: true,
                          cancelButtonText: `Cancelar`,
                          cancelButtonColor:'#62A4C0',
                          confirmButtonColor:'red',
                          confirmButtonText:'Eliminar',
                          icon:'error',
                        }).then((result) => {
                          if (result.isConfirmed) {
                            document.getElementById('{{ 'tipoDestroy'.$tipo->id }}').submit();
                          }
                        });
                      "
                      data-toggle="tooltip" data-placement="top" title="Borrar Unidad">
                      <i class="fas fa-trash"></i>
                    </a>
                    <form id="{{ 'tipoDestroy'.$tipo->id }}"
                      action="{{ route('tipo.destroy', $tipo->id) }}"
                      method="POST"
                      style="display: none;"
                      >@method('DELETE') @csrf
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <th class="main-color">No se encontraron tipologias asociadas al proyecto.</th>
                </tr>
              @endforelse
            </tbody>
          </table>
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
