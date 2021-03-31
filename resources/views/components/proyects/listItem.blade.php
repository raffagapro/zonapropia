@props([
  'proyect' => $proyect,
])

<div class="col-12 mb-4">
  <a href="{{ route('proyect.show', $proyect->id )}}" class="grid-item-link">
    <div class="card item-main-grid">
      <div class="row align-items-center">
        <!-- IMG -->
        <div class="col-md-6">
          @if ($proyect->media->where('name', 'main')->first() === null)
            <img src="{{ asset('assets/images/main_default.png') }}" alt="" class="item-main-list-img">
          @else 
            <img src="{{ asset($proyect->media->where('name', 'main')->first()->loc) }}" alt="" class="item-main-list-img">
          @endif
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
              <a href="{{ route('proyects.unlike', [$proyect->id, Auth::user()->id])}}" class="like-icon2">
                <i class="fas fa-heart fa-2x main-color"></i>
              </a>
            @else
              <a href="{{ route('proyects.like', [$proyect->id, Auth::user()->id])}}" class="like-icon2">
                <i class="far fa-heart fa-2x"></i>
              </a>    
            @endif
          @endauth
          <!-- Badges -->
          <div class="row list-badge-cont">
            @foreach ($proyect->tags as $tag)
              <span class="badge cust-badges badge-{{ $tag->color }} mr-1">{{ $tag->name }}</span>
            @endforeach
          </div>
        </div>
        <!-- BODY -->
        <div class="col-md-6">
          <div class="card-body row">
            <!-- Title & Map Marker -->
            <div class="col-12">
              <h5 class="card-title list-title">{{ $proyect->name }}</h5>
              <h6 class="list-subtitle-mapmarker"><i class="fas fa-map-marker-alt" style="color:red;"></i> {{ $proyect->comuna->name }}</h6>
            </div>
            <!-- Beds & Square Room -->
            <div class="col-12">
              <div class="row mt-3">
                <div class="col-lg-6">
                  @if ((int)$proyect->maxRooms !== 0)
                    <small class="bed-square-room"><i class="fas fa-bed gm-icon"></i> {{ $proyect->minRooms }} - {{ $proyect->maxRooms }}</small>
                  @endif
                </div>
                <div class="col-lg-6 go-right">
                  <small class="bed-square-room"><i class="fas fa-expand-arrows-alt gm-icon"></i> {{ $proyect->minMC }} - {{ $proyect->maxMC }} m<sup>2</sup></small>
                </div>
              </div>
            </div>
            <!-- Divider -->
            <div class="col-12">
              <hr>
            </div>
            <!-- Rating and MISC -->
            <div class="col-12">
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
                    <h5 class="list-rating-anex">Desde {{ $proyect->getUF() }}</h5>
                  @else
                    <h5 class="list-rating-anex">Próximamente</h5>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </a>
</div>
