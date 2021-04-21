<div class="section-cont">
  {{-- Title --}}
  <div class="row text-center section-title-cont padding-wrapper">
    <div class="col">
      <h1 class="section-title">Busca tu propiedad</h1>
      <h4 class="section-body">
        ¿Qué es lo que necesitas? A continuación te dejamos algunas alternativas para hacer más rápida tu búsqueda.
      </h4>
    </div>
  </div>
  {{-- BTNS --}}
  <div class="row text-light text-center pt-2 pb-80">
    <!-- Row1 -->
    {{-- inversion  --}}
    <div class="col-md-6 pir0">
      <a href="#" class="noLink" onclick="event.preventDefault(); document.getElementById('inversionBtn').submit();">
        <div class="panel-icon panel-icon-inver">
          <div>
            <i class="fas fa-hand-holding-usd pi-size"></i>
            <h4>Para Inversión</h4>
          </div>
        </div>
      </a>
      <form 
      id="inversionBtn"
        style="display: none;"
        action="{{ route('proyects.search') }}" method="POST">
        @csrf
        <input type="hidden" name="tag" value={{ App\Models\Taggable::where('name', 'inversion')->first()->id }}>
      </form>
    </div>

    {{-- vivir  --}}
    <div class="col-md-6 pir0">
      <a href="#" class="noLink" onclick="event.preventDefault(); document.getElementById('vivirBtn').submit();">
        <div class="panel-icon panel-icon-vivir">
        <div>
          <i class="fas fa-home pi-size"></i>
          <h4>Para Vivir</h4>
        </div>
      </div>
      <form 
      id="vivirBtn"
        style="display: none;"
        action="{{ route('proyects.search') }}" method="POST">
        @csrf
        <input type="hidden" name="tag" value={{ App\Models\Taggable::where('name', 'vivir')->first()->id }}>
      </form>
    </div>
    <!-- Row2 -->
    {{-- ultimas unidades  --}}
    <div class="col-md-6 col-lg-4 pir0">
      <a href="#" class="noLink" onclick="event.preventDefault(); document.getElementById('ultimaBtn').submit();">
        <div class="panel-icon panel-icon-unidades">
        <div>
          <i class="fas fa-tags pi-size"></i>
          <h4>Últimas Unidades</h4>
        </div>
      </div>
      </a>
      <form 
        id="ultimaBtn"
        style="display: none;"
        action="{{ route('proyects.search') }}" method="POST">
        @csrf
        <input type="hidden" name="tag" value={{ App\Models\Taggable::where('name', 'ultima unidad')->first()->id }}>
      </form>
    </div>

    {{-- nuevos proyectos  --}}
    <div class="col-md-6 col-lg-4 pir0">
      <a href="#" class="noLink" onclick="event.preventDefault(); document.getElementById('nuevoBtn').submit();">
        <div class="panel-icon panel-icon-proyectos">
          <div>
            <i class="fas fa-key pi-size"></i>
            <h4>Nuevos Proyectos</h4>
          </div>
        </div>
      </a>
      <form 
        id="nuevoBtn"
        style="display: none;"
        action="{{ route('proyects.search') }}" method="POST">
        @csrf
        <input type="hidden" name="tag" value={{ App\Models\Taggable::where('name', 'nuevo proyecto')->first()->id }}>
      </form>
    </div>

    {{-- sustentable  --}}
    <div class="col-md-6 col-lg-4 pir0">
      <a href="#" class="noLink" onclick="event.preventDefault(); document.getElementById('susBtn').submit();">
        <div class="panel-icon panel-icon-sustentables">
          <div>
            <i class="fas fa-globe-americas pi-size"></i>
            <h4>Sustentables</h4>
          </div>
        </div>
      </a>
      <form 
        id="susBtn"
        style="display: none;"
        action="{{ route('proyects.search') }}" method="POST">
        @csrf
        <input type="hidden" name="tag" value={{ App\Models\Taggable::where('name', 'sustentable')->first()->id }}>
      </form>
    </div>

    <!-- Row3 -->
    {{-- venta verde  --}}
    <div class="col-md-6 pir0">
      <a href="#" class="noLink" onclick="event.preventDefault(); document.getElementById('verdeBtn').submit();">
        <div class="panel-icon  panel-icon-ventas">
          <div>
            <i class="fas fa-money-check-alt pi-size"></i>
            <h4>Venta en Verde</h4>
          </div>
        </div>
      </a>
      <form 
        id="verdeBtn"
        style="display: none;"
        action="{{ route('proyects.search') }}" method="POST">
        @csrf
        <input type="hidden" name="tag" value={{ App\Models\Taggable::where('name', 'venta en verde')->first()->id }}>
      </form>
    </div>

    {{-- inmediata  --}}
    <div class="col-md-6 pir0">
      <a href="#" class="noLink" onclick="event.preventDefault(); document.getElementById('entregaBtn').submit();">
        <div class="panel-icon panel-icon-entrega">
          <div>
            <i class="fas fa-business-time pi-size"></i>
            <h4>Entrega Inmediata</h4>
          </div>
        </div>
      </a>
      <form 
        id="entregaBtn"
        style="display: none;"
        action="{{ route('proyects.search') }}" method="POST">
        @csrf
        <input type="hidden" name="tag" value={{ App\Models\Taggable::where('name', 'entrega inmediata')->first()->id }}>
      </form>
    </div>

  </div>
</div>
