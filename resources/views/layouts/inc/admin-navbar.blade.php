<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{ route('admin.dashboard') }}">Admin Panel</a>

    <!-- Navbar-->
    <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle pe-4" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fas fa-user"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('logout.perform') }}">Çıkış</a></li>
            </ul>
        </li>
    </ul>
</nav>
