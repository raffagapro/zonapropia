<div class="card shadow-sm">
    <div class="card-body">
      <h3 class="card-title">Cotizaciones</h3>
      <table class="table">
        <thead>
          <tr>
            <th>Fecha creación</th>
            <th>Proyecto</th>
            <th>Unidad</th>
            <th>Estacionamiento</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @forelse (App\Models\Cotizacion::where('user_id', auth()->user()->id)->get() as $cot)
            <tr>
              <td>{{ $cot->created_at->diffForHumans() }}</td>
              <td>{{ $cot->proyecto->name }}</td>
              <td>{{ $cot->unidad->modelo }}</td>
              <td>{{ $cot->estacionamiento->name }}</td>
              <td><a class="main-color" href="{{ route('cotizacion.index', $cot->id) }}"><i class="far fa-file-pdf"></i></a></td>
            </tr>
          @empty
            <tr>
              <th class="main-color">No tienes cotizaciones.</th>
            </tr>
          @endforelse
        </tbody>
      </table>
      {{--  <hr>
      <div class="text-right">
        pagination here
      </div>  --}}
    </div>
  </div>