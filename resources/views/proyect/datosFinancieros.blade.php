<div class="card mb-section-card">
  <div class="card-body row align-items-center">
    <div class="col-1">
      <img src="{{ asset('./assets/images/bar-chart-icon.png') }}" alt="">
    </div>
    <div class="col-4 text-center">
      <h2 class="mb-section-card-title mt-1">Datos financieros</h2>
    </div>
    <div class="col-3 text-center">
      <h1 class="mb-datos-num">{{ $proyect->getPrecioPromedio() }}</h1>
      <h5 class="mb-datos-text">Precio Promedio</h5>
    </div>
    <div class="col-2 text-center">
      <h1 class="mb-datos-num">{{ $proyect->getUF_M2() }}</h1>
      <h5 class="mb-datos-text">UF/m<sup>2</sup> Promedio</h5>
    </div>
    <div class="col-2 text-center">
      <h1 class="mb-datos-num">{{ count($proyect->unidades) }}</h1>
      <h5 class="mb-datos-text">Unidades</h5>
    </div>
  </div>
</div>
