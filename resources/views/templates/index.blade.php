<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>onPers | Mulai Pemberitaan</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="onPers | Mulai Pemberitaan" name="keywords">
    <meta content="onPers | Mulai Pemberitaan" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('customs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('customs/lib/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('customs/lib/slick/slick.css') }}">
    <style>
        .card-img-top {
            width: 100%;
            height: 200px;
            /* Ubah sesuai dengan kebutuhan Anda */
            object-fit: cover;
            /* Menjaga rasio aspek gambar */
        }

        .card {
            display: flex;
            flex-direction: column;
            height: 100%;
            /* Pastikan card memiliki tinggi penuh sesuai dengan konten */
        }

        .card-body {
            flex: 1;
        }

        .custom-video-height {
            height: 300px;
            /* Atur tinggi sesuai kebutuhan */
            width: 100%;
            /* Pastikan video tetap responsif */
        }
    </style>
</head>

<body>
    <!-- Top Bar Start -->
    {{-- <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="tb-contact">
                        <p><i class="fas fa-envelope"></i>info@mail.com</p>
                        <p><i class="fas fa-phone-alt"></i>+012 345 6789</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="tb-menu">
                        <a href="">About</a>
                        <a href="">Privacy</a>
                        <a href="">Terms</a>
                        <a href="">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Top Bar Start -->

    <!-- Brand Start -->
    <div class="brand">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4">
                    <div class="b-logo">
                        <a href="index.html">
                            <img src="{{ asset('img/logo/logo-onpers.png') }}" alt="Logo">
                        </a>
                    </div>
                </div>
                {{-- <div class="col-lg-6 col-md-4">
                    <div class="b-ads">
                        <a href="https://htmlcodex.com">
                            <img src="{{ asset('img/ads-1.jpg') }}" alt="Ads">
                        </a>
                    </div>
                </div> --}}
                <div class="col-lg-3 col-md-4">
                    <div class="b-search">
                        <input type="text" placeholder="Search">
                        <button><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand End -->

    <!-- Nav Bar Start -->
    <div class="nav-bar">
        <div class="container">
            <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                <a href="#" class="navbar-brand">MENU</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto">
                        <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
                        {{-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">Sub Item 1</a>
                                <a href="#" class="dropdown-item">Sub Item 2</a>
                            </div>
                        </div>
                        <a href="single-page.html" class="nav-item nav-link">Single Page</a> --}}
                        @if (!Auth::check())
                        <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
                        @endif
                    </div>
                    <div class="social ml-auto">
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-linkedin-in"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                        <a href=""><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Nav Bar End -->

    <!-- Top News Start-->
    <div class="top-news">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="embed-responsive custom-video-height embed-responsive-4by3">
                        <video class="embed-responsive-item" controls>
                            <source src="{{ $video->url }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 tn-left">
                    <div class="row tn-slider">
                        @foreach ($kiri as $kiri)
                        <div class="col-md-6">
                            <div class="tn-img">
                                <img src="{{ $kiri->image_url }}" />
                                {{-- <div class="tn-title">
                                    <a href="">Lorem ipsum dolor sit amet</a>
                                </div> --}}
                            </div>
                        </div>
                        @endforeach
                        {{-- <div class="col-md-6">
                            <div class="tn-img">
                                <img src="{{ asset('img/news-450x350-2.jpg') }}" />
                                <div class="tn-title">
                                    <a href="">Integer hendrerit elit eget purus sodales maximus</a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-md-6 tn-right">
                    <div class="row">
                        @foreach ($kanan as $kanan)
                        <div class="col-md-6">
                            <div class="tn-img">
                                <img src="{{ $kanan->image_url }}" />
                                {{-- <div class="tn-title">
                                    <a href="">Lorem ipsum dolor sit</a>
                                </div> --}}
                            </div>
                        </div>
                        @endforeach
                        {{-- <div class="col-md-6">
                            <div class="tn-img">
                                <img src="{{ asset('img/news-350x223-2.jpg') }}" />
                                <div class="tn-title">
                                    <a href="">Lorem ipsum dolor sit</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="tn-img">
                                <img src="{{ asset('img/news-350x223-3.jpg') }}" />
                                <div class="tn-title">
                                    <a href="">Lorem ipsum dolor sit</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="tn-img">
                                <img src="{{ asset('img/news-350x223-4.jpg') }}" />
                                <div class="tn-title">
                                    <a href="">Lorem ipsum dolor sit</a>
                                </div>
                            </div>
                        </div> --}}
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
                                        <div class="card border-dark">
                                            <div class="card-body text-center p-4 p-xxl-5">
                                                <svg fill="#ff6f61" width="48" height="48"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="bi bi-eraser-fill text-primary mb-4" viewBox="0 0 448 512">
                                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                    <path
                                                        d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                                </svg>
                                                <h4 class="mb-4">Wartawan</h4>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="card border-dark">
                                            <div class="card-body text-center p-4 p-xxl-5">
                                                <svg fill="#ff6f61" width="" height="48"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="bi bi-eraser-fill text-primary mb-4" viewBox="0 0 448 512">
                                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                    <path
                                                        d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3zM609.3 512l-137.8 0c5.4-9.4 8.6-20.3 8.6-32l0-8c0-60.7-27.1-115.2-69.8-151.8c2.4-.1 4.7-.2 7.1-.2l61.4 0C567.8 320 640 392.2 640 481.3c0 17-13.8 30.7-30.7 30.7zM432 256c-31 0-59-12.6-79.3-32.9C372.4 196.5 384 163.6 384 128c0-26.8-6.6-52.1-18.3-74.3C384.3 40.1 407.2 32 432 32c61.9 0 112 50.1 112 112s-50.1 112-112 112z" />
                                                </svg>
                                                <h4 class="mb-4">Narasumber</h4>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="card border-dark">
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
                                        <div class="card border-dark">
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
                                        <div class="card border-dark">
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
                                        <div class="card border-dark">
                                            <div class="card-body text-center p-4 p-xxl-5">
                                                <svg fill="#ff6f61" width="48" height="48"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="bi bi-eraser-fill text-primary mb-4" viewBox="0 0 448 512">
                                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
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
                    <h2>Advetorial</h2>
                    <div class="row cn-slider">
                        <!-- Mengelompokkan setiap 3 berita -->
                        @foreach ($adv as $item)
                        <div class="col-md-6">
                            <div class="cn-img">
                                <img src="{{ $item->image_url }}">
                                <div class="cn-title">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2>Berita</h2>
                    <div class="row cn-slider">
                        <!-- Mengelompokkan setiap 3 berita -->
                        @foreach ($Berita as $beritas)
                        <div class="col-md-6">
                            <div class="cn-img">
                                <img src="{{ $beritas->image_url }}" alt="{{ $beritas->title }}">
                                <div class="cn-title">
                                    <a href="{{ route('news-details', $beritas->slug) }}">
                                        {{ $beritas->title }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- end berita --}}
    {{-- Acara --}}
    <div class="cat-news">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Acara</h2>
                    <div class="row cn-slider">
                        <!-- Mengelompokkan setiap 3 berita -->
                        @foreach ($Acara as $acaras)
                        <div class="col-md-6">
                            <div class="cn-img">
                                <img src="{{ $acaras->image_url }}" alt="{{ $acaras->title }}">
                                <div class="cn-title">
                                    <a href="{{ route('news-details', $acaras->slug) }}">
                                        {{ $acaras->title }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end Acara --}}
    {{-- Rilis --}}
    <div class="cat-news">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Rilis</h2>
                    <div class="row cn-slider">
                        @foreach ($Rilis as $riliss)
                        <div class="col-md-6">
                            <div class="cn-img">
                                <img src="{{ $riliss->image_url }}" alt="{{ $riliss->title }}">
                                <div class="cn-title">
                                    <a href="{{ route('news-details', $riliss->slug) }}">
                                        {{ $riliss->title }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- end RIlis --}}
    <!-- Main News Start-->
    {{-- <div class="main-news">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mn-img">
                                <img src="{{ asset('img/news-350x223-1.jpg') }}" />
                                <div class="mn-title">
                                    <a href="">Lorem ipsum dolor sit</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mn-img">
                                <img src="{{ asset('img/news-350x223-2.jpg') }}" />
                                <div class="mn-title">
                                    <a href="">Lorem ipsum dolor sit</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mn-img">
                                <img src="{{ asset('img/news-350x223-3.jpg') }}" />
                                <div class="mn-title">
                                    <a href="">Lorem ipsum dolor sit</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mn-img">
                                <img src="{{ asset('img/news-350x223-4.jpg') }}" />
                                <div class="mn-title">
                                    <a href="">Lorem ipsum dolor sit</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mn-img">
                                <img src="{{ asset('img/news-350x223-5.jpg') }}" />
                                <div class="mn-title">
                                    <a href="">Lorem ipsum dolor sit</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mn-img">
                                <img src="{{ asset('img/news-350x223-1.jpg') }}" />
                                <div class="mn-title">
                                    <a href="">Lorem ipsum dolor sit</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mn-img">
                                <img src="{{ asset('img/news-350x223-2.jpg') }}" />
                                <div class="mn-title">
                                    <a href="">Lorem ipsum dolor sit</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mn-img">
                                <img src="{{ asset('img/news-350x223-3.jpg') }}" />
                                <div class="mn-title">
                                    <a href="">Lorem ipsum dolor sit</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mn-img">
                                <img src="{{ asset('img/news-350x223-4.jpg') }}" />
                                <div class="mn-title">
                                    <a href="">Lorem ipsum dolor sit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="mn-list">
                        <h2>Read More</h2>
                        <ul>
                            <li><a href="">Lorem ipsum dolor sit amet</a></li>
                            <li><a href="">Pellentesque tincidunt enim libero</a></li>
                            <li><a href="">Morbi id finibus diam vel pretium enim</a></li>
                            <li><a href="">Duis semper sapien in eros euismod sodales</a></li>
                            <li><a href="">Vestibulum cursus lorem nibh</a></li>
                            <li><a href="">Morbi ullamcorper vulputate metus non eleifend</a></li>
                            <li><a href="">Etiam vitae elit felis sit amet</a></li>
                            <li><a href="">Nullam congue massa vitae quam</a></li>
                            <li><a href="">Proin sed ante rutrum</a></li>
                            <li><a href="">Curabitur vel lectus</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Main News End-->

    <!-- Footer Start -->
    {{-- <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h3 class="title">Get in Touch</h3>
                        <div class="contact-info">
                            <p><i class="fa fa-map-marker"></i>123 News Street, NY, USA</p>
                            <p><i class="fa fa-envelope"></i>info@example.com</p>
                            <p><i class="fa fa-phone"></i>+123-456-7890</p>
                            <div class="social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                                <a href=""><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h3 class="title">Useful Links</h3>
                        <ul>
                            <li><a href="#">Lorem ipsum</a></li>
                            <li><a href="#">Pellentesque</a></li>
                            <li><a href="#">Aenean vulputate</a></li>
                            <li><a href="#">Vestibulum sit amet</a></li>
                            <li><a href="#">Nam dignissim</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h3 class="title">Quick Links</h3>
                        <ul>
                            <li><a href="#">Lorem ipsum</a></li>
                            <li><a href="#">Pellentesque</a></li>
                            <li><a href="#">Aenean vulputate</a></li>
                            <li><a href="#">Vestibulum sit amet</a></li>
                            <li><a href="#">Nam dignissim</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h3 class="title">Newsletter</h3>
                        <div class="newsletter">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed porta dui. Class
                                aptent taciti sociosqu
                            </p>
                            <form>
                                <input class="form-control" type="email" placeholder="Your email here">
                                <button class="btn">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Footer End -->

    <!-- Footer Menu Start -->
    {{-- <div class="footer-menu">
        <div class="container">
            <div class="f-menu">
                <a href="">Terms of use</a>
                <a href="">Privacy policy</a>
                <a href="">Cookies</a>
                <a href="">Accessibility help</a>
                <a href="">Advertise with us</a>
                <a href="">Contact us</a>
            </div>
        </div>
    </div>
    <!-- Footer Menu End -->

    <!-- Footer Bottom Start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 copyright">
                    <p>Copyright &copy; <a href="">Your Site Name</a>. All Rights Reserved</p>
                </div>

                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                <div class="col-md-6 template-by">
                    <p>Designed By <a href="https://htmlcodex.com">HTML Codex</a></p>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Footer Bottom End -->

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('customs/lib/slick/slick.min.js') }}"></script>
    <script src="{{ asset('customs/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('customs/js/main.js') }}"></script>



</body>

</html>