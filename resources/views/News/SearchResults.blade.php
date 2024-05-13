@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>Search Results</h1>
        <p>Showing results for query: "{{ $query }}"</p>

        <div class="row pb-4">
            <?php
                // Mendapatkan daftar berita populer secara acak
                $randomNews = \App\Models\News::inRandomOrder()->limit(2)->get();
            ?>
            @foreach ($randomNews as $berita)
                <a href="{{ route('news.show', ['id_news' => $berita->id_news]) }}">
                    <div class="most_fh5co_treding_font">{{ $berita->title }}</div>
                </a>
                <div class="col-md-5">
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_news_img">
                            <img src="{{ asset('storage/app/public/photo/' . $berita->photo) }}" alt="{{ $berita->title }}"/>
                        </div>
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
@endsection
