<nav class="navbar navbar-expand-lg navbar-light navbar-bg">
  <div class="container">
    {{-- Main Logo --}}
    <a class="navbar-brand mb-2" href="{{ route('home')}}">
    {{-- <a class="navbar-brand mt-2 mb-2" href="{{ route('home')}}"> --}}
      {{-- <img class="nav-bar-logo" src="{{ asset('assets/images/logos/zp_logo.png') }}" alt="" loading="lazy"> --}}
      <img class="nav-bar-logo" src="{{ asset('assets/images/logos/zp_logo2.png') }}" alt="" loading="lazy">
    </a>
    {{-- Responsive BTNs --}}
    <div>
      <a href=""
        class="nbtis btn navBar-btn bg-main-color text-light"
        data-toggle="tooltip" data-placement="top" title="Vende con nosotros">
        <i class="fas fa-dollar-sign"></i>
      </a>
      @auth
        @if (auth()->user()->hasRoles('super admin'))
          <a href="{{ route('adminPanel.index')}}"
            class="nbtis btn navBar-btn bg-main-color text-light"
            data-toggle="tooltip" data-placement="top" title="Admin">
            <i class="fas fa-user-cog"></i>
          </a>
        @endif
        <a
          href="javascript:void(0);"
          onclick="event.preventDefault(); document.getElementById('logout').submit();"
          class="nbtis btn navBar-btn"
          data-toggle="tooltip" data-placement="top" title="Terminar sesión">
          <i class="fas fa-sign-out-alt main-color"></i>
        </a>
        <form id="logout"
          action="{{ route('logout') }}"
          method="POST"
          style="display: none;"
          >@csrf
        </form>
      @endauth
      @guest
        <a
          href="javascript:void(0);"
          class="nbtis btn navBar-btn"
          data-toggle="modal" data-target="#loginModal">
          <i class="main-color fas fa-user"></i>
        </a>
      @endguest
      <a
        href="javascript:void(0);"
        class="nbtis btn navBar-btn"
        data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="main-color fas fa-bars"></i>
      </a>
    </div>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      {{-- Main Links --}}
      <ul class="navbar-nav ml-auto mr-1">
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('proyects.index')}}">
            <span class="nav-link-text">
              Proyectos
            </span>
          </a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link" href="#">
            <span class="nav-link-text">
              Subsidios Habitacionales
            </span>
          </a>
        </li> --}}
        <li class="nav-item">
          <a class="nav-link" href="{{ route('Invertir.index')}}">
            <span class="nav-link-text">
              Por qué invertir
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('Financiamiento.index')}}">
            <span class="nav-link-text">
              Financiamiento
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('Respaldo.index')}}">
            <span class="nav-link-text">
              Respaldo
            </span>
          </a>
        </li>
      </ul>
      {{-- Login BTNS --}}
      <div class="form-inline my-2 my-lg-0">
        <a href="{{ route('home').'#vendeForm' }}" class="newProfileBtn bg-main-color text-light" data-toggle="tooltip" data-placement="top" title="Vende con nosotros">
          <i class="fas fa-envelope"></i>
        </a>
        @guest
          <button class="nbnlg-btn btn navBar-btn navBar-btn-outline main-color" type="button" data-toggle="modal" data-target="#loginModal">
            <span>Iniciar sesión</span>
            <i class="fas fa-user navBar-btn-icon"></i>
          </button>
        @endguest
        @auth
          @if (auth()->user()->hasRoles('super admin'))
            <a href="{{ route('adminPanel.index')}}" class="newProfileBtn bg-main-color text-light" data-toggle="tooltip" data-placement="top" title="Admin">
              <i class="fas fa-user-cog"></i>
            </a>
          @endif
          <a 
            href="{{ route('userProfile.index')}}"
            class="newProfileBtn bg-main-color text-light"
            data-toggle="tooltip" data-placement="top" title="{{ auth()-> user()->name }}">
            <i class="fas fa-user" class="main-color"></i>
          </a>
        @endauth
      </div>
    </div>
  </div>
</nav>


@guest
  {{-- This opens the modal if there is a validation error --}}
  @if (old('originTab') === 'login')
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
        $('#loginModal').modal('show');
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
              <img src="{{ asset('assets/images/login-modal-img.png') }}" width="100%">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endguest
