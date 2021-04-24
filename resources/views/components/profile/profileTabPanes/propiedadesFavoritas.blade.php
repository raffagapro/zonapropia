<div class="card shadow-sm">
    <div class="card-body">
      <h3 class="card-title">Propiedades Favoritas</h3>
      <table class="table">
        <thead>
          <tr>
            <th>Fecha creación</th>
            <th>Proyecto</th>
            <th>Inmobiliaria</th>
            <th>Tipo de propiedad</th>
            <th>Valoración</th>
            <th><i class="far fa-trash-alt"></i></th>
          </tr>
        </thead>
        <tbody>
          @forelse (Auth::user()->proyects as $p)
            <tr>
              <td>{{ $p->created_at->diffForHumans() }}</td>
              <td>
                <a href="{{ route('proyect.show', $p->id )}}">
                  {{ $p->name }}
                </a>
              </td>
              <td>
                @if ($p->inmobiliaria)
                  {{ $p->inmobiliaria->name }}
                @else
                    -
                @endif
              </td>
              <td>{{ $p->categoria->name }}</td>
              <td>-</td>
              <td>
                <a class="main-color" href="{{ route('proyects.unlike', [$p->id, Auth::user()->id])}}">
                  <i class="far fa-trash-alt"></i>
                </a>
              </td>
            </tr>
          @empty
            <tr>
              <th class="main-color">No se encontraron proyectos favoritos.</th>
            </tr>
          @endforelse
        </tbody>
      </table>
      <hr>

      <div class="text-right">
        pagination here
      </div>
    </div>
  </div>