<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/welcome/img/{{$pengaturan->logo}}" type="image/x-icon" />

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
    <title>Paket {{$paket->nama}}</title>
</head>

<body>
    <div class="loader"></div>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">

            <!-- Brand -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="/assets/welcome/img/{{ $pengaturan->logo }}" class="navbar-brand-img" alt="..." height="50px"
                    width="50px">
            </a>

        </div>
    </nav>

    <!-- IMAGE -->
    <section class="pt-8 pt-md-11 pb-10 pb-md-15 bg-primary">

        <!-- Shape -->
        <div class="shape shape-blur-3 text-white">
            <svg viewBox="0 0 1738 487" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0h1420.92s713.43 457.505 0 485.868C707.502 514.231 0 0 0 0z" fill="url(#paint0_linear)" />
                <defs>
                    <linearGradient id="paint0_linear" x1="0" y1="0" x2="1049.98" y2="912.68"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="currentColor" stop-opacity=".075" />
                        <stop offset="1" stop-color="currentColor" stop-opacity="0" />
                    </linearGradient>
                </defs>
            </svg> </div>

        <!-- Content -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 text-center">

                    <!-- Heading -->
                    <h1 class="display-2 text-white">
                        Paket : {{$paket->nama}}
                    </h1>

                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->

    </section>

    <!-- SHAPE -->
    <div class="position-relative">
        <div class="shape shape-bottom shape-fluid-x text-light">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48h2880V0h-720C1442.5 52 720 0 720 0H0v48z" fill="currentColor" /></svg> </div>
    </div>

    <!-- PRICING -->
    <section class="mt-n8 mt-md-n14">
        <div class="container">
            <div class="row gx-4 d-flex justify-content-center">
                <div class="col-12 col-md-8">

                    <!-- Card -->
                    <div class="card shadow-lg mb-6 mb-md-0">
                        <div class="card-body shadow-lg">
                            <!-- Text -->
                            <p class="text-center text-muted mt-2">
                                Mulai Dari
                            </p>

                            <!-- Price -->
                            <div class="d-flex justify-content-center mt-n4 mb-5">
                                <span class="h2 mb-0 fw-bold"> {{$paket->harga}}</span>
                            </div>

                            <!-- List -->
                            @foreach ($paket->fiturPaket as $fitur)
                            <div class="d-flex">

                                <!-- Badge -->
                                <div class="badge badge-rounded-circle bg-success-soft mt-1 me-4">
                                    <i class="fe fe-check"></i>
                                </div>

                                <!-- Text -->
                                <p>
                                    {{$fitur->fitur}}
                                </p>

                            </div>


                            @endforeach

                            <!-- Button -->
                            <a href="{{url('daftarProjek?paket=' . $paket->id)}}" class="btn w-100 btn-primary mt-5">
                                Contoh Projek <i class="fe fe-arrow-right ms-3"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>

    <!-- FOOTER -->
    <footer class="py-8 py-md-11 bg-dark justify-content-center text-center mt-10">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Brand -->
                    <img src="/assets/welcome/img/{{ $pengaturan->logo }}" alt="..." class="footer-brand img-fluid mb-2"
                        height="100px" width="100px" />

                    <!-- Text -->
                    <p class="text-gray-700 mb-2">{{ $pengaturan->nama_website }}</p>


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
        $(window).load(function () {
            $(".loader").fadeOut("slow");
        });

        $(document).ready(function () {
            $("img").not('.navbar-brand-img').addClass('img-fluid py-4');
        })

    </script>

</body>

</html>
