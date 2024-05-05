@extends('layouts.layout')
@section('title', 'About')
@section('content')
    <!-- About section one-->
    <section class="py-5" id="scroll-target">
        <div class="container px-5 my-5">
            <div class="row gx-5 align-items-center">
                @if ($dataYayasan)
                    <div class="col-lg-6 text-center"><img src="{{ asset('assets/img/logo.png') }}"
                            style="width: 340px; height: auto;" /></div>
                    <div class="col-lg-6">
                        <h2 class="fw-bolder text-center">{{ $dataYayasan->foundation_name }}</h2>
                        <p class="lead fw-normal text-muted text-center mb-0">{!! $dataYayasan->history !!}</p>
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
                        <p class="lead fw-normal text-muted text-center mb-4">{!! $dataYayasan->visi !!}</p>
                        <h2 class="fw-bolder text-center">MISI</h2>
                        <p class="lead fw-normal text-muted text-center mb-0">{!! $dataYayasan->misi !!}</p>
                    @else
                        <p class="lead fw-normal text-muted text-center mb-4">Visi dan misi tidak tersedia.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <h2 class="fw-bolder text-center">Kepengurusan YPA Rumah Damai</h2>
        <div class="container px-5 my-5 bg-blue" style="border-radius: 10px; padding: 30px">
            <div class="row gx-5 align-items-center">
                @if ($stafpegawai->count() > 0)
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel"
                        data-bs-interval="5000">
                        <div class="carousel-inner">
                            @php $chunkedStafs = $stafpegawai->chunk(3); @endphp
                            @foreach ($chunkedStafs as $key => $chunk)
                                <div class="carousel-item{{ $key === 0 ? ' active' : '' }}">
                                    <div class="row">
                                        @foreach ($chunk as $staf)
                                            <div class="col-lg-4 text-center">
                                                <h5 class="bg-blue">{{ $staf->job_title }}</h5>
                                                @if ($staf->photo)
                                                    <img src="{{ asset('storage/app/public/photo/' . $staf->photo) }}"
                                                        class="bd-placeholder-img rounded-circle"
                                                        style="object-fit: cover; width: 150px; height: 150px;">
                                                @else
                                                    <img src="{{ asset('storage/app/public/nophoto/image.png') }}"
                                                        class="bd-placeholder-img rounded-circle"
                                                        style="object-fit: cover; width: 150px; height: 150px;">
                                                @endif
                                                <p>{{ $staf->name }}</p>
                                                <button type="button" class="btn btn-primary btn-detail"
                                                    data-bs-toggle="modal" data-bs-target="#stafModal{{ $staf->id_staff }}">
                                                    Lihat Detail
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
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
    @foreach ($stafpegawai as $staf)
        <div class="modal fade" id="stafModal{{ $staf->id_staff }}" tabindex="-1"
            aria-labelledby="stafModalLabel{{ $staf->id_staff }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center text-dark w-100" id="stafModalLabel{{ $staf->id_staff }}">
                            {{ $staf->job_title }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <img src="{{ asset('storage/app/public/photo/' . $staf->photo) }}"
                                class="img-fluid modal-image" alt="{{ $staf->title }}" style="max-width: 100%; max-height: 300px;">
                        </div>
                        <p class="text-center"><strong>Nama : </strong> {{ $staf->name }}</p>
                        <p class="text-center"><strong>Tanggal Bergabung : </strong>{{ $staf->date_joined }}</p>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const detailButtons = document.querySelectorAll('.btn-detail');
            detailButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const targetModalId = button.getAttribute('data-bs-target');
                    const modal = new bootstrap.Modal(document.querySelector(targetModalId));
                    modal.show();
                });
            });
        });
    </script>
@endsection
