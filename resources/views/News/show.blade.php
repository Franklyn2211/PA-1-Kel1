@extends("layouts.layout")
@section("title", "News Detail")
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
@endsection

@section('content')

<!-- Modal Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="input-group w-75 mx-auto d-flex">
                    <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Search End -->


<!-- Single Product Start -->
<div class="container-fluid py-12">
    <div class="container py-5">
        <ol class="breadcrumb justify-content-start mb-4">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">News</a></li>
            <li class="breadcrumb-item active text-dark">{{ $news->date}}</li>
        </ol>
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="mb-4">
                    <a href="#" class="h1 display-5">{{ $news->title }}</a>
                </div>
                <div class="position-relative rounded overflow-hidden mb-3">
                    <img src="{{ asset('storage/app/public/photo/' . $news->photo) }}" class="img-zoomin img-fluid rounded w-100" alt="">
                    <div class="position-absolute text-white px-4 py-2 bg-primary rounded" style="top: 20px; right: 20px;">                                              
                        {{ $news->category->name }}
                    </div>
                </div>
                <p class="my-4">{!! $news->description !!}</p>
                
                <div class="tab-class">
                    <div class="d-flex justify-content-between border-bottom mb-4">
                        <ul class="nav nav-pills d-inline-flex text-center">
                            <li class="nav-item mb-3">
                                <h5 class="mt-2 me-3 mb-0">Tags:</h5>
                            </li>
                            <li class="nav-item mb-3">
                                <a class="d-flex py-2 bg-light rounded-pill active me-2" data-bs-toggle="pill" href="#tab-1">
                                    <span class="text-dark" style="width: 100px;">{{ $news->category->name }}</span>
                                </a>
                            </li>
                        </ul>
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 me-3">Share:</h5>
                            <!-- Facebook -->
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url()) }}" target="_blank" class="fab fa-facebook-f link-hover btn btn-square rounded-circle border-primary text-dark me-2"></a>
                            <!-- Twitter -->
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::url()) }}" target="_blank" class="fab fa-twitter link-hover btn btn-square rounded-circle border-primary text-dark me-2"></a>
                            <!-- Instagram (Tidak mendukung sharing langsung, link ke profil saja) -->
                            <a href="https://www.instagram.com/" target="_blank" class="fab fa-instagram link-hover btn btn-square rounded-circle border-primary text-dark me-2"></a>
                            <!-- LinkedIn -->
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(Request::url()) }}" target="_blank" class="fab fa-linkedin-in link-hover btn btn-square rounded-circle border-primary text-dark me-2"></a>
                            <!-- WhatsApp -->
                            <a href="https://api.whatsapp.com/send?text={{ urlencode(Request::url()) }}" target="_blank" class="fab fa-whatsapp link-hover btn btn-square rounded-circle border-primary text-dark"></a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                <div class="p-3 rounded border bg-light mb-4">
                    <form action="{{ route('news.search') }}" method="GET">
                        <div class="input-group">
                            <input type="search" name="query" class="form-control" placeholder="Search..." aria-label="Search" aria-describedby="button-addon2">
                            <button class="btn btn-outline-primary" type="submit" id="button-addon2">Search</button>
                        </div>
                    </form>
                </div>
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Kategori</div>
                </div>
                <div class="clearfix"></div>
                <div class="fh5co_tags_all">
                    <a href="#" class="fh5co_tagg">{{ $news->category->name }}</a>
                </div>
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Most Popular</div>
                </div>
                <div class="row pb-3">
                    <?php
                        // Mendapatkan daftar berita populer secara acak
                        $randomNews = \App\Models\News::inRandomOrder()->limit(2)->get();
                    ?>
                    @foreach ($randomNews as $berita)
                        <div class="col-5 align-self-center">
                            <a href="{{ route('news.show', ['id_news' => $berita->id_news]) }}"> <!-- Tautan di sekitar gambar -->
                                <img src="{{ asset('storage/app/public/photo/' . $berita->photo) }}" alt="{{ $berita->title }}" class="fh5co_most_trading"/>
                            </a>
                        </div>
                        <div class="col-7 paddding">
                            <a href="{{ route('news.show', ['id_news' => $berita->id_news]) }}"> <!-- Tautan di sekitar judul -->
                                <div class="most_fh5co_treding_font">{{ $berita->title }}</div>
                            </a>
                            <div class="most_fh5co_treding_font_123">{{ $berita->created_at->format('F d, Y') }}</div>
                        </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- Single Product End -->

@endsection
