@if (count($proyects) > 0)
  <div class="card mb-section-card mt-0">
    <div class="card-body row mt-2 mb-5">
      <div class="col-12 mt-4">
        <h5>Agregados recientemente </h5>
        @foreach ($proyects as $proyect)
          <!-- item -->
          <div class="row mt-4 align-items-center">
            <div class="col-5">
              <img src="{{ asset($proyect->media->where('name', 'main')->first()->loc) }}" class="mini-card-img">
            </div>
            <div class="col-7">
              <h6 class="mb-0">{{ $proyect->name }}</h6>
              <small class="mb-section-card-item"><i class="fas fa-map-marker-alt" style="color:red;"></i> {{ $proyect->comuna->name }}</small>
              <div class="w-100%"></div>
              @if ((int)$proyect->maxRooms !== 0)
                <small><i class="fas fa-bed"></i> {{ $proyect->minRooms }} - {{ $proyect->maxRooms }} dorms.</small>
              @endif
              <small><i class="fas fa-expand-arrows-alt"></i> {{ $proyect->minMC }} - {{ $proyect->maxMC }} m<sup>2</sup></small>
              @if ($proyect->getUF())
                <h6 class="mb-section-card-item mb-0 pb-0">Desde {{ $proyect->getUF() }}</h6>
              @else
                <h6 class="mb-section-card-item mb-0 pb-0">Próximamente</h6>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endif
