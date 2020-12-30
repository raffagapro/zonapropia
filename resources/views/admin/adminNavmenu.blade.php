<nav class="navbar navbar-expand-lg navbar-light navbar-bg">
  <div class="container">
    {{-- Main Logo --}}
    <a class="navbar-brand mt-2 mb-2" href="{{ route('home')}}">
      <img class="nav-bar-logo" src="{{ asset('assets/images/logos/zp_logo.png') }}" alt="" loading="lazy">
    </a>
    {{-- Responsive BTNs --}}
    <div>
      <a href="{{ route('home')}}"
        class="nbtis btn navBar-btn bg-main-color text-light"
        data-toggle="tooltip" data-placement="top" title="Admin">
        <i class="fas fa-home"></i>
      </a>
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
      <a
        href="javascript:void(0);"
        class="nbtis btn navBar-btn"
        data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="main-color fas fa-bars"></i>
      </a>
    </div>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      {{-- Main Links --}}
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link active" href="{{ route('adminPanel.index')}}">
            <span class="nav-link-text">
              Usuarios
            </span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="{{ route('notice.index')}}">
            <span class="nav-link-text">
              Anuncios
            </span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="{{ route('adminPanel.index')}}">
            <span class="nav-link-text">
              Propiedades
            </span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="{{ route('adminPanel.index')}}">
            <span class="nav-link-text">
              Categorias
            </span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="{{ route('adminPanel.index')}}">
            <span class="nav-link-text">
              Socios
            </span>
          </a>
        </li>

      </ul>
      {{-- Login BTNS --}}
      <div class="form-inline my-2 my-lg-0">
        <a href="{{ route('home')}}" class="nbnlg-btn btn navBar-btn bg-main-color text-light" data-toggle="tooltip" data-placement="top" title="Sitio Principal">
          <i class="fas fa-home"></i>
        </a>
        <form action="{{ route('logout')}}" method="post">
          @csrf
          <button class="nbnlg-btn btn navBar-btn navBar-btn-outline main-color" type="submit" data-toggle="tooltip" data-placement="top" title="Terminar sesión">
            <i class="fas fa-sign-out-alt"></i>
          </button>
        </form>
      </div>
    </div>
  </div>
</nav>
