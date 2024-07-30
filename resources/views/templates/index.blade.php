<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bootstrap News Template - Free HTML Templates</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Bootstrap News Template - Free HTML Templates" name="keywords">
    <meta content="Bootstrap News Template - Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @vite('resources/customs/css/style.css')
    @vite('resources/customs/js/main.js')
    @vite('resources/customs/lib/slick/slick.min.js')
    @vite('resources/customs/lib/easing/easing.min.js')
    @vite('resources/customs/lib/slick/slick-theme.css')
    @vite('resources/customs/lib/slick/slick.css')
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
                <div class="col-lg-6 col-md-4">
                    <div class="b-ads">
                        <a href="https://htmlcodex.com">
                            <img src="{{ asset('img/ads-1.jpg') }}" alt="Ads">
                        </a>
                    </div>
                </div>
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
                        <a href="index.html" class="nav-item nav-link active">Home</a>
                        {{-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">Sub Item 1</a>
                                <a href="#" class="dropdown-item">Sub Item 2</a>
                            </div>
                        </div>
                        <a href="single-page.html" class="nav-item nav-link">Single Page</a>
                        <a href="contact.html" class="nav-item nav-link">Contact Us</a> --}}
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
            <div class="row">
                <div class="col-md-6 tn-left">
                    <div class="row tn-slider">
                        <div class="col-md-6">
                            <div class="tn-img">
                                <img src="{{ asset('img/news-450x350-1.jpg') }}" />
                                <div class="tn-title">
                                    <a href="">Lorem ipsum dolor sit amet</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="tn-img">
                                <img src="{{ asset('img/news-450x350-2.jpg') }}" />
                                <div class="tn-title">
                                    <a href="">Integer hendrerit elit eget purus sodales maximus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 tn-right">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="tn-img">
                                <img src="{{ asset('img/news-350x223-1.jpg') }}" />
                                <div class="tn-title">
                                    <a href="">Lorem ipsum dolor sit</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
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
                <div class="col-md-12">
                    <h2>Berita</h2>
                    <div class="row cn-slider">
                        <div class="col-md-6">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="{{ asset('img/news-350x223-1.jpg') }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="{{ asset('img/news-350x223-1.jpg') }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="{{ asset('img/news-350x223-1.jpg') }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="{{ asset('img/news-350x223-1.jpg') }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
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
                    <div class="col-md-6">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{ asset('img/news-350x223-1.jpg') }}"
                                alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up
                                    the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{ asset('img/news-350x223-1.jpg') }}"
                                alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up
                                    the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{ asset('img/news-350x223-1.jpg') }}"
                                alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up
                                    the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{ asset('img/news-350x223-1.jpg') }}"
                                alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up
                                    the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
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
                    <div class="col-md-6">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{ asset('img/news-350x223-1.jpg') }}"
                                alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up
                                    the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{ asset('img/news-350x223-1.jpg') }}"
                                alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up
                                    the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{ asset('img/news-350x223-1.jpg') }}"
                                alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up
                                    the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{ asset('img/news-350x223-1.jpg') }}"
                                alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up
                                    the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>


</body>

</html>
