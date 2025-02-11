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
    </style>
</head>

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

    <!-- Main Content -->
    <section class="content py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Input Berita</h3>
                        </div>
                        <form id="newsForm" action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="judulBerita" class="font-weight-bold">Judul Berita</label>
                                    <input type="text" class="form-control" id="judulBerita" name="judul_berita" placeholder="Masukkan judul berita">
                                </div>
                                <div class="form-group">
                                    <label for="category" class="font-weight-bold">Kategori</label>
                                    <select id="category" name="category" class="form-control">
                                        <option>- Pilih Kategori -</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile" class="font-weight-bold">Upload Gambar</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="gambar">
                                        <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="summernote" class="font-weight-bold">Konten Berita</label>
                                    <textarea id="summernote" name="content" class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-success">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Main Content End -->

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container">
            <p class="mb-0">&copy; 2025 onPers. All Rights Reserved.</p>
        </div>
    </footer>
    <!-- Footer End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('customs/adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>

</body>

</html>
