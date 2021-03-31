<div class="col mb-5">
  <h3 class="mb-info-title mb-4">Proyectos Similares</h3>
  <div class="row">
    @foreach ($similares as $sim)
      @if ($sim->id !== $proyect->id)
        <div class="col-md-6 col-lg-4">
          <div class="card item-main-grid">
            @if ($sim->media->where('name', 'main')->first() === null)
              <img src="{{ asset('assets/images/main_default.png') }}" alt="" class="item-main-grid-img2">
            @else
              <img src="{{ asset($sim->media->where('name', 'main')->first()->loc) }}" alt="" class="item-main-grid-img2">
            @endif
            <!-- LIKED -->
            @auth
              @php
                $fGo = false;
              @endphp
              @foreach (Auth::user()->proyects as $p)
                @if ((int)$p->id === (int)$sim->id)
                  @php $fGo = true; @endphp
                @endif
              @endforeach
              @if ($fGo)
                <a href="{{ route('proyects.unlike', [$sim->id, Auth::user()->id])}}" class="like-icon">
                  <i class="fas fa-heart fa-2x main-color"></i>
                </a>
              @else
                <a href="{{ route('proyects.like', [$sim->id, Auth::user()->id])}}" class="like-icon">
                  <i class="far fa-heart fa-2x"></i>
                </a>    
              @endif
            @endauth
            <!-- Badges -->
            <div class="row badge-cont">
              @foreach ($sim->tags as $tag)
                <span class="badge cust-badges badge-{{ $tag->color }} mr-1">{{ $tag->name }}</span>
              @endforeach
            </div>
            <div class="card-body">
              <a href="{{ route('proyect.show', $sim->id )}}" class="grid-item-link">
                <!-- Title & Map Marker -->
                <h5 class="card-title grid-title">{{ $sim->name }}</h5>
                <small class="subtitle-mapmarker"><i class="fas fa-map-marker-alt" style="color:red;"></i> {{ $sim->comuna->name }}</small>
                <!-- Beds & Square Room -->
                <div class="row mt-3">
                  <div class="col-lg-6">
                    <small class="bed-square-room"><i class="fas fa-bed gm-icon"></i> {{ $sim->minRooms }} - {{ $sim->maxRooms }}</small>
                  </div>
                  <div class="col-lg-6 go-right">
                    <small class="bed-square-room"><i class="fas fa-expand-arrows-alt gm-icon"></i> {{ $proyect->minMC }} - {{ $proyect->maxMC }} m<sup>2</sup></small>
                  </div>
                </div>
                <hr>
                <!-- Rating and MISC -->
                <div class="row">
                  {{-- <div class="col-lg-6">
                    <i class="fas fa-star star-rating"></i>
                    <i class="fas fa-star star-rating"></i>
                    <i class="fas fa-star star-rating"></i>
                    <i class="fas fa-star star-rating"></i>
                    <i class="far fa-star star-rating-empty"></i>
                  </div> --}}
                  <div class="col go-right">
                    @if ($proyect->getUF())
                      <h4 class="rating-anex">Desde {{ $proyect->getUF() }}</h4>
                    @else
                      <h4 class="rating-anex">Próximamente</h4>
                    @endif
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div> 
      @endif
    @endforeach
  </div>
  {{-- Paginator --}}
  {{$similares->links()}}
</div>
