<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Menü</div>
                    <a class="nav-link" href="{{ route('admin-posts.view') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Postlar
                    </a>
                    <a class="nav-link" href="{{ route('admin-users.view') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Kullanıcılar
                    </a>
                    <div class="sb-sidenav-menu-heading">Sayfa Yönetimi</div>

                    <a class="nav-link" href="{{ route('blog.homepage') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Blog Anasayfa
                    </a>

                    <a class="nav-link" href="{{ route('admin.about-us.view') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Hakkımızda
                    </a>

                    <a class="nav-link" href="{{ route('admin.contact') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        İletişim
                    </a>

                </div>
            </div>
            <div class="sb-sidenav-footer">
                Blog
            </div>
        </nav>
    </div>

