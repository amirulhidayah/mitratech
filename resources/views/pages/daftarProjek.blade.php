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
            background: url("assets/welcome/img/loading.gif") 50% 50% no-repeat rgb(249, 249, 249);
        }

    </style>

    <!-- Title -->
    <title>Daftar Projek</title>
</head>

<body>
    <div class="loader"></div>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">

            <!-- Brand -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="/assets/welcome/img/{{$pengaturan->logo}}" class="navbar-brand-img" alt="..." height="50px"
                    width="50px">
            </a>

        </div>
    </nav>

    <!-- WELCOME -->
    <section data-jarallax data-speed=".8" class="py-10 py-md-14 overlay overlay-primary bg-cover jarallax"
        style="background-image: url(assets/img/covers/cover-13.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-7 text-center">

                    <!-- Heading -->
                    <h1 class="display-2 fw-bold text-white">
                        Projek Kami
                    </h1>

                    <!-- Text -->
                    <p class="lead mb-0 text-white-75">
                        Beberapa Hasil Projek Yang Telah Kami Kerjakan Selama Ini
                    </p>

                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>

    <!-- SHAPE -->
    <div class="position-relative">
        <div class="shape shape-bottom shape-fluid-x text-light">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48h2880V0h-720C1442.5 52 720 0 720 0H0v48z" fill="currentColor" />
            </svg>
        </div>
    </div>

    <!-- SEARCH -->
    <section class="mt-n6">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!-- Form -->
                    <form class="rounded shadow mb-4" action="{{ url('/daftarProjek') }}">
                        <div class="input-group input-group-lg">

                            <!-- Text -->
                            <span class="input-group-text border-0 pe-1">
                                <i class="fe fe-search"></i>
                            </span>

                            @if (request('platform'))
                            <input class="form-control border-0 px-1" type="hidden" aria-label="Cari Projek"
                                placeholder="Cari Projek" name="platform" value="{{ request('platform') }}">
                            @endif

                            <!-- Input -->
                            <input class="form-control border-0 px-1" type="text" aria-label="Cari Projek"
                                placeholder="Cari Projek" name="cari" value="{{ request('cari') }}">
                            <select class="form-control border-0 px-1" aria-label="Default select example" name="paket">
                                <option selected hidden value="">Pilih Paket</option>
                                <option value="">Semua</option>
                                @foreach ($paket as $pakets)
                                <option value="{{$pakets->id}}" @if (request('paket')==$pakets->id)
                                    selected
                                    @endif>{{$pakets->nama}}</option>
                                @endforeach
                            </select>

                            <!-- Text -->
                            <span class="input-group-text border-0 py-0 ps-1 pe-3">
                                <button class="btn btn-sm btn-primary" type="submit">
                                    Cari
                                </button>
                            </span>

                        </div>
                    </form>

                    <!-- Badges -->
                    <div class="row align-items-center">
                        <div class="col-auto">

                            <!-- Heading -->
                            <h6 class="fw-bold text-uppercase text-muted mb-0">
                                Platform:
                            </h6>

                        </div>
                        <div class="col ms-n5">

                            <!-- Badges -->
                            <a class="badge rounded-pill bg-secondary-soft
                            @if (!request('platform'))
                                active
                                @endif " href="{{ url('daftarProjek') }}">
                                <span class="h6 text-uppercase">Semua</span>
                            </a>
                            @foreach ($platforms as $platform)
                            <a class="badge rounded-pill bg-secondary-soft @if (request('platform') == $platform->id)
                                active
                            @endif" href="{{ url('/daftarProjek?platform=' . $platform->id) }}">
                                <span class="h6 text-uppercase">{{ $platform->nama }}</span>
                            </a>
                            @endforeach


                        </div>
                    </div> <!-- / .row -->

                </div>
            </div> <!-- / .row -->
        </div>
    </section>

    <!-- ARTICLES -->
    <section class="pt-7 pt-md-10">
        <div class="container">
            <div class="row">
                @foreach ($projeks as $projek)
                <div class="col-12 col-md-6 col-lg-4 d-flex my-4">

                    <!-- Card -->
                    <div class="card mb-6 mb-lg-0 shadow-light-lg lift lift-lg">

                        <!-- Image -->
                        <a class="card-img-top" href="{{ url('detailProjek/' . $projek->id) }}">

                            <!-- Image -->
                            <img src="/assets/welcome/img/projek/foto/{{ $projek->foto }}" alt="..."
                                class="card-img-top">

                            <!-- Shape -->
                            <div class="position-relative">
                                <div class="shape shape-bottom shape-fluid-x text-white">
                                    <svg viewBox="0 0 2880 480" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M2160 0C1440 240 720 240 720 240H0v240h2880V0h-720z"
                                            fill="currentColor" />
                                    </svg>
                                </div>
                            </div>

                        </a>

                        <!-- Body -->
                        <a class="card-body" href="{{ url('detailProjek/' . $projek->id) }}">

                            <!-- Heading -->
                            <h3>
                                {{ $projek->judul }}
                            </h3>

                            <!-- Text -->
                            <p class="mb-0 text-muted">
                                {{ $projek->deskripsi }}
                            </p>

                        </a>

                        <!-- Meta -->
                        <a class="card-meta mt-auto" href="{{ url('detailProjek/' . $projek->id) }}">

                            <!-- Divider -->
                            <hr class="card-meta-divider">

                            <h6 class="text-uppercase text-muted me-2 mb-0">
                                {{ $projek->platformProjek->nama }}
                            </h6>

                            <!-- Date -->
                            <p class="h6 text-uppercase text-muted mb-0 ms-auto">
                                <time datetime="2019-05-02">Paket : {{$projek->paket->nama}}</time>
                            </p>

                        </a>

                    </div>

                </div>
                @endforeach

            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>

    @if (count($projeks) == 0)
    <div class="container text-center">
        <p class="fw-bold">Tidak Ada Projek</p>
    </div>
    @endif

    {{-- Pagination --}}
    <div class="container my-5">
        <div class="d-flex justify-content-center">
            {{ $projeks->links() }}
        </div>
    </div>

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
                    <img src="/assets/welcome/img/{{$pengaturan->logo}}" alt="..." class="footer-brand img-fluid mb-2"
                        height="100px" width="100px" />

                    <!-- Text -->
                    <p class="text-gray-700 mb-2">{{$pengaturan->nama_website}}</p>


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

    </script>

</body>

</html>
