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
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">


    <link rel="stylesheet" href="{{ asset('customs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('customs/lib/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('customs/lib/slick/slick.css') }}">
    <style>
        /* Styling untuk Navbar */
        .navbar {
            background-color: #28a745;
            /* Ganti warna latar belakang menjadi hijau */
            padding: 15px 30px;
            /* Perbesar padding untuk panjang navbar */
        }

        .nav-item.nav-link {
            font-size: 16px;
            /* Ukuran font yang lebih kecil */
            font-weight: 500;
            /* Menggunakan font tebal agar lebih jelas */
            color: #ffffff;
            /* Warna teks putih */
            margin-left: 20px;
            /* Memberikan jarak antar item */
            text-transform: uppercase;
            /* Membuat semua huruf besar */
            transition: color 0.3s ease;
            /* Efek transisi saat hover */
        }

        .nav-item.nav-link:hover {
            color: #ffb300;
            /* Warna teks saat hover */
        }

        .nav-item.nav-link.active {
            color: #ffb300;
            /* Warna untuk item aktif */
            font-weight: bold;
            /* Memberikan penekanan pada item aktif */
        }

        .social {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .social-icon {
            color: #ffffff;
            font-size: 20px;
            margin-left: 20px;
            /* Memberikan jarak antar ikon */
            transition: color 0.3s ease;
        }

        .social-icon:hover {
            color: #ffb300;
            /* Warna ikon saat hover */
        }

        @media (max-width: 767px) {
            .navbar-nav {
                text-align: center;
                /* Menata menu di layar kecil agar tampil lebih rapi */
                margin-top: 10px;
            }

            .social {
                justify-content: center;
                margin-top: 10px;
                /* Memberikan jarak di bawah social icons */
            }
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

        img {
            height: 200px;
        }
    </style>
</head>

<body>
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

                        <!-- Jika pengguna sudah login, tampilkan Dashboard -->
                        @if (!Auth::check())
                        <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
                        @else
                        <a href="{{ route('dashboards') }}" class="nav-item nav-link">Dashboard</a>
                        @endif
                    </div>

                    <!-- Ikon Media Sosial -->
                    <div class="social ml-auto d-flex">
                        <a href="" class="social-icon"><i class="fab fa-twitter"></i></a>
                        <a href="" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                        <a href="" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="" class="social-icon"><i class="fab fa-youtube"></i></a>
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
                        {{-- @foreach ($kanan as $kanan) --}}
                        <div class="col-md-12">
                            <div class="tn-img">
                                @if(isset($kanan))
                                <img src="{{ $kanan->image_url }}" />
                                @endif
                                {{-- <div class="tn-title">
                                    <a href="">Lorem ipsum dolor sit</a>
                                </div> --}}
                            </div>
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
                                            style="cursor: pointer;">>
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

            <div class="row">
                <div class="col-md-12">
                    <h2>Headline</h2>
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
    {{-- Berita --}}
    <div class="cat-news">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Berita</h2>
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

    </div>

    {{-- end Berita --}}
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
    <div class="adv">
        <div class="container">
            <div class="advertorial">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Advertorial</h2>
                            <div class="row cn-slider">
                                <!-- Mengelompokkan setiap 3 berita -->
                                @foreach ($Advertorial as $adv)
                                <div class="col-md-6">
                                    <div class="cn-img">
                                        <img src="{{ $adv->image_url }}" alt="{{ $adv->title }}">
                                        <div class="cn-title">
                                            <a href="{{ route('news-details', $adv->slug) }}">
                                                {{ $adv->title }}
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
        </div>

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- JavaScript Libraries -->

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('customs/lib/slick/slick.min.js') }}"></script>
        <script src="{{ asset('customs/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('customs/js/main.js') }}"></script>
        <script>
            $(document).ready(function() {
            // Cek jika layar adalah mobile
            if ($(window).width() <= 768) {
                $(".container-fluid .row").slick({
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    prevArrow: '<button class="slick-prev">Previous</button>',
                    nextArrow: '<button class="slick-next">Next</button>',
                });
            }
        });

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


</body>

</html>