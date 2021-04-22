<div class="card mb-section-card">
  <!-- Title -->
  <div class="row">
    <div class="col-6">
      <h1 class="card-title mb-section-card-title mt-1">{{ $proyect->name }}</h1>
    </div>
    <div class="col-6 text-right pt-3 pr-5">
      <!-- LIKED -->
      @auth
        @php
          $fGo = false;
        @endphp
        @foreach (Auth::user()->proyects as $p)
          @if ((int)$p->id === (int)$proyect->id)
            @php $fGo = true; @endphp
          @endif
        @endforeach
        @if ($fGo)
          <a href="{{ route('proyects.unlike', [$proyect->id, Auth::user()->id])}}">
            <i class="fas fa-heart fa-2x main-color"></i>
          </a>
        @else
          <a href="{{ route('proyects.like', [$proyect->id, Auth::user()->id])}}">
            <i class="far fa-heart fa-2x main-color"></i>
          </a>    
        @endif
      @endauth
    </div>
  </div>
  <div class="card-body row pt-0">
    <div class="col">
      <!-- Specs -->
      <div>
        <small class="mb-section-card-item mr-4"><i class="fas fa-map-marker-alt" style="color:#f946a8;"></i> {{ $proyect->comuna->name }}</small>
        @if ((int)$proyect->maxRooms !== 0)
          <small class="mb-section-card-item mr-4"><i class="fas fa-bed main-color"></i> {{ $proyect->minRooms }} - {{ $proyect->maxRooms }}</small>
        @endif
        @if ((int)$proyect->maxBathrooms !== 0)
          <small class="mb-section-card-item mr-4"><i class="fas fa-toilet main-color"></i> {{ $proyect->minBathrooms }} - {{ $proyect->maxBathrooms }}</small>
        @endif
        <small class="mb-section-card-item mr-4"><i class="fas fa-expand-arrows-alt main-color"></i> {{ $proyect->minMC }} - {{ $proyect->maxMC }} m<sup>2</sup></small>
      </div>
      {{--  <div class="row">
        <div class="col-4">
          <small class="mb-section-card-item"><i class="fas fa-map-marker-alt" style="color:#f946a8;"></i> {{ $proyect->comuna->name }}</small>
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
      </div>  --}}
      <!-- Desc -->
      <p class="proyect-desc mt-3">{{ $proyect->texto_proyecto }}</p>
    </div>
  </div>
</div>
