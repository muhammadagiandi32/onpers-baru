<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>onPers | Mulai Pemberitaan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="{{ $data->description }}">
    <meta name="keywords" content="berita, onPers, publikasi, informasi, berita terbaru">
    <meta name="author" content="onPers Team">
    <meta property="og:title" content="{{ $data->title }}">
    <meta property="og:description" content="{{ $data->description }}">
    <meta property="og:image" content="{{ $data->image_url }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $data->title }}">
    <meta name="twitter:description" content="{{ $data->description }}">
    <meta name="twitter:image" content="{{ $data->image_url }}">
    <link rel="canonical" href="{{ url()->current() }}">
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

    <!-- Structured Data -->
    <script type="application/ld+json">
        {
        "@context": "https://schema.org",
        "@type": "NewsArticle",
        "headline": "{{ $data->title }}",
        "image": "{{ $data->image_url }}",
        "datePublished": "{{ $data->published_at }}",
        "dateModified": "{{ $data->updated_at }}",
        "author": {
            "@type": "Person",
            "name": "onPers Team"
        },
        "publisher": {
            "@type": "Organization",
            "name": "onPers",
            "logo": {
                "@type": "ImageObject",
                "url": "img/logo.png"
            }
        }
    }
    </script>
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
                        <a href="{{ url('/') }}l">
                            <img src="{{ asset('img/logo/logo-onpers.png') }}" alt="Logo">
                        </a>
                    </div>
                </div>
                {{-- <div class="col-lg-6 col-md-4">
                    <div class="b-ads">
                        <a href="https://htmlcodex.com">
                            <img src="img/ads-1.jpg" alt="Ads" />
                        </a>
                    </div>
                </div> --}}
                <div class="col-lg-3 col-md-4">
                    <div class="b-search">
                        <input type="text" placeholder="Search" />
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
                        <a href="{{url('/')}}" class="nav-item nav-link">Home</a>
                        {{-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">Sub Item 1</a>
                                <a href="#" class="dropdown-item">Sub Item 2</a>
                            </div>
                        </div>
                        <a href="single-page.html" class="nav-item nav-link active">Single Page</a> --}}
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

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">News</a></li>
                <li class="breadcrumb-item active">News details</li>
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
                            <p><em>{{ \Carbon\Carbon::parse($data->published_at)->translatedFormat('l, d F Y, H:i')
                                    }}</em></p>
                            {!! $data->content !!}
                        </div>
                    </div>
                    <div class="sn-related">
                        <h2>Berita Lainnya</h2>
                        <div class="row sn-slider">
                            @foreach ($Berita as $beritas)
                            <div class="col-md-4">
                                <div class="sn-img">
                                    <img src="{{ $beritas->image_url }}" />
                                    <div class="sn-title">
                                        <a href="{{ route('news-details', $beritas->slug) }}">{{ $beritas->title }}</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sidebar">
                        {{-- <div class="sidebar-widget">
                            <h2 class="sw-title">In This Category</h2>
                            <div class="news-list">
                                <div class="nl-item">
                                    <div class="nl-img">
                                        <img src="img/news-350x223-1.jpg" />
                                    </div>
                                    <div class="nl-title">
                                        <a href="">Lorem ipsum dolor sit amet
                                            consec adipis elit</a>
                                    </div>
                                </div>
                                <div class="nl-item">
                                    <div class="nl-img">
                                        <img src="img/news-350x223-2.jpg" />
                                    </div>
                                    <div class="nl-title">
                                        <a href="">Lorem ipsum dolor sit amet
                                            consec adipis elit</a>
                                    </div>
                                </div>
                                <div class="nl-item">
                                    <div class="nl-img">
                                        <img src="img/news-350x223-3.jpg" />
                                    </div>
                                    <div class="nl-title">
                                        <a href="">Lorem ipsum dolor sit amet
                                            consec adipis elit</a>
                                    </div>
                                </div>
                                <div class="nl-item">
                                    <div class="nl-img">
                                        <img src="img/news-350x223-4.jpg" />
                                    </div>
                                    <div class="nl-title">
                                        <a href="">Lorem ipsum dolor sit amet
                                            consec adipis elit</a>
                                    </div>
                                </div>
                                <div class="nl-item">
                                    <div class="nl-img">
                                        <img src="img/news-350x223-5.jpg" />
                                    </div>
                                    <div class="nl-title">
                                        <a href="">Lorem ipsum dolor sit amet
                                            consec adipis elit</a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{--
                        <div class="sidebar-widget">
                            <div class="image">
                                <a href="https://htmlcodex.com"><img src="img/ads-2.jpg" alt="Image" /></a>
                            </div>
                        </div> --}}

                        {{-- <div class="sidebar-widget">
                            <div class="tab-news">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#featured">Featured</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#popular">Popular</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#latest">Latest</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div id="featured" class="container tab-pane active">
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-1.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit
                                                    amet consec adipis
                                                    elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-2.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit
                                                    amet consec adipis
                                                    elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-3.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit
                                                    amet consec adipis
                                                    elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-4.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit
                                                    amet consec adipis
                                                    elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-5.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit
                                                    amet consec adipis
                                                    elit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="popular" class="container tab-pane fade">
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-4.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit
                                                    amet consec adipis
                                                    elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-3.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit
                                                    amet consec adipis
                                                    elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-2.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit
                                                    amet consec adipis
                                                    elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-1.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit
                                                    amet consec adipis
                                                    elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-2.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit
                                                    amet consec adipis
                                                    elit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="latest" class="container tab-pane fade">
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-3.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit
                                                    amet consec adipis
                                                    elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-4.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit
                                                    amet consec adipis
                                                    elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-5.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit
                                                    amet consec adipis
                                                    elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-4.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit
                                                    amet consec adipis
                                                    elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-3.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit
                                                    amet consec adipis
                                                    elit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <div class="image">
                                <a href="https://htmlcodex.com"><img src="img/ads-2.jpg" alt="Image" /></a>
                            </div>
                        </div> --}}

                        <div class="sidebar-widget">
                            <h2 class="sw-title">News Category</h2>
                            <div class="category">
                                <ul>
                                    @foreach ($jumlahBerita as $berita)
                                    <li><a href="">{{ $berita->category_name }}</a><span>({{ $berita->total }})</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        {{-- <div class="sidebar-widget">
                            <div class="image">
                                <a href="https://htmlcodex.com"><img src="img/ads-2.jpg" alt="Image" /></a>
                            </div>
                        </div> --}}

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

    <!-- Footer Start -->
    {{-- <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h3 class="title">Get in Touch</h3>
                        <div class="contact-info">
                            <p>
                                <i class="fa fa-map-marker"></i>123 News
                                Street, NY, USA
                            </p>
                            <p>
                                <i class="fa fa-envelope"></i>info@example.com
                            </p>
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
                                Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit. Vivamus sed porta dui.
                                Class aptent taciti sociosqu
                            </p>
                            <form>
                                <input class="form-control" type="email" placeholder="Your email here" />
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
    </div> --}}
    <!-- Footer Menu End -->

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

                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                {{-- <div class="col-md-6 template-by">
                    <p>
                        onPers
                        <a href="{{ url('/') }}"></a>
                    </p>
                </div> --}}
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