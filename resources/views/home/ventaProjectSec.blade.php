<div class="section-cont row">
  <!-- Left Panel -->
  <div class="col-lg-5 section-lpanel">
    <div>
      <x-triTitle
        :subtitle="'Zonapropia'"
        :title="'Venta de proyectos'"
        :par="'Contamos con proyectos privados y de subsidio. Encuentra el que se adapte mejor a tus necesidades, según tamaño, ubicación y tipo de propiedad.'"
      />
      <button type="submit" class="btn general-btn-sec bg-sec-color" >Más proyectos</button>
    </div>
  </div>
  <!-- Right Panel -->
  <div class="col-lg-7 section-rpanel">
    <div class="row section-rcardpanel p-0">
      <x-proyect-highlight-slider />
    </div>
  </div>
</div>
