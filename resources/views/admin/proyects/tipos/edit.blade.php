@extends('layouts.adminDashboard')
@section('title', 'Editar Tipologia')

@section('content')
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">

      {{-- Title --}}
      <div class="row align-items-center">
        <h2 class="card-title mb-section-card-title">Editar Tipologia: {{$tipo->modelo}}&nbsp</h2>
        <a href="{{ route('tipo.index') }}" class="border-left mt-3 td-none">&nbsp Regresar a Tipologias.</a>
      </div>

      {{-- General info form --}}
      <div class="card mb-section-card">
        {{-- Title --}}
        <h4 class="card-title mb-section-card-title mt-1 mb-4">Información general</h4>
        {{-- General info --}}
        <div class="container">
          <form action="{{ route('tipo.update', $tipo->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- modelo --}}
            <div class="form-group">
              <label for="titulo">Titulo</label>
              <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror" value="{{ $tipo->titulo }}">
              @error('modelo')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            {{-- Media --}}
            <div class="form-group">
              <label for="media">Imagen (552x552px, 1MB max)</label><br>
              @if ($tipo->media !== null)
                <img src="{{ Storage::url($tipo->media) }}" alt="">
              @else
                <h1>Sin imagen en registro.</h1>
              @endif
              <input
                type="file"
                class="form-control-file @error('media') is-invalid @enderror"
                data-default-file="url_of_your_file"
                name="media"/>
              @error('media')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <button type="submit" class="btn bg-main-color navBar-btn text-light float-right mb-3">Actualizar Tipologia</button>
          </form>
        </div>
      </div>

      {{-- Unidades table --}}
      <div class="card mb-section-card">
        {{-- Title --}}
        <h4 class="card-title mb-section-card-title mt-1">
          Unidades
        </h4>
        <div class="container">
          {{-- unidades form  --}}
          <form action="{{ route('tipo.addUnid', $tipo->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- Proyecto / Unidad --}}
            <div class="form-group row">
              {{-- Proyecto --}}
              <div class="col-6">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <label for="region">Proyecto</label>
                <select class="form-control" name="proyecto" id="proyecto">
                  @php $proyectos = App\Models\Proyecto::all(); @endphp
                  @foreach ($proyectos as $proyecto)
                    <option value="{{ $proyecto->id }}">{{ $proyecto->name }}</option>
                  @endforeach
                </select>
              </div>
              {{-- Unidad --}}
              <div class="col-6">
                <label for="provincia">Unidad</label>
                <select class="form-control" name="unidad" id="unidad">
                  <option value='z'>Sin unidad</option>
                  @forelse ($proyectos[0]->unidades as $unidad)
                      <option value="{{ $unidad->id }}">{{ $unidad->modelo }}</option> 
                    @empty
                      <option>No hay unidades en el proyecto</option>
                    @endforelse
                </select>
              </div>
            </div>
            <button type="submit" class="btn bg-main-color navBar-btn text-light float-right mb-3">Agregar a Unidad</button>
          </form>
          {{-- Table --}}
          <table class="table table-hover mt-4 table-responsive-sm">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Modelo</th>
                <th scope="col">Proyecto</th>
                <th scope="col">Control</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($tipo->unidades as $unidad)
                <tr>
                  <th scope="row">{{ $unidad->id }}</th>
                  <td>{{ $unidad->modelo }}</td>
                  <td>{{ $unidad->proyecto->name }}</td>
                  <td>
                    <a
                      href="javascript:void(0);"
                      class="btn btn-sm btn-danger"
                      onclick="
                        event.preventDefault();
                        swal.fire({
                          text: '¿Deseas remover la unidad?',
                          showCancelButton: true,
                          cancelButtonText: `Cancelar`,
                          cancelButtonColor:'#62A4C0',
                          confirmButtonColor:'red',
                          confirmButtonText:'Eliminar',
                          icon:'error',
                        }).then((result) => {
                          if (result.isConfirmed) {
                            document.getElementById('{{ 'unidadRm'.$unidad->id }}').submit();
                          }
                        });
                      "
                      data-toggle="tooltip" data-placement="top" title="Desactivar usuario">
                      <i class="fas fa-times"></i>
                    </a>
                    <form id="{{ 'unidadRm'.$unidad->id }}"
                      action="{{ route('tipo.rmUnid', [$unidad->id, $tipo->id]) }}"
                      method="GET"
                      style="display: none;"
                      >@csrf
                    </form>
                  </td>
                </tr>
              @empty
                  
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
@endsection

@section('scripts')
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
  <script src="{{ asset('js/ajax/proyectSwitcherEdit.js') }}" ></script>
@endsection
