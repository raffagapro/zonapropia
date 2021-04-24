<div class="logo-bar-cont">
  <div class="container">
    <div class="row m-0 justify-content-center align-items-center">
      @forelse ($inmos as $inmo)
        <div class="col-6 col-md-3 col-lg-2">
          <img class="logo-bar-item" src="{{ Storage::url($inmo->logo) }}" alt="">
        </div>
      @empty

      @endforelse
    </div>
  </div>
</div>
