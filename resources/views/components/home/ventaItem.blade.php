@props([
  'proyect' => $proyect,
])

  <div class="slider-cont-cards">
  <div class="card text-white singlePanelSlider section-slide1"
    @if ($proyect->media->where('name', 'main')->first() === null)
      style="background-image:url({{ asset('assets/images/main_default.png') }})"
    @else 
      style="background-image:url({{ Storage::url($proyect->media->where('name', 'main')->first()->loc) }})"
    @endif
  >
    <div class="card-body">
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
          <a href="{{ route('proyects.unlike', [$proyect->id, Auth::user()->id])}}" class="like-icon">
            <i class="fas fa-heart fa-2x main-color"></i>
          </a>
        @else
          <a href="{{ route('proyects.like', [$proyect->id, Auth::user()->id])}}" class="like-icon">
            <i class="far fa-heart fa-2x"></i>
          </a>    
        @endif
      @endauth
      <!-- Badges -->
      <div class="text-right">
        @foreach ($proyect->tags as $tag)
          <span class="badge cust-badges badge-{{ $tag->color }}">{{ $tag->name }}</span>
        @endforeach
      </div>
      <!-- Body -->
      <div class="slide-body">
        <a href="{{ route('proyect.show', $proyect->id )}}" class="text-light">
          <small><i class="fas fa-map-marker-alt"></i> {{ $proyect->comuna->name }}</small>
          <h6>{{ $proyect->name }}</h6>
          @if ($proyect->getUF())
            <h6>{{ $proyect->getUF() }}</h6>
          @else
            <h6>Próximamente</h6>
          @endif
          <small>
            @if ((int)$proyect->maxRooms !== 0)
              {{ $proyect->minRooms }} - {{ $proyect->maxRooms }} Dorm |
            @endif
            @if ((int)$proyect->maxBathrooms !== 0)
              {{ $proyect->minBathrooms }} - {{ $proyect->maxBathrooms }} Baños |
            @endif
            {{ $proyect->minMC }} - {{ $proyect->maxMC }}m<sup>2</sup>
          </small>
        </a>
      </div>
    </div>
  </div>
</div>

