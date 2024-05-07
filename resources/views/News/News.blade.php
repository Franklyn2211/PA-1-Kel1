@extends("layouts.layout")
@section("title", "News")

@section('content')

<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
                </div>
                <div class="row pb-4">
                    @foreach ($news as $berita)
    <div class="col-md-5">
        <div class="fh5co_hover_news_img">
            <div class="fh5co_news_img"><img src="{{ asset('storage/app/public/photo/' . $berita->photo) }}" alt="{{ $berita->title }}"/></div>
            <div></div>
        </div>
    </div>
    <div class="col-md-7 animate-box">
        <a href="{{ route('news.show', ['id_news' => $berita->id_news]) }}" class="fh5co_magna py-2">{{ $berita->title }}</a> <a href="{{ route('news.show', ['id_news' => $berita->id_news]) }}" class="fh5co_mini_time py-3"> {{ $berita->create_by }} - {{ $berita->date }} </a>
        <div class="fh5co_consectetur">
            {{-- Batasi deskripsi hanya 4 baris --}}
            <?php
                $description = strip_tags($berita->description); // Menghapus tag HTML dari deskripsi
                $trimmedDescription = Str::limit($description, 200); // Batasi deskripsi hanya 200 karakter
                $cleanDescription = ltrim($trimmedDescription); // Menghapus spasi di awal teks
                echo nl2br(e($cleanDescription));
            ?>
            @if (strlen($description) > 200)
                <span class="fh5co_more"><a href="#">...</a></span> {{-- Tambahkan link untuk melihat lebih banyak jika deskripsi dipotong --}}
            @endif
        </div>
    </div>
@endforeach


                </div>
            </div>
            <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Kategori</div>
                </div>
                <div class="clearfix"></div>
                <div class="fh5co_tags_all">
                    <a href="#" class="fh5co_tagg">{{ $berita->category->name }}</a>
                </div>
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Most Popular</div>
                </div>
                <div class="row pb-3">
                    <?php
                        // Acak urutan berita populer
                        $randomNews = $news->shuffle();
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
        <div class="row mx-0 animate-box" data-animate-effect="fadeInUp">
            <div class="col-12 text-center pb-4 pt-4">
                <a href="#" class="btn_mange_pagging"><i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp; Previous</a>
                <a href="#" class="btn_pagging">1</a>
                <a href="#" class="btn_pagging">2</a>
                <a href="#" class="btn_pagging">3</a>
                <a href="#" class="btn_pagging">...</a>
                <a href="#" class="btn_mange_pagging">Next <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp; </a>
             </div>
        </div>
    </div>
</div>
@endsection
