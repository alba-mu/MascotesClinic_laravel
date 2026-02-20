<nav class="navbar navbar-expand-lg navbar-dark shadow clinic-navbar sticky-top">
  <div class="container">
    @auth
    <a class="navbar-brand d-flex align-items-center fw-bold" href="{{ route('home') }}">
      <i class="bi bi-house-door-fill me-2 fs-4 text-warning-light"></i>
      <span class="brand-text">Mascotes Clinic</span>
    </a>
    @else
    <a class="navbar-brand d-flex align-items-center fw-bold" href="{{ route('welcome') }}">
      <i class="bi bi-house-door-fill me-2 fs-4 text-warning-light"></i>
      <span class="brand-text">Mascotes Clinic</span>
    </a>
    @endauth

    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNavbar">
      @auth
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown px-lg-2">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            <i class="bi bi-people-fill me-1"></i> Propietaris
          </a>
          <ul class="dropdown-menu shadow-lg clinic-dropdown animate slideIn">
            <li><a class="dropdown-item" href="{{ route('owner.list') }}"><i class="bi bi-list-ul me-2"></i>Llistar tots</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('owner.search') }}"><i class="bi bi-search me-2"></i>Buscar mascotes</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('owner.modify') }}"><i class="bi bi-pencil-square me-2"></i>Modificar</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown px-lg-2">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            <i class="bi bi-heart-fill me-1"></i> Mascotes
          </a>
          <ul class="dropdown-menu shadow-lg clinic-dropdown animate slideIn">
            <li><a class="dropdown-item" href="{{ route('pet.list') }}"><i class="bi bi-list-ul me-2"></i>Llistar totes</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('pet.search') }}"><i class="bi bi-search me-2"></i>Buscar</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('pet.history') }}"><i class="bi bi-journal-plus me-2"></i>Afegir historial</a></li>
          </ul>
        </li>
      </ul>

      <div class="d-flex align-items-center ms-auto gap-3">
        <form method="POST" action="{{ route('logout') }}" class="m-0">
          @csrf
          <button type="submit" class="btn btn-logout px-4 py-2 shadow-sm">
            <i class="bi bi-box-arrow-right me-2"></i>Logout
          </button>
        </form>
      </div>

      @else
      <div class="d-flex align-items-center ms-auto gap-2">
        <a href="{{ route('login') }}" class="btn btn-clinic-search px-4 py-2 text-white fw-bold shadow-sm">
          <i class="bi bi-box-arrow-in-right me-2"></i>Login
        </a>
        <a href="{{ route('register') }}" class="btn btn-login-outline px-4 py-2">
          <i class="bi bi-person-plus me-2"></i>Registrar-se
        </a>
      </div>
      @endauth
    </div>
  </div>
</nav>
