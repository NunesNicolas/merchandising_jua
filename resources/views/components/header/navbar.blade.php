<nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #144272 !important;">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard.index') }}">
            <img src="{{ asset('assets/img/LogoJuaOficial.png') }}" alt="Logo" height="40"
                class="d-inline-block align-text-top">
        </a>

        <div class="d-flex">
            <button class="navbar-toggler border border-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#bdNavbar"
            aria-controls="bdNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list text-white fs-1"></i>
            </button>
        </div>

        <div class="offcanvas-lg offcanvas-end flex-grow-1" tabindex="-1" id="bdNavbar"
            aria-labelledby="bdNavbarOffcanvasLabel" data-bs-scroll="true" style="background: #144272;">
            <div class="offcanvas-header px-4 pb-0">
                <h5 class="offcanvas-title text-white" id="bdNavbarOffcanvasLabel">Menu</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                    aria-label="Close" data-bs-target="#bdNavbar"></button>
            </div>

            <div class="offcanvas-body p-4 pt-0 p-lg-0">
                <hr class="d-lg-none text-white-50">
                <ul class="navbar-nav flex-column flex-md-row flex-wrap bd-navbar-nav gap-3">
                    <li class="nav-item">
                        <a class="nav-link text-white position-relative {{ Request::is('home') ? 'active' : '' }}" aria-current="page"
                            href="{{ route('dashboard.index') }}">Home</a>
                    </li>
                    @if ($sessao['create_user'] || $sessao['create_parameters'] || $sessao['create_group_permissions'])
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white position-relative {{ Request::is('users') || Request::is('permissions') ? 'active' : '' }}" href="#" id="navbarScrollingDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Configurações
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                @if ($sessao['create_user'])
                                    <li><a class="dropdown-item" href="{{ route('users.index') }}">Usuários</a></li>
                                @endif
                                @if ($sessao['create_parameters'] || $sessao['create_group_permissions'])
                                    <li><a class="dropdown-item" href="{{ route('permissions.index') }}">Grupo de permissões</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                </ul>

                <hr class="d-lg-none text-white-50">
                <ul class="navbar-nav flex-row flex-wrap ms-md-auto">

                    <li class="nav-item dropdown">
                        <button type="button"
                            class="btn btn-link nav-link py-2 px-0 px-lg-2 dropdown-toggle text-white"
                            data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static">
                            Olá, {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li class="dropdown-item">
                                <a class="dropdown-item" href="#"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    Sair</a>

                                <form id="logout-form" action="{{ route('auth.logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</nav>
