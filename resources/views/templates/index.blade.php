<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>onPers | Mulai Pemberitaan</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="onPers | Mulai Pemberitaan" name="keywords">
    <meta content="onPers | Mulai Pemberitaan" name="description">

    <!-- Favicon Jika menggunakan PNG -->
    <link rel="icon" href="{{ asset('/img/logo/logo-onpers.png') }}" type="image/png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">


    <link rel="stylesheet" href="{{ asset('customs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('customs/lib/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('customs/lib/slick/slick.css') }}">
    <style>
        @media (max-width: 768px) {
            .custom-video-height {
                height: 250px; /* Mengurangi tinggi video di mobile */
            }
            .ad-banner img {
                max-height: 200px; /* Menyesuaikan tinggi gambar iklan di mobile */
            }
        }
        .custom-video-height {
            height: 400px;
        }
        .ad-banner img {
            max-height: 300px;
            width: 100%;
            object-fit: cover;
        }
       .story-container {
            position: relative;
            width: 100%;
            max-width: 1000px;
            height: 400px;
            margin: 0 auto;
            overflow: hidden;
            border-radius: 10px;
            background-color: black;
        }
        .story-video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .progress-bar-container {
            position: absolute;
            top: 10px;
            left: 10px;
            right: 10px;
            display: flex;
            gap: 5px;
            z-index: 10;
        }
        .progress-bar {
            flex: 1;
            height: 4px;
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 2px;
            overflow: hidden;
        }
        .progress-bar-inner {
            height: 100%;
            background-color: white;
            width: 0;
            transition: width linear;
        }
        /* Styling panah back dan next */
        .arrow-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 2em;
            color: white;
            cursor: pointer;
            z-index: 10;
            user-select: none;
        }
        .arrow-left {
            left: 10px;
        }
        .arrow-right {
            right: 10px;
        }
    </style>

    <style>
      body {
        background-color: #f4f4f4;
        font-family: 'Arial', sans-serif;
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
        max-width: 300px;
        display: none;
    }

    @media (min-width: 768px) {
        .navbar-toggler {
            display: none; /* Sembunyikan tombol burger di layar besar */
        }

        .b-search {
            display: flex; /* Tampilkan search bar di layar besar */
        }
    }

    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .card-img-top {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .card-body {
        flex: 1;
    }

    .custom-video-height {
        height: 300px;
        width: 100%;
    }

    img {
        height: 200px;
    }

    .badge-custom {
        font-size: 12px;
        padding: 2px 6px;
        border-radius: 12px;
        background-color: rgb(135, 206, 235);
        color: #333;
        border: 1px solid #ddd;
    }

    /* kode untuk menyamaan ukuran gambar kiri dan kanan */
    .tn-left .tn-img img,
    .tn-right .tn-img img {
        width: 100%; /* Agar gambar menyesuaikan dengan container */
        height: 300px; /* Atur tinggi tetap untuk semua gambar */
        object-fit: cover; /* Pastikan gambar tidak terdistorsi */
    }

    /* css untuk semua category and slider*/

    .slider-container {
        display: flex;
        gap: 16px;
        scroll-behavior: smooth;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        scrollbar-width: none;
        -ms-overflow-style: none;
    }

    .slider-container::-webkit-scrollbar {
        display: none;
    }

    .slider-item {
        flex: 0 0 calc(25% - 16px); /* Default: 4 item di desktop */
        width: 100%;
        scroll-snap-align: start;
    }

    .card {
        height: 200px;
        border-radius: 12px;
    }

    .card img {
        object-fit: cover;
        border-radius: 12px;
        width: 100%;
        height: 100%;
    }

    .card-img-overlay {
        background: rgba(0, 0, 0, 0.4);
        border-radius: 12px;
        padding: 10px;
    }

    /* RESPONSIVE DESIGN */

    /* Untuk Tablet: 2 item per baris */
    @media (max-width: 1024px) {
        .slider-item {
            flex: 0 0 calc(50% - 16px); /* 2 item per baris */
        }
    }

    /* Untuk Mobile: 1 item per baris */
    @media (max-width: 768px) {
        .slider-item {
            flex: 0 0 calc(100% - 16px); /* 1 item per baris */
        }

        .slider-btn {
            display: none; /* Sembunyikan tombol di layar kecil */
        }

        .card-img-overlay h5 {
            font-size: 14px; /* Perkecil teks agar lebih mudah dibaca */
        }
    }

    /* Tombol Navigasi Slider */
    .slider-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(0, 0, 0, 0.6);
        color: white;
        border: none;
        padding: 10px;
        cursor: pointer;
        border-radius: 50%;
        font-size: 20px;
        z-index: 10;
        width: 40px;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Posisi tombol kiri & kanan */
    .left-btn {
        left: 10px;
    }

    .right-btn {
        right: 10px;
    }

    /* RESPONSIVE DESIGN */

    /* Untuk Tablet */
    @media (max-width: 1024px) {
        .slider-item {
            flex: 0 0 calc(50% - 16px);
        }

        .slider-btn {
            width: 35px;
            height: 35px;
            font-size: 18px;
        }
    }

    /* Untuk Mobile */
    @media (max-width: 768px) {
        .slider-item {
            flex: 0 0 calc(100% - 16px);
        }

        .slider-btn {
            width: 30px;
            height: 30px;
            font-size: 16px;
            padding: 5px;
            background-color: rgba(0, 0, 0, 0.5);
        }
    }

    /* end css untuk semua category and slider */
    /* Membuat HTML & Body memenuhi layar */
    html, body {
        height: 100%;
        /* margin: 0; */
        /* display: flex;
        flex-direction: column; */
    }

    /* Kontainer utama agar konten memenuhi ruang */
    .main-content {
        flex: 1; /* Mendorong footer ke bawah */
    }

    /* Footer tetap di bawah */
    .footer {
        background-color:  #000;
        color: white;
        text-align: center;
        padding: 20px 0;
        font-size: 16px;
        font-weight: 400;
        width: 100%;
    }
    .putih{
        color: #f4f4f4;
    }

    /* Styling untuk teks "onPers" */
    .brand-text {
        color: red;
        font-weight: bold;
    }

    /* Pastikan footer tidak mengambang di tengah */
    @media (min-height: 500px) {
        .footer {
            position: relative;
            bottom: 0;
        }
    }


    /* end css untuk footer */
    </style>
</head>

<body>
    <div class="main-content">
        <!-- Header Start -->
        <header class="header">
            <div class="container d-flex justify-content-between align-items-center">
                <a href="{{ url('/') }}" class="navbar-brand text-white font-weight-bold d-flex align-items-center">
                    <img src="{{ asset('img/logo/logo-onpers.png') }}" alt="Logo" style="height: 40px; margin-right: 8px;"> onPers
                </a>
                <form class="b-search d-none d-md-flex">
                    <input type="text" class="form-control mr-2" placeholder="Search">
                    <button class="btn btn-light"><i class="fa fa-search"></i></button>
                </form>
                <button class="navbar-toggler d-md-none" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
                </button>
            </div>
        </header>

        <nav class="navbar navbar-expand-md navbar-custom">
            <div class="container">
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
                    @if (Auth::check())
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a href="{{ route('add-news') }}" class="nav-link"><i class="fa fa-upload"></i> Upload Berita</a>
                            </li>
                        </ul>
                    @endif
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Top News Start-->
        <div class="top-news">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="embed-responsive custom-video-height embed-responsive-4by3">
                            <video class="embed-responsive-item" controls>
                                @if(isset($video))
                                    <source src="{{ $video->url }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                @endif
                            </video>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 tn-left">
                        <div class="row tn-slider">
                            @foreach ($kiri as $item)
                            <div class="col-md-6">
                                <div class="tn-img">
                                    <img src="{{ $item->image_url }}" alt="News Image" class="img-fluid">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-6 tn-right">
                        <div class="row">
                            <div class="col-md-12 col-md-6">
                                @if(isset($kanan))
                                <div class="tn-img">
                                    <img src="{{ $kanan->image_url }}" alt="Right Image" class="img-fluid">
                                <div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top News End-->

        <!-- Berita News Start-->
        <div class="cat-news">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="container-fluid">
                                    <div class="row gy-3 gy-md-4">
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="card border-dark"
                                                onclick="window.location='{{ route('profile.index') }}';"
                                                style="cursor: pointer;">
                                                <div class="card-body text-center p-4 p-xxl-5">
                                                    <svg fill="#ff6f61" width="48" height="48"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            class="bi bi-eraser-fill text-primary mb-4" viewBox="0 0 448 512">
                                                        <path
                                                            d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                                    </svg>
                                                    <h4 class="mb-4">Wartawan</h4>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="card border-dark"
                                                onclick="window.location='{{ route('profile.index') }}';"
                                                style="cursor: pointer;">

                                                <div class="card-body text-center p-4 p-xxl-5">
                                                    <svg fill="#ff6f61" width="48" height="48"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="bi bi-eraser-fill text-primary mb-4" viewBox="0 0 448 512">
                                                        <path
                                                            d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3zM609.3 512l-137.8 0c5.4-9.4 8.6-20.3 8.6-32l0-8c0-60.7-27.1-115.2-69.8-151.8c2.4-.1 4.7-.2 7.1-.2l61.4 0C567.8 320 640 392.2 640 481.3c0 17-13.8 30.7-30.7 30.7zM432 256c-31 0-59-12.6-79.3-32.9C372.4 196.5 384 163.6 384 128c0-26.8-6.6-52.1-18.3-74.3C384.3 40.1 407.2 32 432 32c61.9 0 112 50.1 112 112s-50.1 112-112 112z" />
                                                    </svg>
                                                    <h4 class="mb-4">Narasumber</h4>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="card border-dark"
                                                onclick="window.location='{{ route('profile.index') }}';"
                                                style="cursor: pointer;">
                                                <div class="card-body text-center p-4 p-xxl-5">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48"
                                                        fill="#ff6f61" class="bi bi-clipboard-check-fill text-primary mb-4"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z" />
                                                        <path
                                                            d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zm6.854 7.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708" />
                                                    </svg>
                                                    <h4 class="mb-4">Humas</h4>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="card border-dark"
                                                onclick="window.location='{{ route('jasa.index') }}';"
                                                style="cursor: pointer;">
                                                <div class="card-body text-center p-4 p-xxl-5">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48"
                                                        fill="#ff6f61" class="bi bi-diamond-half text-primary mb-4"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM8 .989c.127 0 .253.049.35.145l6.516 6.516a.495.495 0 0 1 0 .7L8.35 14.866a.5.5 0 0 1-.35.145z" />
                                                    </svg>
                                                    <h4 class="mb-4">Jasa</h4>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="card border-dark"
                                                onclick="window.location='{{ route('profile.index') }}';"
                                                style="cursor: pointer;">
                                                <div class="card-body text-center p-4 p-xxl-5">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48"
                                                        fill="#ff6f61" class="bi bi-eraser-fill text-primary mb-4"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M8.086 2.207a2 2 0 0 1 2.828 0l3.879 3.879a2 2 0 0 1 0 2.828l-5.5 5.5A2 2 0 0 1 7.879 15H5.12a2 2 0 0 1-1.414-.586l-2.5-2.5a2 2 0 0 1 0-2.828zm.66 11.34L3.453 8.254 1.914 9.793a1 1 0 0 0 0 1.414l2.5 2.5a1 1 0 0 0 .707.293H7.88a1 1 0 0 0 .707-.293z" />
                                                    </svg>
                                                    <h4 class="mb-4">Umum</h4>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="card border-dark"
                                                onclick="window.location='{{ route('info.index') }}';"
                                                style="cursor: pointer;">
                                                <div class=" card-body text-center p-4 p-xxl-5">
                                                    <svg fill="#ff6f61" width="48" height="48"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="bi bi-eraser-fill text-primary mb-4" viewBox="0 0 448 512">
                                                        <path
                                                            d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                                    </svg>
                                                    <h4 class="mb-4">Info</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h2>Video News</h2>
                        <div class="story-container">
                            <!-- Progress Bars -->
                            <div class="progress-bar-container">
                            </div>
                            <!-- Video Story -->
                            <video id="story-video" class="story-video" autoplay muted playsinline></video>

                            <!-- Tombol Panah Kiri dan Kanan -->
                            <i class="bi bi-chevron-left arrow-btn arrow-left" id="back-btn"></i>
                            <i class="bi bi-chevron-right arrow-btn arrow-right" id="next-btn"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Category News yang digunakan -->
        <div class="cat-news">
            <div class="container mt-5">
                <div class="row">
                    @php
                    $categories = [
                        ['name' => 'Headline', 'slug' => 'headline', 'items' => $Headlines],
                        ['name' => 'Berita', 'slug' => 'berita', 'items' => $Berita],
                        ['name' => 'Acara', 'slug' => 'acara', 'items' => $Acara],
                        ['name' => 'Advertorial', 'slug' => 'advertorial', 'items' => $Advertorial]
                    ];
                    @endphp

                    @foreach ($categories as $category)
                        @if (!empty($category['items']) && count($category['items']) > 0)
                            <div class="col-md-12">
                                <h2 class="d-flex justify-content-between align-items-center mt-3">
                                    <span>{{ $category['name'] }}</span>
                                    <a href="{{ route('category.viewAll', $category['slug']) }}">
                                        <span class="badge badge-pill badge-custom">View All</span>
                                    </a>
                                </h2>

                                <div class="position-relative">
                                    <button class="slider-btn left-btn" data-category="{{ $category['slug'] }}">&#10094;</button>
                                    <button class="slider-btn right-btn" data-category="{{ $category['slug'] }}">&#10095;</button>

                                    <div class="d-flex overflow-hidden slider-container" id="slider-{{ $category['slug'] }}">
                                        @foreach ($category['items'] as $item)
                                            <div class="flex-shrink-0 slider-item">
                                                <div class="card position-relative border-0 overflow-hidden">
                                                    <img src="{{ $item->image_url }}" class="h-100 w-100" alt="{{ $item->title }}">
                                                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                                                        <a href="{{ route('news-details', $item->slug) }}">
                                                            <h6 class="card-title text-white fw-bold">{{ $item->title }}</h6>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <footer class="footer mt-3">
        <div class="container">
            <p class="mb-0 putih">Copyright &copy; <strong class="brand-text">onPers</strong>. All Rights Reserved.</p>
        </div>
    </footer>


</body>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('customs/lib/slick/slick.min.js') }}"></script>
    <script src="{{ asset('customs/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('customs/js/main.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $.get(@json(route('iklan.getVideoNews')), {}).done(function (data) {

                data.forEach(function(item) {
                    $('.progress-bar-container').append('<div class="progress-bar"><div class="progress-bar-inner"></div></div>');
                });

                const videos = data;
                let currentVideoIndex = 0;
                const videoElement = document.getElementById('story-video');
                const progressBars = document.querySelectorAll('.progress-bar-inner');
                const backBtn = document.getElementById('back-btn');
                const nextBtn = document.getElementById('next-btn');

                function loadVideo(index) {
                    videoElement.src = videos[index];
                    videoElement.play();
                    updateProgress(index);
                }

                function updateProgress(index) {
                    // Reset all progress bars
                    progressBars.forEach(bar => bar.style.width = '0');
                    // Animate the current progress bar
                    const currentBar = progressBars[index];
                    currentBar.style.transitionDuration = `${videoElement.duration}s`;
                    currentBar.style.width = '100%';
                    // Handle when the video ends
                    videoElement.onended = nextVideo;
                }

                function nextVideo() {
                    currentVideoIndex = (currentVideoIndex + 1) % videos.length;
                    loadVideo(currentVideoIndex);
                }

                function previousVideo() {
                    // Handle back navigation, wrapping around if at the start
                    currentVideoIndex = (currentVideoIndex - 1 + videos.length) % videos.length;
                    loadVideo(currentVideoIndex);
                }

                // Start with the first video
                loadVideo(currentVideoIndex);

                // Event listeners for buttons
                nextBtn.addEventListener('click', nextVideo);
                backBtn.addEventListener('click', previousVideo);
            })

        });

    </script>
    <script>
    // JS untuk semua category slider
    document.addEventListener("DOMContentLoaded", function () {
        function setupAllSliders() {
            document.querySelectorAll(".slider-container").forEach(slider => {
                let category = slider.id.replace("slider-", "");
                let prevBtn = document.querySelector(`.slider-btn.left-btn[data-category="${category}"]`);
                let nextBtn = document.querySelector(`.slider-btn.right-btn[data-category="${category}"]`);
                let firstItem = slider.querySelector(".slider-item");

                if (!slider || !prevBtn || !nextBtn || !firstItem) {
                    console.warn(`⚠️ Slider "${category}" tidak memiliki elemen yang cukup.`);
                    return;
                }

                function getItemWidth() {
                    return firstItem.offsetWidth + 16;
                }

                nextBtn.addEventListener("click", function () {
                    slider.scrollBy({ left: getItemWidth(), behavior: "smooth" });
                });

                prevBtn.addEventListener("click", function () {
                    slider.scrollBy({ left: -getItemWidth(), behavior: "smooth" });
                });

                // Toggle tombol hanya jika item lebih dari satu
                function toggleButtons() {
                    let totalWidth = slider.scrollWidth;
                    let visibleWidth = slider.clientWidth;

                    if (totalWidth <= visibleWidth) {
                        prevBtn.style.display = "none";
                        nextBtn.style.display = "none";
                    } else {
                        prevBtn.style.display = "flex";
                        nextBtn.style.display = "flex";
                    }
                }

                toggleButtons();
                window.addEventListener("resize", toggleButtons);
            });
        }

        setTimeout(setupAllSliders, 500);
    });
    </script>
</html>
