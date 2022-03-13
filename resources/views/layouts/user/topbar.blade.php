<nav class="navbar main-nav navbar-expand-lg px-2 px-sm-0 py-2 py-lg-0">
    <div class="container">
        <a class="navbar-brand" href="index.html"><img src="{{ URL::asset('images/logo.png') }}" alt="logo"
                width="50" height="50">HiVet!</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="ti-menu"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ $active === 'home' ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="{{ URL::route('home') }}">Beranda
                    </a>
                </li>
                <li class="nav-item @@posts {{ $active === 'artikel' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ URL::route('posts') }}">Artikel</a>
                </li>
                <li class="nav-item @@faq {{ $active === 'faq' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ URL::route('faq') }}">FAQ</a>
                </li>
                <li class="nav-item @@about {{ $active === 'about' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ URL::route('about') }}">Tentang</a>
                </li>
                <li class="nav-item @@contact {{ $active === 'contact' ? 'active' : '' }}">
                    <a class="nav-link" href="/contact">Kontak</a>
                </li>
                <li class="nav-item dropdown @@pages {{ $active === 'partner' ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Partner
                        <span><i class="ti-angle-down"></i></span>
                    </a>
                    <!-- Dropdown list -->
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item @@team" href="/drh">Menjadi Dokter Hewan</a></li>
                        <li><a class="dropdown-item @@career" href="/iklan">Pasang Iklan</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
