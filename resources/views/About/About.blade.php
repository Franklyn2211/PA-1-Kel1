@extends('layouts.layout')
@section('title', 'About')
@section('content')
    <!-- About section one-->
    <section class="py-5 bg-light" id="scroll-target">
        <div class="container px-5 my-5">
            <div class="row gx-5 align-items-center">
                @if ($dataYayasan)
                    <div class="col-lg-6 text-center"><img src="{{ asset('assets/img/logo.png') }}"
                            style="width: 400px; height: auto;" /></div>
                    <div class="col-lg-6">
                        <h2 class="fw-bolder text-center">{{ $dataYayasan->foundation_name }}</h2>
                        <p class="lead fw-normal text-muted text-center mb-0">{{ $dataYayasan->history }}</p>
                    </div>
                @else
                    <div class="col-lg-12 text-center">
                        <p class="lead fw-normal text-muted text-center mb-0">Data yayasan tidak tersedia.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- About section two-->
    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5 align-items-center">
                <div class="text-center">
                    <h2 class="fw-bolder text-center">VISI</h2>
                    @if ($dataYayasan)
                        <p class="lead fw-normal text-muted text-center mb-4">{{ $dataYayasan->visi }}</p>
                        <h2 class="fw-bolder text-center">MISI</h2>
                        <p class="lead fw-normal text-muted text-center mb-0">{{ $dataYayasan->misi }}</p>
                    @else
                        <p class="lead fw-normal text-muted text-center mb-4">Visi dan misi tidak tersedia.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="py-5" >
        <h2 class="fw-bolder text-center">Kepengurusan YPA Rumah Damai</h2>
        <div class="container px-5 my-5" style="background-color: #142f62; border-radius: 10px; padding: 30px" >
            <div class="row gx-5 align-items-center">
                @if ($stafpegawai->count() > 0)
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                        <div class="carousel-inner">
                            @php $chunkedStafs = $stafpegawai->chunk(3); @endphp
                            @foreach ($chunkedStafs as $key => $chunk)
                                <div class="carousel-item{{ $key === 0 ? ' active' : '' }}">
                                    <div class="row">
                                        @foreach ($chunk as $staf)
                                            <div class="col-lg-4 text-center">
                                                <h2 class="fw-normal">{{ $staf->job_title }}</h2>
                                                @if ($staf->photo)
                                                    <img src="{{ asset('storage/app/public/photo/' . $staf->photo) }}"
                                                        class="bd-placeholder-img rounded-circle" style="object-fit: cover; width: 150px; height: 150px;">
                                                @else
                                                    <img src="{{ asset('storage/app/public/nophoto/image.png') }}"
                                                        class="bd-placeholder-img rounded-circle" style="object-fit: cover; width: 150px; height: 150px;">
                                                @endif
                                                <p>{{ $staf->name }}</p>
                                                <p><a class="btn btn-secondary" href="#">View details »</a></p>
                                            </div>
                                        @endforeach
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
                    <p>Tidak ada staf yang tersedia.</p>
                @endif
            </div>
        </div>
    </section>

@endsection
