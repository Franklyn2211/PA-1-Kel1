<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield("title")</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}" />

     <!-- Google Web Fonts -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet"> 
    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bootstrap icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Core theme CSS -->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@100;600;800&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/media_query.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.carousel.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/owl.theme.default.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/style_1.css') }}" rel="stylesheet" type="text/css"/>
        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <link href="{{ asset('assets/css/media_query.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css"/>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
              integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
        <link href="{{ asset('assets/css/owl.carousel.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/css/owl.theme.default.css') }}" rel="stylesheet" type="text/css"/>
        <!-- Bootstrap CSS -->
        <link href="{{ asset('assets/css/style_1.css') }}" rel="stylesheet" type="text/css"/>
        <!-- Modernizr JS -->
        <script src="{{ asset('assets/js/modernizr-3.5.0.min.js') }}"></script>
<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    <!-- Modernizr JS -->
    <script src="{{ asset('assets/js/modernizr-3.5.0.min.js') }}"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl7/1L_dstPt3HV5HzF6Gvk/e3s4Wz6iJgD/+ub2oU" crossorigin="anonymous">
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg fixed-top navbar-blue bg-blue">
            <div class="container px-5">
                <a class="navbar-brand" href="/" style="color: white; display: flex; align-items: center;">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="YPA Rumah Damai" width="50" height="50" class="d-inline-block align-text-top">
                    <span style="margin-left: 10px;">YPA Rumah Damai</span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="/About">Tentang</a></li>
                        <li class="nav-item"><a class="nav-link" href="/Relawan">Relawan</a></li>
                        <li class="nav-item"><a class="nav-link" href="/News">Berita</a></li>
                        <li class="nav-item"><a class="nav-link" href="/Announcement">Pengumuman</a></li>
                        <li class="nav-item"><a class="nav-link" href="/Partnership">Kemitraan</a></li>
                        <li class="nav-item"><a class="nav-link" href="/Sponsor">Sponsor</a></li>
                        <li class="nav-item"><a class="nav-link" href="/Statistics">Statistik</a></li>
                        <li class="nav-item"><a class="nav-link" href="/Contact">Kontak</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </main>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

