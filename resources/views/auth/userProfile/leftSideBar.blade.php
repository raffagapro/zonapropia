<div class="col-md-2 d-flex flex-column text-center leftbar-cont2">
  <div>
    <img src="assets/images/UserDefault.png" alt="User Pic here">
  </div>
  <div class="mt-3">
    <h4>{{$user->name}}</h4>
  </div>
  
  <nav class="nav flex-column nav-pills my-4 text-left h-100" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <a class="nav-link leftbar-nav-link active" id="v-pills-cotizaciones-tab" data-toggle="pill" href="#v-pills-cotizaciones" role="tab" aria-controls="v-pills-cotizaciones" aria-selected="true">Cotizaciones</a>
    <a class="nav-link leftbar-nav-link" id="v-pills-reservas-tab" data-toggle="pill" href="#v-pills-reservas" role="tab" aria-controls="v-pills-reservas" aria-selected="false">Reservas</a>
    <a class="nav-link leftbar-nav-link" id="v-pills-preAprobaciones-tab" data-toggle="pill" href="#v-pills-preAprobaciones" role="tab" aria-controls="v-pills-preAprobaciones" aria-selected="false">Pre Aprobaciones</a>
    <a class="nav-link leftbar-nav-link" id="v-pills-propiedadesFavoritas-tab" data-toggle="pill" href="#v-pills-propiedadesFavoritas" role="tab" aria-controls="v-pills-propiedadesFavoritas" aria-selected="false">Propiedades Favoritas</a>
    <a class="nav-link leftbar-nav-link mt-auto" id="v-pills-perfil-tab" data-toggle="pill" href="#v-pills-perfil" role="tab" aria-controls="v-pills-perfil" aria-selected="false"><i class="fas fa-cog main-color"></i> Configuración</a>
  </nav>

  <div class="mb-2">
    <a
    href="javascript:void(0);"
    class="btn bg-main-color navBar-btn text-light logoutLink"
    onclick="event.preventDefault(); document.getElementById('logout').submit();">
    Terminar Sesion
    <i class="fas fa-sign-out-alt"></i>
    </a>
    <form id="logout"
      action="{{ route('logout')}}"
      method="POST"
      style="display: none;"
      >@method('PUT') @csrf
    </form>
  </div>
</div>
