@extends("layouts.layout")
@section("title", "About")
@section("content")
<!-- About section one-->
<section class="py-5 bg-light" id="scroll-target">
    <div class="container px-5 my-5">
        <div class="row gx-5 align-items-center">
            @if($dataYayasan)
            <div class="col-lg-6 text-center"><img class="img-fluid rounded mb-5 mb-lg-0" src="{{ $dataYayasan->logo_yayasan }}" /></div>
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
            <div class="col-lg-6 order-first order-lg-last text-center"><img class="img-fluid rounded mb-5 mb-lg-0" src="https://dummyimage.com/600x400/343a40/6c757d" alt="..." /></div>
            <div class="col-lg-6">
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
@endsection
