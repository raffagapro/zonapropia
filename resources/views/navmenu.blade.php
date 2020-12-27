<nav class="navbar navbar-expand-lg navbar-light navbar-bg">
  <div class="container">
    {{-- Main Logo --}}
    <a class="navbar-brand mt-2 mb-2" href="{{ route('home')}}">
      <img class="nav-bar-logo" src="{{ asset('assets/images/logos/zp_logo.png') }}" alt="" loading="lazy">
    </a>
    {{-- Responsive BTNs --}}
    <div>
      <button class="nbtis navbar-toggler bg-main-color text-light" type="submit">
        <i class="fas fa-dollar-sign"></i>
      </button>
      <button style="border-color: #62A4C0;" class="nbtis navbar-toggler" type="submit">
        <i class="main-color fas fa-user"></i>
      </button>
      <button style="border-color: #62A4C0;" class="nbtis navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="main-color fas fa-bars"></i>
      </button>
    </div>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      {{-- Main Links --}}
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('proyects')}}">
            <span class="nav-link-text">
              Proyectos
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span class="nav-link-text">
              Subsidios Habitacionales
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span class="nav-link-text">
              Por qué invertir
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span class="nav-link-text">
              Financiamiento
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span class="nav-link-text">
              Respaldo
            </span>
          </a>
        </li>
      </ul>
      {{-- Login BTNS --}}
      <div class="form-inline my-2 my-lg-0">
        <button class="nbnlg-btn btn navBar-btn bg-main-color text-light">Vende con nosotros</button>
        @guest
          <button class="nbnlg-btn btn navBar-btn navBar-btn-outline main-color" type="button" data-toggle="modal" data-target="#loginModal">
            <span>Iniciar sesión</span>
            <i class="fas fa-user navBar-btn-icon"></i>
          </button>
        @endguest
        @auth
          @if (auth()->user()->hasRoles('super admin'))
            <a href="{{ route('dashboard')}}" class="nbnlg-btn btn navBar-btn bg-main-color text-light" data-toggle="tooltip" data-placement="top" title="Admin">
              <i class="fas fa-user-cog"></i>
            </a>
          @endif
          <form action="{{ route('logout')}}" method="post">
            @csrf
            <button class="nbnlg-btn btn navBar-btn navBar-btn-outline main-color" type="submit" data-toggle="tooltip" data-placement="top" title="Terminar sesión">
              <i class="fas fa-sign-out-alt"></i>
            </button>
          </form>
        @endauth
      </div>
    </div>
  </div>
</nav>

{{-- This opens the modal if there is a validation error --}}
@if (count($errors) > 0)
  <script type="text/javascript">
    $( document ).ready(function() {
      $('#loginModal').modal('show');
    });
  </script>
@endif
{{-- This detects if the validation error was from the register window --}}
@if (old('originTab') === 'register')
  <script type="text/javascript">
    $( document ).ready(function() {
      $('#loginTabs a[href="#register"]').tab('show')
    });
  </script>
@endif


{{-- Login Modal --}}
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row login-modal-container">
          {{-- Left Panel --}}
          <div class="col-md-6">
            <ul class="nav nav-pills mb-4" id="loginTabs" role="tablist">
              {{-- Tabs --}}
              <li class="nav-item mr-3" role="presentation">
                <a class="login-modal-tab active" id="pills-home-tab" data-toggle="pill" href="#login" role="tab" aria-controls="pills-home" aria-selected="true">Ingresar</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="login-modal-tab" id="pills-profile-tab" data-toggle="pill" href="#register" role="tab" aria-controls="pills-profile" aria-selected="false">Registrarse</a>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              {{-- Login Content --}}
              <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="pills-profile-tab">
                @include('auth.login')
              </div>

              {{-- Register Content --}}
              <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="pills-contact-tab">
                @include('auth.register')
              </div>

            </div>
          </div>
          {{-- Right Panel --}}
          <div class="col-md-6">
            <img src="./assets/images/login-modal-img.png" width="100%">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
