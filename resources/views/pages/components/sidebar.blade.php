<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ asset('img/logo/logo-onpers.png') }}" alt="Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">onPers</span>
    </a>
    <style>
        .nav-item {
            pointer-events: auto !important;
        }

        .nav-link.active {
            background-color: #007bff;
        }
    </style>
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

                <!-- Wartawan -->
                <li class="nav-item">
                    <a href="{{ route('wartawan.index') }}"
                        class="nav-link {{ Request::is('wartawan*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>Wartawan</p>
                    </a>
                </li>

                <!-- Narasumber -->
                <li class="nav-item">
                    <a href="{{ route('narasumber.index') }}"
                        class="nav-link {{ Request::is('narasumber*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-microphone"></i>
                        <p>Narasumber</p>
                    </a>
                </li>

                <!-- Humas -->
                <li class="nav-item">
                    <a href="{{ route('humas.index') }}" class="nav-link {{ Request::is('humas*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-bullhorn"></i>
                        <p>Humas</p>
                    </a>
                </li>

                <!-- Jasa -->
                <li class="nav-item">
                    <a href="{{ route('jasa.index') }}" class="nav-link {{ Request::is('jasa*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>Jasa</p>
                    </a>
                </li>

                <!-- Umum -->
                <li class="nav-item">
                    <a href="{{ route('chat.index') }}" class="nav-link {{ Request::is('chat*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Umum</p>
                    </a>
                </li>

                <!-- Info -->
                <li class="nav-item">
                    <a href="{{ route('info.index') }}" class="nav-link {{ Request::is('info*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>Info</p>
                    </a>
                </li>

                <!-- Chat -->
                <li class="nav-item">
                    <a href="{{ route('profile.index') }}"
                        class="nav-link {{ Request::is('profile*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>Chat</p>
                    </a>
                </li>

                <!-- Edit / Hapus Berita -->
                <li class="nav-item">
                    <a href="{{ route('index_berita') }}"
                        class="nav-link {{ Request::is('berita/index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Edit / Hapus Berita</p>
                    </a>
                </li>

                <!-- Tulis Berita -->
                <li class="nav-item">
                    <a href="{{ route('input_berita') }}"
                        class="nav-link {{ Request::is('berita/input_berita') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-pencil-alt"></i>
                        <p>Tulis Berita</p>
                    </a>
                </li>

                <!-- Admin Section -->
                <!-- Admin Section -->
                @if(auth()->user()->role == 'admin')
                <li class="nav-item {{ request()->is('iklan*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('iklan*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-ad"></i>
                        <p>
                            Iklan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('iklan.index') }}"
                                class="nav-link {{ request()->is('iklan') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-chart-line"></i>
                                <p>Dashboard Iklan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('iklan.create') }}"
                                class="nav-link {{ request()->is('iklan/create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-upload"></i>
                                <p>Upload Iklan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('iklan.video') }}"
                                class="nav-link {{ request()->is('iklan/video') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-video"></i>
                                <p>Upload Video News</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif



                <!-- Logout -->
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
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