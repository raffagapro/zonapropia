<div class="row m-0">
  <div class="col-auto-lg l-currency-Bar bg-main-color text-right text-light">
    <span class="lcbar-item lcbar-item-rbordered"><b>Dolar: </b>${{ $dollar }}</span>
    <span class="lcbar-item"><b>UF: </b>{{ $uf }}</span>
  </div>
  <div class="col-lg r-currency-Bar bg-light justify-content-center align-items-center">
    @foreach ($news as $new)
      @php
        $regNew = substr($new->body, 0, 140);
        $tabNew = substr($new->body, 0, 60);
      @endphp
      <small class="onlyDesk newsG mt">
        {{ $regNew.'... ' }}
        <a href="javascript:void(0);" data-toggle="modal" data-target="#newsModal">Ver más</a>
      </small>
      <small class="onlyTabletNmobile newsG gt">
        {{ $tabNew.'... ' }}
        <a href="javascript:void(0);" data-toggle="modal" data-target="#newsModal">Ver más</a>
      </small>
    @endforeach
  </div>
</div>

{{-- Login Modal --}}
<div class="modal fade" id="newsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container">
          <h2 class="main-color mb-2">Anuncios</h2>
          @foreach ($news as $new)
            {{ $new->body.' ( '.$new->created_at->diffForHumans().' )' }}
            <hr>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  var current = 0,
    slides = document.getElementsByClassName("mt");

  setInterval(function() {
  for (var i = 0; i < slides.length; i++) {
    slides[i].style.opacity = 0;
  }
  current = (current != slides.length - 1) ? current + 1 : 0;
  slides[current].style.opacity = 1;
  }, 5000);

  var current2 = 0,
    slides2 = document.getElementsByClassName("gt");

  setInterval(function() {
  for (var i = 0; i < slides.length; i++) {
    slides2[i].style.opacity = 0;
  }
  current2 = (current2 != slides.length - 1) ? current2 + 1 : 0;
  slides2[current2].style.opacity = 1;
  }, 5000);
</script>
