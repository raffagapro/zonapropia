<div class="col-md-10 rightpanel2">
  <!-- Tab Content -->
  <div class="tab-content" id="v-pills-tabContent">
    <!-- Cotizaciones Tab -->
    <div class="tab-pane fade show active" id="v-pills-cotizaciones" role="tabpanel" aria-labelledby="v-pills-cotizaciones-tab">
      <x-profile.profileTabPanes.cotizaciones />
    </div>

    <!-- Reservas Tab -->
    <div class="tab-pane fade" id="v-pills-reservas" role="tabpanel" aria-labelledby="v-pills-reservas-tab">
      <x-profile.profileTabPanes.reservas />
    </div>

    <!-- Pre Aprobaciones Tab -->
    <div class="tab-pane fade" id="v-pills-preAprobaciones" role="tabpanel" aria-labelledby="v-pills-preAprobaciones-tab">
      <x-profile.profileTabPanes.preAprobaciones />
    </div>

    <!-- Propiedades Favoritas Tab -->
    <div class="tab-pane fade" id="v-pills-propiedadesFavoritas" role="tabpanel" aria-labelledby="v-pills-propiedadesFavoritas-tab">
      <x-profile.profileTabPanes.propiedadesFavoritas />
    </div>
    
    <!-- Perfil Tab -->
    <div class="tab-pane fade" id="v-pills-perfil" role="tabpanel" aria-labelledby="v-pills-perfil-tab">
      <x-profile.profileTabPanes.perfil :user="$user" />
    </div>
  </div>
</div>
