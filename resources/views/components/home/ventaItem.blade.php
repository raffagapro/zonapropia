@props([
  'proyect' => $proyect,
])
<a href="{{ route('proyect.show', $proyect->id )}}" class="text-light">
  <div class="slider-cont-cards">
  <div class="card text-white singlePanelSlider section-slide1"
    style="background-image:url({{ asset($proyect->media->where('name', 'main')->first()->loc) }})"
  >
    <div class="card-body">
      <!-- Badges -->
      <div class="text-right">
        @foreach ($proyect->tags as $tag)
          <span class="badge cust-badges badge-{{ $tag->color }}">{{ $tag->name }}</span>
        @endforeach
      </div>
      <!-- Body -->
      <div class="slide-body">
        <small><i class="fas fa-map-marker-alt"></i> {{ $proyect->comuna->name }}</small>
        <h6>{{ $proyect->name }}</h6>
        @if ($proyect->getUF())
          <h4>{{ $proyect->getUF() }}</h4>
        @else
          <h4>Próximamente</h4>
        @endif
        <small>
          @if ((int)$proyect->maxRooms !== 0)
            {{ $proyect->minRooms }} - {{ $proyect->maxRooms }} Dorm |
          @endif
          @if ((int)$proyect->maxBathrooms !== 0)
            {{ $proyect->minBathrooms }} - {{ $proyect->maxBathrooms }} Baños |
          @endif
          {{ $proyect->minMC }} - {{ $proyect->maxMC }}m<sup>2</sup> </small>
      </div>
    </div>
  </div>
</div>
</a>
