@extends("layouts.layout")
@section("title", "About")
@section("content")
<!-- About section one-->
<section class="py-5 bg-light" id="scroll-target">
    <div class="container px-5 my-5">
        <div class="row gx-5 align-items-center">
            @if($dataYayasan)
            <div class="col-lg-6 text-center"><img src="{{ asset ('assets/img/logo.png') }}" style="width: 400px; height: auto;" /></div>
            <div class="col-lg-6">
                <h2 class="fw-bolder text-center">{{ $dataYayasan->nama_yayasan }}</h2>
                <p class="lead fw-normal text-muted text-center mb-0">{{ $dataYayasan->sejarah }}</p>
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
                @if($dataYayasan)
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
<div class="card" style="width: 18rem;">
    @if ($stafpegawai->photo)
                        <img src="{{ asset('storage/app/public/photo/' . $stafpegawai->photo) }}"
                            alt="Foto Berita" style="max-width: 200px; margin-top: 10px;">
                    @else
                        <p>Tidak ada foto tersedia.</p>
                    @endif
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>
@endsection
