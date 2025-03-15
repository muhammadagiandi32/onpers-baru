<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>onPers | Mulai Pemberitaan</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="onPers | Mulai Pemberitaan" name="keywords">
    <meta content="onPers | Mulai Pemberitaan" name="description">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('/img/logo/logo-onpers.png') }}" type="image/png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('customs/adminlte/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('customs/adminlte/plugins/summernote/summernote.min.css') }}">
    <!-- Summernote CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.css" rel="stylesheet">
    <style>
        /* start css untuk nav dan header */
        body {
            background-color: #f4f4f4;
            font-family: 'Arial', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .header {
            padding: 10px 0;
            background-color: #000;
            color: white;
            border-bottom: 1px solid #222;
        }

        .navbar-custom {
            background-color: #d32f2f;
            padding: 0.5rem 0;
        }

        .navbar-custom .nav-link {
            color: white;
            font-weight: 500;
            padding: 0.5rem 1rem;
        }

        .navbar-custom .nav-link:hover {
            color: #ffcccc;
        }

        .navbar-custom .nav-link.active {
            color: white;
            border-bottom: 2px solid #ffcccc;
        }

        .navbar-toggler {
            border: none;
            outline: none;
            padding: 5px 10px;
        }

        .navbar-toggler-icon {
            font-size: 24px;
            color: white;
        }

        .b-search {
            display: none;
        }

        .navbar-collapse.show .b-search {
            display: block;
            width: 100%;
            padding: 0.5rem 0;
        }

        @media (min-width: 768px) {
            .navbar-toggler {
                display: none;
                /* Sembunyikan tombol burger di layar besar */
            }

            .b-search {
                display: flex;
                /* Tampilkan search bar di layar besar */
            }
        }

        /* end css untuk nav dan header */


        html,
        body {
            height: 100%;
        }

        .main-content {
            flex: 1;
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
            margin-top: auto;
            /* Membuat footer berada di bawah */
        }

        .container p {
            margin: 0;
        }
    </style>
</head>

<body>
    <!-- Header Start -->
    <header class="header">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="{{ url('/') }}" class="navbar-brand text-white font-weight-bold d-flex align-items-center">
                <img src="{{ asset('img/logo/logo-onpers.png') }}" alt="Logo"
                    style="height: 40px; margin-right: 8px;"> onPers
            </a>
            @php
                $currentCategory = request()->segment(2); // Mengambil segmen ke-2 dari URL, yaitu 'advertorial'
            @endphp
            <form action="{{ route('category.viewAll', $category) }}" method="GET" class="b-search d-none d-md-flex">
                <input type="text" class="form-control mr-2" placeholder="Search" name="search">
                <button class="btn btn-light"><i class="fa fa-search"></i></button>
            </form>
            <button class="navbar-toggler d-md-none" type="button" data-toggle="collapse"
                data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
            </button>
        </div>
    </header>
    <!-- Header End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-md navbar-custom">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <form action="{{ route('category.viewAll', $currentCategory) }}" method="GET"
                    class="b-search mb-2 d-md-none">
                    <input type="text" class="form-control mb-2" placeholder="Search" name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-light btn-block"><i class="fa fa-search"></i> Search</button>
                </form>
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
                @if (Auth::check())
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="{{ route('add-news') }}" class="nav-link"><i class="fa fa-upload"></i> Upload
                                Berita</a>
                        </li>
                    </ul>
                @endif
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Main Content -->
    <div class="container main-content">
        <h3 class="col-md-4 mb-3">Category: {{ ucfirst($category) }}</h3>
        <div class="row">
            @foreach ($newsItems as $news)
                <div class="col-md-4 mb-4">
                    <div class="card position-relative border-0 overflow-hidden"
                        style="height: 200px; border-radius: 12px;">
                        <img src="{{ $news->image_url }}" class="h-100 w-100" alt="{{ $news->title }}"
                            style="object-fit: cover; border-radius: 12px;">
                        <div class="card-img-overlay d-flex flex-column justify-content-end"
                            style="background: rgba(0, 0, 0, 0.4); border-radius: 12px;">
                            <!--
                    kalo butuh buat nambahin category kaya badge
                    <span class="badge bg-danger mb-2" style="width: fit-content;">Berita</span>
                -->
                            <a href="{{ route('news-details', $news->slug) }}">
                                <h6 class="card-title text-white fw-bold">{{ $news->title, 50 }}</h6>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
    <!-- Main Content End -->

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container">
            <p class="mb-0"> Copyright &copy; <strong style="color:red">onPers</strong>. All Rights Reserved.</p>
        </div>
    </footer>
    <!-- Footer End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('customs/adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>

</body>

</html>
