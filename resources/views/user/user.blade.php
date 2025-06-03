<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Wisata - Minat Khusus</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="/assets/favicon.ico" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- AOS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
        rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">Destinasi Wisata Minat Khusus</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#page-top">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarKategori" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Kategori
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarKategori">
                            @foreach ($kategori as $kt)
                                <li>
                                    <a class="dropdown-item" href="#">{{ $kt->nama }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Wisata</a></li>
                    <li class="nav-item"><a class="nav-link" href="#bobot">Bobot</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('user.information') }}">Information</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead -->
    <header class="masthead d-flex align-items-center">
        <div class="container px-4 px-lg-5 text-center">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h1 class="display-4 text-uppercase fw-bold text-white animate__animated animate__fadeInDown">
                        Temukan Destinasi Wisata Impianmu
                    </h1>
                    <hr class="divider my-4 mx-auto" />
                    <p class="lead text-light mb-5 animate__animated animate__fadeInUp">
                        Sistem Rekomendasi Wisata Minat Khusus berbasis <strong>MOORA</strong> — sesuai selera,
                        anggaran, dan aksesibilitas!
                    </p>
                    <a class="btn btn-primary btn-lg shadow-lg px-5 py-3 rounded-pill animate__animated animate__zoomIn"
                        href="{{ route('user.hasil') }}">
                        Rekomendasi Wisata
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- About-->
    <section class="page-section bg-primary" id="about" data-aos="fade-up" data-aos-duration="1000">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0" data-aos="zoom-in" data-aos-delay="100">Wisata Minat Khusus</h2>
                    <hr class="divider divider-light" data-aos="zoom-in" data-aos-delay="200" />
                    <p class="text-white-75 mb-4" data-aos="fade-in" data-aos-delay="300">
                        Jenis wisata yang dirancang untuk memenuhi kebutuhan dan preferensi
                        khusus dari wisatawan berdasarkan minat atau hobi tertentu. Jenis wisata ini berbeda dengan
                        wisata massal, karena lebih menekankan pada pengalaman yang lebih personal dan mendalam.!
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services-->
    <section class="page-section" id="kategori">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0" data-aos="zoom-in">Kategori Wisata Minat Khusus</h2>
            <hr class="divider" data-aos="fade-left" />
            <div class="row gx-4 gx-lg-5">
                @php
                    $iconList = [
                        'bi-gem',
                        'bi-compass',
                        'bi-map',
                        'bi-laptop',
                        'bi-lightning',
                        'bi-star',
                        'bi-book',
                        'bi-globe',
                        'bi-heart',
                    ];
                    $i = 0;
                @endphp
                @foreach ($kategori as $kategori)
                    @php
                        $icon = $iconList[$i % count($iconList)];
                        $i++;
                        $delay = $i * 100;
                    @endphp
                    <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="{{ $delay }}"
                        data-aos-duration="800">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi {{ $icon }} fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">{{ $kategori->nama }}</h3>
                            <p class="text-muted mb-0">{{ $kategori->deskripsi }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @php
$grouped = $alternatif->groupBy(function($item) {
    return $item->kategori->nama;
});
@endphp
@foreach ($grouped as $kategoriNama => $items)
<div id="portfolio">
    <div class="container-fluid p-0">
        <div class="row g-0">
            @foreach ($items as $alternatif)
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="{{ asset('storage/' . $alternatif->gambar) }}"
                        title="{{ $alternatif->nama }}">
                         <img class="img-fluid"
                              src="{{ asset('storage/' . $alternatif->gambar) }}"
                              alt="{{ $alternatif->nama }}"
                              style="width: 100%; height: 480px; object-fit: cover;" />
                              
                         <div class="portfolio-box-caption">
                             <div class="project-category text-white-50">{{ $alternatif->kategori->nama }}</div>
                             <div class="project-name">{{ $alternatif->nama }}</div>
                         </div>
                     </a>
                     
                </div>
            @endforeach
        </div>
    </div>

    {{-- Section deskripsi kategori (cukup sekali per grup) --}}
    <section class="page-section bg-primary">
        <div class="container px-4 px-lg-5" data-aos="fade-up" data-aos-duration="800">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0">Wisata Minat Khusus Kategori {{ $items->first()->kategori->nama }}</h2>
                    <hr class="divider divider-light" />
                    <p class="text-white-75 mb-4">{{ $items->first()->kategori->deskripsi }}</p>
                    <a class="btn btn-light btn-xl" href="{{route('user.hasil-kategori')}}">Get Started!</a>
                </div>
            </div>
        </div>
    </section>
</div>
@endforeach


    <section class="page-section" id="bobot">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0">Pembobotan</h2>
            <hr class="divider"data-aos="fade-left"/>
            <div class="row gx-4 gx-lg-5">
                @php
                    $iconList = [
                        'bi-gem',
                        'bi-compass',
                        'bi-map',
                        'bi-laptop',
                        'bi-lightning',
                        'bi-star',
                        'bi-book',
                        'bi-globe',
                        'bi-heart',
                    ];
                    $i = 0;
                @endphp
                @foreach ($kriteria as $kriteria)
                    @php
                        $icon = $iconList[$i % count($iconList)];
                        $i++;
                    @endphp
                    <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-duration="1000">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi {{ $icon }} fs-1 text-primary" data-aos="zoom-in" data-aos-delay="100"></i></div>
                            <h3 class="h4 mb-2" data-aos="zoom-in" data-aos-delay="200">{{ $kriteria->nama }}</h3>
                            <p class="text-muted mb-0" data-aos="fade-in" data-aos-delay="300">Pada kreteria {{ $kriteria->nama }} menggunakan bobot
                                {{ $kriteria->bobot }} untuk menemukan hasil dari rekomendasi</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-5">
                <a class="btn btn-light btn-xl" href="{{ route('bobot.form') }}">Get Started!</a>
            </div>

        </div>
    </section>
    
    <!-- Footer-->
    <footer class="bg-light py-5">
        <div class="container px-4 px-lg-5">
            <div class="small text-center text-muted">Dinas Pariwisata Kabupaten Gianyar</div>
        </div>
    </footer>
    <!-- AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <!-- Core theme JS-->
    <script src="/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
