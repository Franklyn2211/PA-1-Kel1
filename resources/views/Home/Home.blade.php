@extends("layouts.layout")

@section("title", "Home")

@section("content")
<header class="py-5" style="background-color: #0B3057;">
    <div class="container px-5">
        <div class="row gx-5 align-items-center justify-content-center">
            <div class="col-lg-8 col-xl-7 col-xxl-6">
                <div class="my-5 text-center text-xl-start">
                    <!-- Hanya satu objek yang dikirimkan dari controller, jadi tidak perlu pengulangan -->
                    <!-- Check if $dataHeroSection is defined -->
                    @if(isset($dataHeroSection))
                        <h1 class="display-5 fw-bolder text-white mb-2">{{ $dataHeroSection->header }}</h1>
                        <p class="lead fw-normal text-white-50 mb-4">{{ $dataHeroSection->paragraph }}</p>
                    @else
                        <!-- Handle the case where $dataHeroSection is not defined -->
                        <h1 class="display-5 fw-bolder text-white mb-2">Default Header</h1>
                        <p class="lead fw-normal text-white-50 mb-4">Default Paragraph</p>
                    @endif
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                        <a class="btn btn-danger btn-lg px-4 me-sm-3" href="/Donate">Ayo Donasi</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
                @if($galleries->count() > 0)
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                        <!-- Tambahkan data-bs-interval="5000" untuk membuat carousel bergerak setiap 5 detik -->
                        <div class="carousel-inner">
                            @foreach($galleries as $key => $gallery)
                                <div class="carousel-item{{ $key === 0 ? ' active' : '' }}">
                                    <img src="{{ $gallery->photo }}" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>{{ $gallery->title }}</h5>
                                        <p>{{ $gallery->description }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                @else
                    <p>No galleries available.</p>
                @endif
            </div>
<<<<<<< HEAD

=======
            
>>>>>>> 02def926f64002357abf63b2bb73f499ed9f7339
        </div>
    </div>
</header>
            <section class="py-5" id="features">
                <div class="container px-5 my-5">
                    <div class="row gx-5">
                        <div class="col-lg-4 mb-5 mb-lg-0">
                            @if(isset($dataHeroSection))
                            <h2 class="fw-bolder mb-0">{{ $dataHeroSection->header }}</h2>
                        @else
                            <h2 class="fw-bolder mb-0">Default Header</h2>
                        @endif</div>
                        <div class="col-lg-8">
                            <div class="row gx-5 row-cols-1 row-cols-md-2">
                                <div class="col mb-5 mb-md-0 h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                                    <h2 class="h5">Featured title</h2>
                                    <p class="mb-0">Paragraph of text beneath the heading to explain the heading. Here is just a bit more text.</p>
                                </div>
                                <div class="col h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                                    <h2 class="h5">Featured title</h2>
                                    <p class="mb-0">Paragraph of text beneath the heading to explain the heading. Here is just a bit more text.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
<<<<<<< HEAD

=======
            
>>>>>>> 02def926f64002357abf63b2bb73f499ed9f7339
            <!-- Blog preview section-->
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <div class="text-center">
                                <h2 class="fw-bolder">From our blog</h2>
                                <p class="lead fw-normal text-muted mb-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque fugit ratione dicta mollitia. Officiis ad.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-5">
                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0">
                                <img class="card-img-top" src="https://dummyimage.com/600x350/ced4da/6c757d" alt="..." />
                                <div class="card-body p-4">
                                    <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                                    <a class="text-decoration-none link-dark stretched-link" href="#!"><h5 class="card-title mb-3">Blog post title</h5></a>
                                    <p class="card-text mb-0">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                    <div class="d-flex align-items-end justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                            <div class="small">
                                                <div class="fw-bold">Kelly Rowan</div>
                                                <div class="text-muted">March 12, 2023 &middot; 6 min read</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0">
                                <img class="card-img-top" src="https://dummyimage.com/600x350/adb5bd/495057" alt="..." />
                                <div class="card-body p-4">
                                    <div class="badge bg-primary bg-gradient rounded-pill mb-2">Media</div>
                                    <a class="text-decoration-none link-dark stretched-link" href="#!"><h5 class="card-title mb-3">Another blog post title</h5></a>
                                    <p class="card-text mb-0">This text is a bit longer to illustrate the adaptive height of each card. Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                    <div class="d-flex align-items-end justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                            <div class="small">
                                                <div class="fw-bold">Josiah Barclay</div>
                                                <div class="text-muted">March 23, 2023 &middot; 4 min read</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0">
                                <img class="card-img-top" src="https://dummyimage.com/600x350/6c757d/343a40" alt="..." />
                                <div class="card-body p-4">
                                    <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                                    <a class="text-decoration-none link-dark stretched-link" href="#!"><h5 class="card-title mb-3">The last blog post title is a little bit longer than the others</h5></a>
                                    <p class="card-text mb-0">Some more quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                    <div class="d-flex align-items-end justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                            <div class="small">
                                                <div class="fw-bold">Evelyn Martinez</div>
                                                <div class="text-muted">April 2, 2023 &middot; 10 min read</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="informasi-umum" class="bg-informasi-umum container text-center">
        <div class="p-5">
            <h1><strong>Statistik</strong></h1>
            <div class="d-flex justify-content-center mb-4">
                <div id="underline-line-informasi-umum" class=" bg-primary"></div>
            </div>

            <div class="d-flex justify-content-center mt-5 flex-wrap gap-5" id="tampilan-data-informasi-umum">
                <div style="width: 18rem">
                    <div class="mt-4">
                        <i class="fa-solid fa-chalkboard-user card-img-top" style="font-size: 80px"></i>
                    </div>
                    <div class="card-body">

                        <br>
                        <span class="fs-5"><strong>Anak Disabilitan</strong></span>
                    </div>
                </div>

                <div class="d-none d-md-inline vertical-line"></div>

                <div style="width: 18rem">
                    <div class="mt-4">
                        <i class="fa-solid fa-child-reaching card-img-top" style="font-size: 80px"></i>
                    </div>
                    <div class="card-body">

                        <br>
                        <span class="fs-5"><strong>Anak Non Disabilitas</strong></span>
                    </div>
                </div>

                <div class="d-none d-md-inline vertical-line"></div>

                <div style="width: 18rem">
                    <div class="mt-4">
                        <i class="fa-solid fa-user-graduate" style="font-size: 80px"></i>
                    </div>
                    <div class="card-body">

                        <br>
                        <span class="fs-5"><strong>Staf/Pengajar</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="mitra-kampus" class="splide container p-5" aria-label="Beautiful Images">
        <h1 class="text-center fw-bold">SPONSOR</h1>
        <div class="d-flex justify-content-center mb-4">
            <div id="underline-line-mitra" class="bg-primary"></div>
        </div>


        <div class="splide__slider">
            <div class="splide__track">
                <ul class="splide__list">



                </ul>
            </div>
        </div>

    </section>
    <section id="testimoni" class="splide container bg-informasi-umum p-5" aria-label="Beautiful Images">
        <h1 class="text-center fw-bold mb-5">Testimoni</h1>

        <div class="splide__slider">
            <div class="splide__track">
                <ul class="splide__list">

                        <li class="splide__slide d-flex justify-content-center" data-splide-interval="2000">
                            <div class="card" style="">
                                <div class="bg-primary bg-image-container card-img-top"></div>
                                <div class="d-flex justify-content-center">
                                    <div class="image-container">
                                        <img src="" class="cropped-image"
                                            alt="foto-profil">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold"></h5>
                                    <div id="tempat-pill" class="d-flex gap-1 mb-4">
                                        <div class="pill d-inline text-muted">

                                        </div>

                                        <div class="pill d-inline text-muted">

                                        </div>

                                        <div class="pill d-inline text-muted">

                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center border border-1 rounded p-3"
                                        style="height: 200px;">
                                        <p class="card-text fs-7">

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>

                </ul>
            </div>
        </div>
    </section>

@endsection
