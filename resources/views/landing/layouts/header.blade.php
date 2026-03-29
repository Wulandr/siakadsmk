<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIAKAD</title>
    <meta name="description" content="Beapp is a Mobile App Development Agency HTML5 Template by tempload." />
    <meta name="keywords" content="beapp, mobile app, agency, development, html, template, tempload" />
    <meta name="author" content="tempload" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('landing/assets/images/logo2.png') }}" />

    <!-- Bootstrap & Plugins CSS -->
    <link href="{{ asset('landing/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('landing/assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="{{ asset('landing/assets/css/style.css') }}" rel="stylesheet" type="text/css">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <!-- Leaflet Search CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-search@2.9.9/dist/leaflet-search.min.css" />

    <!-- Leaflet Geocoder CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />

    <style>
        .nama-murid {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            /* max 2 baris */
            -webkit-box-orient: vertical;
            overflow: hidden;
            font-size: 14px;
            line-height: 1.2;
        }

        .card-body {
            min-height: 110px;
        }
    </style>
</head>

<body>

    {{-- <!-- ***** Preloader Start ***** -->
    <div class="loader-wrapper">
        <div class="center">
            <div class="dot dot-one"></div>
            <div class="dot dot-two"></div>
            <div class="dot dot-three"></div>
            <div class="dot dot-four"></div>
            <div class="dot dot-five"></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** --> --}}

    <!-- ***** Header Area Start ***** -->
    <header class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{ url('/') }}" class="logo mt-3">
                            <img src="{{ asset('landing/assets/images/logo1.png') }}" class="light-logo"
                                alt="SIAKAD" />
                            <img src="{{ asset('landing/assets/images/logo1.png') }}" class="dark-logo"
                                alt="SIAKAD" />
                        </a>
                        <!-- ***** Logo End ***** -->

                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="{{ url('/') }}" class="active">BERANDA</a></li>
                            {{-- <li><a href="{{ url('/list-mitra') }}">MITRA</a></li>
                            <li><a href="{{ url('/news') }}">BERITA</a></li>
                            <li><a href="{{ url('/activities') }}">KEGIATAN</a></li>
                            <li><a href="{{ url('/products') }}">PRODUK</a></li>
                            <li><a href="{{ url('/list-pendampingan') }}">PENDAMPINGAN</a></li>
                            <li><a href="{{ url('/infographics') }}">INFOGRAFIS</a></li> --}}

                            @if (Route::has('google.login'))
                                @auth
                                    <li>
                                        <a href="{{ url('/dashboard') }}" class="btn-nav-line">DASHBOARD</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ url('/login') }}" class="btn-nav-line">Masuk/Daftar</a>
                                    </li>
                                @endauth
                            @endif
                        </ul>
                        <a class="menu-trigger">
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- Leaflet Search JS -->
    <script src="https://unpkg.com/leaflet-search@2.9.9/dist/leaflet-search.min.js"></script>

    <!-- Leaflet Geocoder JS -->
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
