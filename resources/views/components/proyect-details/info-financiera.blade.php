@props([
  'proyect' => $proyect,
])

<div class="row">
  <!-- Top Panel -->
  <div class="col-12">
    <!-- Proyect Info -->
    <div class="card mb-section-card mt-0">
      <div class="card-body row mt-5 mb-5">
        <!-- Title -->
        <div class="col-md-6">
          <h2 class="mb-info-title">Información financiera</h2>
          <small class="mb-section-card-item"><i class="fas fa-map-marker-alt" style="color:red;"></i> San Miguel - Condominio San Nicolás</small>
        </div>
        <!-- Rating -->
        <div class="col-md-6 mb-pf-rating-align mt-4">
          @if ($proyect->getUF())
            <h1 class="mb-info-rating-title mb-0 pb-0"><span class="mb-info-rating-pretitle">Desde </span>{{ $proyect->getUF() }}</h1>
          @else
            <h1 class="mb-info-rating-title mb-0 pb-0"><span class="mb-info-rating-pretitle">Próximamente</h1>
          @endif
          {{-- <h1 class="mb-info-rating-cont mt-0 pt-0">
            <i class="fas fa-star star-rating"></i>
            <i class="fas fa-star star-rating"></i>
            <i class="fas fa-star star-rating"></i>
            <i class="fas fa-star star-rating"></i>
            <i class="fas fa-star star-rating-empty"></i>
          </h1> --}}
        </div>
        <!-- Paragrap -->
        <div class="col-12 mt-5 text-danger text-center">
          <ul>
            <h5>Gráficos de plusvalía ?????????</h5>
            <li>Tablas de datos (¿?)</li>
            <li>Seguridad del barrio, áreas verdes cercanas, etc</li>
          </ul>
        </div>
      </div>
    </div>

  </div>
</div>
