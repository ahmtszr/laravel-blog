<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-house-door-fill" viewBox="0 0 16 16">
                    <path
                        d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                </svg>
            </a>
            <ul class="nav col-12 col-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="nav-link px-2 text-white">Anasayfa</a></li>
                <li><a href="/blog" class="nav-link px-2 text-white">Tüm Bloglar</a></li>
                @auth
                    <li><a href="{{ route('my-blog.show')}}" class="nav-link px-2 text-white">Bloglarım</a></li>
                @endauth

                <li><a href="{{ route('blog-about-us.view') }}" class="nav-link px-2 text-white">Hakkımızda</a></li>
                <li><a href="{{ route('blog-contact.view') }}" class="nav-link px-2 text-white">İletişim</a></li>
            </ul>

            @auth
            <div class="text-end ms-auto">
                {{auth()->user()->name}}
                <a href="{{ route('logout.perform') }}" class="btn btn-outline-light ms-2">Çıkış</a>
            </div>
            @endauth

            @guest
            <div class="text-end ms-auto">
                <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Giriş</a>
                <a href="{{ route('register.perform') }}" class="btn btn-warning">Kayıt Ol</a>
            </div>
            @endguest
        </div>
    </div>
</header>
