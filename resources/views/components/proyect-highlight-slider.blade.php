<div class="owl-carousel owl-theme">
  @forelse ($proyects as $proyect)
    <div class="item">
      @if ($d)
        <x-home.ventaItem :proyect="$proyect->proyecto"/>
      @else
        <x-home.ventaItem :proyect="$proyect"/>
      @endif
    </div>
  @empty
    {{-- <div class="item"><x-home.ventaItem /></div>
    <div class="item"><x-home.ventaItem /></div> --}}
  @endforelse
</div>

<script type="text/javascript">
  $('.owl-carousel').owlCarousel({
      loop:true,
      margin:10,
      responsiveClass:true,
      autoplay:true,
      nav:true,
      navText: [
        '<div class="btn control control-left text-center"><i class="fas fa-arrow-right"></i></div>',
        '<div class="btn control control-right text-center"><i class="fas fa-arrow-left"></i></div>',
      ],
      responsive:{
          0:{
              items:1,
              nav:true,
          },
          576:{
              items:2,
              nav:true,
          },
      }
  })
</script>
