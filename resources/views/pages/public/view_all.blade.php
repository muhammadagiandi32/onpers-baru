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
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            margin: 0;
            background-color: #f4f4f4;
        }

        .main-content {
            flex: 1;
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
    </style>
</head>

<body>
    <!-- Header Start -->
    <header class="header">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="{{ url('/') }}" class="navbar-brand text-white font-weight-bold">
                <img src="{{ asset('img/logo/logo-onpers.png') }}" alt="Logo" style="height: 40px;"> onPers
            </a>
            @php
            $currentCategory = request()->segment(2); // Mengambil segmen ke-2 dari URL, yaitu 'advertorial'
            @endphp
            <form action="{{ route('category.viewAll', $currentCategory) }}" method="GET"
                class="b-search d-flex align-items-center">
                <input type="text" name="search" class="form-control mr-2" placeholder="Search"
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-light"><i class="fa fa-search"></i></button>
            </form>
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

    <!-- Main Content -->
    <div class="container main-content">
        <h3 class="col-md-4 mb-3">Category: {{ ucfirst($category) }}</h3>
        <div class="row">
            @foreach($newsItems as $news)
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
                            <h5 class="card-title text-white fw-bold">{{ Str::limit($news->title, 50) }}</h5>
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