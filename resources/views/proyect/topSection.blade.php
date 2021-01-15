<div class="card mb-section-card">
  <!-- Title -->
  <h1 class="card-title mb-section-card-title mt-1">{{ $proyect->name }}</h1>
  <div class="card-body row pt-0">
    <div class="col">
      <!-- Specs -->
      <div class="row">
        <div class="col-4">
          <small class="mb-section-card-item"><i class="fas fa-map-marker-alt" style="color:red;"></i> {{ $proyect->comuna }}</small>
        </div>
        <div class="col-2">
          @if ((int)$proyect->maxRooms !== 0)
            <small class="mb-section-card-item"><i class="fas fa-bed"></i> {{ $proyect->minRooms }} - {{ $proyect->maxRooms }}</small>
          @endif
        </div>
        <div class="col-2">
          @if ((int)$proyect->maxBathrooms !== 0)
            <small class="mb-section-card-item"><i class="fas fa-toilet"></i> {{ $proyect->minBathrooms }} - {{ $proyect->maxBathrooms }}</small>
          @endif
        </div>
        <div class="col-4">
          <small class="mb-section-card-item"><i class="fas fa-expand-arrows-alt"></i> {{ $proyect->minMC }} - {{ $proyect->maxMC }} m<sup>2</sup></small>
        </div>
      </div>
      <!-- Desc -->
      <p class="mt-3">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco…
      </p>
    </div>
  </div>
</div>
