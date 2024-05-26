@extends('layouts.layout')
@section('title', 'Home')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 p-0">
                <header class="py-5" style="background-color: #0B3057;">
                    <div class="container px-5">
                        <div class="row gx-5 align-items-center justify-content-center">
                            <div class="col-lg-8 col-xl-7 col-xxl-6">
                                <div class="my-5 text-center text-xl-start">
                                    @if (isset($heroSection))
                                        <h1 class="display-5 fw-bolder text-white mb-2">{{ $heroSection->header }}</h1>
                                        <p class="lead fw-normal text-white-50 mb-4">{!! $heroSection->paragraph !!}</p>
                                    @else
                                        <h1 class="display-5 fw-bolder text-white mb-2">Default Header</h1>
                                        <p class="lead fw-normal text-white-50 mb-4">Default Paragraph</p>
                                    @endif
                                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                        <a class="btn btn-primary btn-lg px-4 me-sm-3" href="/Donate">Ayo Donasi</a>
                                        <a class="btn btn-primary btn-lg px-4 me-sm-3" href="/Relawan">Ayo Jadi Relawan</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
                                @if ($galleries->count() > 0)
                                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel"
                                        data-bs-interval="5000">
                                        <div class="carousel-inner">
                                            @foreach ($galleries as $key => $gallery)
                                                <div class="carousel-item{{ $key === 0 ? ' active' : '' }}">
                                                    <img src="{{ asset('storage/galeri/' . $gallery->photo) }}"
                                                        alt="{{ $gallery->title }}" class="img-fluid">
                                                    <div class="carousel-caption d-none d-md-block">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                @else
                                    <p>No galleries available.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </header>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <section class="py-5">
                    <div class="container px-5 my-5">
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                <div class="text-center">
                                    <h2 class="fw-bolder">Berita</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row gx-5">
                            @foreach ($news->take(1) as $berita)
                                <div class="col-lg-12 mb-3">
                                    <div class="card h-130 shadow border-0">
                                        <img class="card-img-top"
                                            src="{{ asset('storage/app/public/photo/' . $berita->photo) }}" alt="..."
                                            style="width: 100%; height: 23%;" />
                                        <div class="card-body p-4">
                                            <a class="text-decoration-none link-dark stretched-link"
                                                href="{{ route('news.show', ['id_news' => $berita->id_news]) }}">
                                                <h5 class="card-title mb-3">{{ $berita->title }}</h5>
                                            </a>
                                            <p class="card-text mb-0">{!! $berita->description !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row gx-5">
                            @foreach ($news->skip(1)->take(2) as $berita)
                                <div class="col-lg-6 mb-5">
                                    <div class="card h-100 shadow border-0">
                                        <img class="card-img-top"
                                            src="{{ asset('storage/app/public/photo/' . $berita->photo) }}" alt="..."
                                            style="width: 100%; height: 100%;" />
                                        <div class="card-body p-4">
                                            <a class="text-decoration-none link-dark stretched-link"
                                                href="{{ route('news.show', ['id_news' => $berita->id_news]) }}">
                                                <h5 class="card-title mb-3">{{ $berita->title }}</h5>
                                            </a>
                                            <p class="card-text mb-0">{!! Str::limit(strip_tags($berita->description), 50) !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-4 text-center">
                                <a class="btn btn-primary btn-lg" href="{{ route('News.index') }}">See More</a>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="informasi-umum" class="bg-informasi-umum container text-center">
                    <div class="py-5">
                        <a href="{{ route('Statistics.index') }}">
                            <h1><strong>Statistik</strong></h1>
                        </a>
                        <div class="d-flex justify-content-center mb-4">
                            <div id="underline-line-informasi-umum" class=" bg-primary"></div>
                        </div>

                        <div class="d-flex justify-content-center mt-5 flex-wrap gap-5" id="tampilan-data-informasi-umum">
                            <div style="width: 10rem">
                                <div class="mt-4">
                                    <i class="fas fa-wheelchair" style="font-size: 80px"></i>
                                </div>
                                <div class="card-body">
                                    <h3>{{ $totalAnakDisabilitas }}</h3>
                                    <span class="fs-5"><strong>Anak Spesial</strong></span>
                                </div>
                            </div>
                            <div style="width: 10rem">
                                <div class="mt-4">
                                    <i class="fas fa-child" style="font-size: 80px"></i>
                                </div>
                                <div class="card-body">
                                    <h3>{{ $totalSiswaInformal }}</h3>
                                    <span class="fs-5"><strong>Siswa Informal</strong></span>
                                </div>
                            </div>
                            <div style="width: 10rem">
                                <div class="mt-4">
                                    <i class="fas fa-donate" style="font-size: 80px"></i>
                                </div>
                                <div class="card-body">
                                    <h3>{{ $totalDonatur }}</h3>
                                    <span class="fs-5"><strong>Donatur</strong></span>
                                </div>
                            </div>
                            <div style="width: 10rem">
                                <div class="mt-4">
                                    <i class="fas fa-handshake" style="font-size: 80px"></i>
                                </div>
                                <div class="card-body">
                                    <h3>{{ $totalKemitraan }}</h3>
                                    <span class="fs-5"><strong>Kemitraan</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="py-5">
                    <div class="container my-5">
                        <h1 class="text-center fw-bold mb-5">Testimoni</h1>

                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card-body px-2">
                                    @if ($testimoni->count() > 0)
                                        <div id="carouselTestimoniControls" class="carousel slide" data-ride="carousel"
                                            data-interval="5000">
                                            <div class="carousel-inner">
                                                @php $chunkedTestimonis = $testimoni->chunk(3); @endphp
                                                @foreach ($chunkedTestimonis as $key => $chunk)
                                                    <div class="carousel-item{{ $key === 0 ? ' active' : '' }}">
                                                        <div class="row justify-content-center align-items-center">
                                                            @foreach ($chunk as $testimoni)
                                                                <div class="col-md-4 text-center mb-4">
                                                                    <div class="card">
                                                                        <div class="card-img-container">
                                                                            @if ($testimoni->photo)
                                                                                <img src="{{ asset('storage/app/public/photo/' . $testimoni->photo) }}"
                                                                                    class="card-img-top rounded-circle"
                                                                                    style="object-fit: cover; width: 130px; height: 130px;"
                                                                                    alt="{{ $testimoni->name }}">
                                                                            @else
                                                                                <img src="{{ asset('storage/app/public/nophoto/image.png') }}"
                                                                                    class="card-img-top rounded-circle"
                                                                                    style="object-fit: cover; width: 130px; height: 130px;"
                                                                                    alt="No Photo">
                                                                            @endif
                                                                        </div>
                                                                        <h5 class="card-title">{{ $testimoni->name }}</h5>
                                                                        <p class="card-text">{!! $testimoni->description !!}</p>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselTestimoniControls" data-bs-slide="prev"
                                                style="margin-top: calc((130px - 3rem) / 2);">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"
                                                    style="background-color: #333; border-radius: 50%; padding: 1rem;"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselTestimoniControls" data-bs-slide="next"
                                                style="margin-top: calc((130px - 3rem) / 2);">
                                                <span class="carousel-control-next-icon" aria-hidden="true"
                                                    style="background-color: #333; border-radius: 50%; padding: 1rem;"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                    @else
                                        <p>Tidak ada testimoni yang tersedia.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
                <section id="mitra-kampus" class="container p-5">
                    <h1 class="text-center fw-bold">Kemitraan</h1>
                    <div class="d-flex justify-content-center mb-4">
                        <div id="underline-line-mitra" class="bg-primary"></div>
                    </div>

                    <div id="carouselKemitraanControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($kemitraan->chunk(5) as $key => $chunk)
                                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                    <div class="d-flex justify-content-center">
                                        @foreach ($chunk as $item)
                                            <div class="mx-2">
                                                <img src="{{ asset('logokemitraan/' . $item->logo) }}"
                                                    alt="{{ $item->name }}" class="img-fluid"
                                                    style="width: 100px; height: 100px; object-fit: cover;">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselKemitraanControls"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"
                                style="background-color: black; border-radius: 50%; padding: 1rem;"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselKemitraanControls"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"
                                style="background-color: black; border-radius: 50%; padding: 1rem;"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </section>
            </div>
            <div class="col-lg-3" style="position:sticky; top:0; right:0; height:100vh; overflow-y:auto;">
                <div class="sidebar">
                    <section class="py-5">
                        <div class="container my-5">
                            <div class="row gx-5 justify-content-center">
                                <div class="col-lg-8 col-xl-6">
                                    <div class="text-center">
                                        <h3 class="fw-bolder">Pengumuman</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row gx-5">
                                <div class="col-md-12">
                                    <div class="row pb-3">
                                        @foreach ($announcement as $item)
                                            <div class="row mb-4">
                                                <div class="col-5 col-sm-4 col-md-3 align-self-center">
                                                    <img src="{{ asset('storage/app/public/photo/' . $item->photo) }}"
                                                        alt="{{ $item->title }}" class="img-fluid" />
                                                </div>
                                                <div class="col-7 col-sm-8 col-md-9 paddding">
                                                    <div class="card-title mb-2">{{ $item->title }}</div>
                                                    <div class="most_fh5co_treding_font_123">
                                                        {{ $item->created_at->format('F d, Y') }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <a class="btn btn-primary btn-lg" href="{{ route('Announcement.index') }}">Lihat
                                            Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="py-2" style="margin-top: -3rem">
                        <div class="container my-5">
                            <div class="row gx-5 justify-content-center">
                                <div class="col-lg-8 col-xl-6">
                                    <div class="text-center">
                                        <h3 class="fw-bolder">Program</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row gx-5">
                                <div class="col-md-12">
                                    <div class="row pb-3">
                                            @foreach ($program as $index => $item)
                                                <div class="card-title mb-2">
                                                   {{ $index + 1}}. {{ $item->program_title }}
                                                </div>
                                            @endforeach
                                        <a class="btn btn-primary btn-lg" href="{{ route('Program.index') }}">Lihat
                                            Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var totalImages = {{ $kemitraan->count() }};
            if (totalImages >= 5) {
                new Splide('.splide', {
                    type: 'loop',
                    perPage: 5,
                    perMove: 1,
                    autoplay: true,
                    interval: 3000,
                    breakpoints: {
                        1200: {
                            perPage: 4,
                        },
                        992: {
                            perPage: 3,
                        },
                        768: {
                            perPage: 2,
                        },
                        576: {
                            perPage: 1,
                        },
                    },
                }).mount();
            }
        });
    </script>

@endsection
