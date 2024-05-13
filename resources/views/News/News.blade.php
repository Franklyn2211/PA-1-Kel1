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
                                <div class="fh5co_news_img">
                                    <img src="{{ asset('storage/app/public/photo/' . $berita->photo) }}" alt="{{ $berita->title }}"/>
                                </div>
                                <div></div>
                            </div>
                        </div>
                        <div class="col-md-7 animate-box">
                            <a href="{{ route('news.show', ['id_news' => $berita->id_news]) }}" class="fh5co_magna py-2">{{ $berita->title }}</a>
                            <a href="{{ route('news.show', ['id_news' => $berita->id_news]) }}" class="fh5co_mini_time py-3"> {{ $berita->created_by }} - {{ $berita->date }} </a>
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
                    @foreach ($newscategories as $category)
                        <a href="#" class="fh5co_tagg">{{ $berita->category->name }}</a>
                    @endforeach
                </div>
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Most Popular</div>
                </div>
                <div class="row pb-3">
                    @foreach ($popularNews as $berita)
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
        <div class="d-flex justify-content-end mt-3">
            {{ $news->links('pagination::simple-bootstrap-5') }}
        </div>
        </div>
    </div>
</div>
@endsection
