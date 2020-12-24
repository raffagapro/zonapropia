<div class="section-cont row">
  <!-- Left Panel -->
  <div class="col-lg-5 section-lpanel">
    <div>
      @php
        $subtitle='Zonapropia';
        $title='Venta de proyectos';
        $par='Contamos con proyectos privados y de subsidio. Encuentra el que se adapte mejor a tus necesidades, según tamaño, ubicación y tipo de propiedad.'
      @endphp
      <x-triTitle :subtitle="$subtitle" :title="$title" :par="$par"/>
      <button type="submit" class="btn bg-main-color general-btn" >Más proyectos</button>
    </div>
  </div>
  <!-- Right Panel -->
  <div class="col-lg-7 section-rpanel">
    <div class="row section-rcardpanel p-0">
      <!-- item 1 -->
      <x-home.ventaItem />
      <!-- item 1 -->
      <!-- hide-slide for fontend development only!!!!!!!!! -->
      @php
        $devVariable ='hide-slide';
      @endphp
      <x-home.ventaItem  :devClass="$devVariable"/>

      <!-- Controls -->
      <div class="slide-controls">
        <div class="btn control control-left text-center">
          <i class="fas fa-arrow-left"></i>
        </div>
        <div class="btn control control-right text-center">
          <i class="fas fa-arrow-right"></i>
        </div>
      </div>
    </div>
  </div>
</div>
