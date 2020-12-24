@props([
  'devClass' => $devClass ?? '',
])

<div class="col-md-6 slider-cont-cards {{$devClass}}">
  <div class="card text-white singlePanelSlider section-slide1">
    <div class="card-body">
      <!-- Badges -->
      <div class="text-right">
        <span class="badge cust-badges dark-blue-bg">Icuadra</span>
        <span class="badge cust-badges badge-danger">DS 19</span>
      </div>
      <!-- Body -->
      <div class="slide-body">
        <small><i class="fas fa-map-marker-alt"></i> San Bernardo</small>
        <h6>Bosque de San Bernardo</h6>
        <h4>Desde UF 1.200</h4>
        <small>2 - 3 Dorms | 1 - 2 Baños | 45 - 74m<sup>2</sup> </small>
      </div>
    </div>
  </div>
</div>
