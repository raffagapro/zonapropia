<div class="card mb-section-card">
  <!-- Title -->
  <h1 class="card-title mb-section-card-title mt-1">{{ $proyect->name }}</h1>
  <div class="card-body row pt-0">
    <div class="col">
      <!-- Specs -->
      <div class="row">
        <div class="col-4">
          <small class="mb-section-card-item"><i class="fas fa-map-marker-alt" style="color:red;"></i> {{ $proyect->comuna->name }}</small>
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
      <p class="mt-3">{{ $proyect->texto_proyecto }}</p>
    </div>
  </div>
</div>
