<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ asset('img/logo/logo-onpers.png') }}" alt="Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">onPers</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('dashboards') }}"
                        class="nav-link {{ Request::is('dashboards') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('wartawan.index') }}"
                        class="nav-link {{ Request::is('wartawan*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Wartawan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('narasumber.index') }}"
                        class="nav-link {{ Request::is('narasumber*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Narasumber</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('humas.index') }}" class="nav-link {{ Request::is('humas*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Humas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('jasa.index') }}" class="nav-link {{ Request::is('jasa*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Jasa</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('chat.index') }}" class="nav-link {{ Request::is('chat*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Umum</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('info.index') }}" class="nav-link {{ Request::is('info*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Info</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profile.index') }}"
                        class="nav-link {{ Request::is('profile*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Chat</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('index_berita') }}"
                        class="nav-link {{ Request::is('berita/index') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Edit / Hapus Berita</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('input_berita') }}"
                        class="nav-link {{ Request::is('berita/input_berita') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Tulis Berita</p>
                    </a>
                </li>


                {{--
                <!-- Berita -->
                <li class="nav-item {{ Request::is('berita*') ? 'menu-open' : '' }}">
                    <a href="{{ route('index_berita') }}" class="nav-link {{ Request::is('berita*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Berita
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                    </ul>
                </li> --}}
                @if(auth()->user()->role=='admin')
                <li class="nav-item {{ Request::is('iklan*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('iklan*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Iklan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('iklan.index') }}"
                                class="nav-link {{ Request::is('dashboard/iklan') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard Iklan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('iklan.create') }}"
                                class="nav-link {{ Request::is('iklan/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Upload Iklan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('iklan.video') }}"
                                class="nav-link {{ Request::is('post-berita/upload-video-news') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Upload Video News</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                <!-- Iklan -->
                {{-- @endhasrole --}}
                <!-- Logout -->
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Logout</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>