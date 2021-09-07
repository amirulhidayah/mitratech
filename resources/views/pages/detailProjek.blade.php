<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/welcome/img/logo.png" type="image/x-icon" />

    <!-- Map CSS -->
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css" />

    <!-- Libs CSS -->
    <link rel="stylesheet" href="/assets/welcome/css/libs.bundle.css" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="/assets/welcome/css/theme.bundle.css" />
    <style>
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url("/assets/welcome/img/loading.gif") 50% 50% no-repeat rgb(249, 249, 249);
        }
    </style>

    <!-- Title -->
    <title>{{ $projek->judul }}</title>
</head>

<body>
    <div class="loader"></div>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">

            <!-- Brand -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="/assets/welcome/img/logo.png" class="navbar-brand-img" alt="..." height="50px" width="50px">
            </a>

        </div>
    </nav>

    <!-- IMAGE -->
    <section data-jarallax data-speed=".8" class="py-12 py-md-15 bg-cover jarallax"
        style="background-image: url(/assets/welcome/img/projek/foto/{{ $projek->foto }});"></section>

    <!-- HEADER -->
    <section class="pt-8 pt-md-11">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-9 col-xl-8">

                    <!-- Heading -->
                    <h1 class="display-4 text-center">
                        {{ $projek->judul }}
                    </h1>
                </div>
                <div class="col-12 col-md-10 col-lg-9 col-xl-8 text-center">

                    <p class="text-muted"><a href="{{ url('daftarProjek?platform=' . $projek->platform_projek_id) }}"
                            class="text-muted text-decoration-none">
                            {{ $projek->platformProjek->nama }}</a> | Paket : <a
                            href="{{ url('daftarProjek?paket=' . $projek->paket_id) }}"
                            class="text-muted text-decoration-none">
                            {{ $projek->paket->nama }}</a></p>

                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>

    <!-- SECTION -->
    <section class="pt-6 pt-md-8">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-10 col-xl-10">

                    {!! $projek->isi !!}

                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>

    <!-- SHAPE -->
    <div class="position-relative pb-10">
        <div class="shape shape-bottom shape-fluid-x text-light">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48h2880V0h-720C1442.5 52 720 0 720 0H0v48z" fill="currentColor" />
            </svg>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="py-8 py-md-11 bg-dark justify-content-center text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Brand -->
                    <img src="/assets/welcome/img/logo.png" alt="..." class="footer-brand img-fluid mb-2" height="100px"
                        width="100px" />

                    <!-- Text -->
                    <p class="text-gray-700 mb-2">Lorem ipsum dolor sit amet.</p>

                    <!-- Social -->
                    <!-- <ul class="list-unstyled list-inline list-social mb-6 mb-md-0">
              <li class="list-inline-item list-social-item me-3">
                <a href="#!" class="text-decoration-none">
                  <img
                    src="./assets/img/icons/social/instagram.svg"
                    class="list-social-icon"
                    alt="..."
                  />
                </a>
              </li>
              <li class="list-inline-item list-social-item me-3">
                <a href="#!" class="text-decoration-none">
                  <img
                    src="./assets/img/icons/social/facebook.svg"
                    class="list-social-icon"
                    alt="..."
                  />
                </a>
              </li>
              <li class="list-inline-item list-social-item me-3">
                <a href="#!" class="text-decoration-none">
                  <img
                    src="./assets/img/icons/social/twitter.svg"
                    class="list-social-icon"
                    alt="..."
                  />
                </a>
              </li>
              <li class="list-inline-item list-social-item">
                <a href="#!" class="text-decoration-none">
                  <img
                    src="./assets/img/icons/social/pinterest.svg"
                    class="list-social-icon"
                    alt="..."
                  />
                </a>
              </li>
            </ul> -->
                </div>
            </div>
            <!-- / .row -->
        </div>
        <!-- / .container -->
    </footer>

    <!-- JAVASCRIPT -->
    <!-- Map JS -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>

    <!-- Vendor JS -->
    <script src="/assets/welcome/js/vendor.bundle.js"></script>

    <!-- Theme JS -->
    <script src="/assets/welcome/js/theme.bundle.js"></script>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script>
        $(window).load(function() {
            $(".loader").fadeOut("slow");
        });

        $(document).ready(function() {
            $("img").not('.navbar-brand-img').addClass('img-fluid py-4');
        })
    </script>

</body>

</html>
