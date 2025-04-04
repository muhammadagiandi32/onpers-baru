<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>onPers | Mulai Pemberitaan</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta property="og:title" content="{{ $data->title }}">
    <meta property="og:image" content="{{ $data->image_url }}">
    <meta property="og:url" content="{{ url()->current() }}">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->

    <link rel="stylesheet" href="{{ asset('customs/lib/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('customs/lib/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('customs/css/style.css') }}">
</head>
<style>
    body {
        background-color: #f4f4f4;
    }

    .header {
        background-color: #000;
        color: white;
        padding: 10px 0;
    }

    .navbar-custom {
        background-color: #d32f2f;
    }

    .navbar-custom .nav-link {
        color: white;
    }

    .navbar-custom .nav-link:hover {
        color: #ffcccc;
    }

    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #d32f2f;
        color: white;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .btn-success {
        background-color: #d32f2f;
        border: none;
    }

    .btn-success:hover {
        background-color: #a52828;
    }

    .footer {
        background-color: #000;
        color: white;
        padding: 20px 0;
        text-align: center;
    }

    /* for breadcumb-wrap */
    .breadcrumb-wrap {
        padding: 10px 0;
        background-color: transparent;
    }

    .breadcrumb {
        padding: 0;
        margin-bottom: 0;
        background-color: transparent;
        list-style: none;
        font-size: 0.9rem;
        display: flex;
        gap: 5px;
    }

    .breadcrumb-item::after {
        margin: 0 5px;
        color: #bbb;
    }

    .breadcrumb-item:last-child::after {
        content: '';
        /* Menghilangkan '/' di item terakhir */
    }

    .breadcrumb-item a {
        color: #000;
        text-decoration: none;
    }

    .breadcrumb-item a:hover {
        text-decoration: underline;
    }

    .breadcrumb-item.active {
        font-weight: bold;
        color: #d32f2f;
        /* Warna berbeda untuk item aktif */
        pointer-events: none;
    }
</style>

<body>
    <!-- Header Start -->
    <header class="header">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="{{ url('/') }}" class="navbar-brand text-white font-weight-bold">
                <img src="{{ asset('img/logo/logo-onpers.png') }}" alt="Logo" style="height: 40px;"> onPers
            </a>
            <div class="b-search d-flex align-items-center">
                <input type="text" class="form-control mr-2" placeholder="Search">
                <button class="btn btn-light"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-md navbar-custom sticky-top shadow-sm">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="{{ url('/') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
                    </li>
                    @if (!Auth::check())
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Login</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('dashboards') }}" class="nav-link">Dashboard</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">News</a></li>
                <li class="breadcrumb-item active">Event details</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Single News Start-->
    <div class="single-news">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="sn-container">
                        <div class="sn-img">
                            <img src="{{ $data->image_url }}" />
                        </div>
                        <div class="sn-content">
                            <h1 class="sn-title">
                                {{ $data->title }}
                            </h1>
                            <h6>{{ $data->created_at->translatedFormat('l, d F Y') }}</h6>
                            {{-- {!! $data->content !!} --}}
                        </div>
                    </div>
                    <div class="sn-related">
                        <h2>Berita Lainnya</h2>
                        <div class="row sn-slider">
                            @foreach ($Berita as $beritas)
                                <div class="col-md-4 mb-4">
                                    <div class="card position-relative border-0 overflow-hidden"
                                        style="height: 150px; border-radius: 13px;">
                                        <img src="{{ $beritas->image_url }}" class="h-100 w-100"
                                            alt="{{ $beritas->title }}"
                                            style="object-fit: cover; border-radius: 12px;">
                                        <div class="card-img-overlay d-flex flex-column justify-content-end"
                                            style="background: rgba(0, 0, 0, 0.4); border-radius: 12px;">
                                            <a href="{{ route('news-details', $beritas->slug) }}">
                                                <h6 class="card-title text-white fw-bold">
                                                    {{ Str::limit($beritas->title, 50) }}</h6>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar-widget">
                            <h2 class="sw-title">News Category</h2>
                            <div class="category">
                                <ul>
                                    @foreach ($jumlahBerita as $berita)
                                        <li><a
                                                href="">{{ $berita->category_name }}</a><span>({{ $berita->total }})</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <h2 class="sw-title">Tags</h2>
                            <div class="tags">
                                <a href="">National</a>
                                <a href="">International</a>
                                <a href="">Economics</a>
                                <a href="">Politics</a>
                                <a href="">Lifestyle</a>
                                <a href="">Technology</a>
                                <a href="">Trades</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single News End-->



    <!-- Footer Bottom Start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 copyright">
                    <p>
                        Copyright &copy; <a href="{{ url('/') }}">onPres</a>. All
                        Rights Reserved
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Bottom End -->

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <!-- JavaScript Libraries -->
    <script src="{{ asset('customs/js/main.js') }}"></script>
    <script src="{{ asset('customs/lib/slick/slick.min.js') }}"></script>
    <script src="{{ asset('customs/lib/easing/easing.min.js') }}"></script>
</body>

</html>
