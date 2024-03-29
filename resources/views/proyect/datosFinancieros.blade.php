<div class="card mb-section-card">
  <!-- Title -->

  <h1 class="card-title mb-section-card-title mt-1">
    Datos financieros
    <i class="fas fa-chart-line main-color"></i>
  </h1>

  <div class="card-body row align-items-center">
    <!-- Panel 2 -->
    <div class="col-md-4 text-center df-item-mb">
      <h1 class="mb-datos-num">{{ $proyect->getPrecioPromedio() }}</h1>
      <h5 class="mb-datos-text">Precio Promedio</h5>
    </div>

    <!-- Panel 3 -->
    <div class="col-md-4 text-center df-item-mb">
      <h1 class="mb-datos-num">{{ $proyect->getUF_M2() }}</h1>
      <h5 class="mb-datos-text">UF/m<sup>2</sup> Promedio</h5>
    </div>

    <!-- Panel 4 -->
    <div class="col-md-4 text-center">
      <h1 class="mb-datos-num">{{ count($proyect->unidades) }}</h1>
      <h5 class="mb-datos-text">Unidades</h5>
    </div>

  </div>
</div>
