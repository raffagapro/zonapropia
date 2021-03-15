<div class="col-md-2 leftbar-cont2 text-center">
  <a
    href="javascript:void(0);"
    class="main-color logoutLink"
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
  <div class="nav flex-column nav-pills mt-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <a class="nav-link main-color active" id="v-pills-perfil-tab" data-toggle="pill" href="#v-pills-perfil" role="tab" aria-controls="v-pills-perfil" aria-selected="true">Perfil</a>
    <a class="nav-link main-color" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
    <a class="nav-link main-color" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
    <a class="nav-link main-color" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
  </div>
</div>
