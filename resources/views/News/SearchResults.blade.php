@extends('layouts.layout')

@section('content')
    <div class="container">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4"></div>
        </div>
        <h2>Search Results For "{{ $query }}"</h2>
        <div class="row pb-6">
            @if($searchResults->isEmpty())
                <div class="col-12">
                    <p>No results found.</p>
                </div>
            @else
                @foreach ($searchResults as $berita)
                    <div class="col-md-5 mb-2">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img">
                                <img src="{{ asset('storage/app/public/photo/' . $berita->photo) }}" alt="{{ $berita->title }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 animate-box">
                        <a href="{{ route('news.show', ['id_news' => $berita->id_news]) }}" class="fh5co_magna py-2">{{ $berita->title }}</a>
                        <div><a href="{{ route('news.show', ['id_news' => $berita->id_news]) }}" class="fh5co_mini_time py-3"> {{ $berita->created_by }} - {{ $berita->date }} </a></div>
                        <div class="fh5co_consectetur">
                            <?php
                                $description = strip_tags($berita->description); // Menghapus tag HTML dari deskripsi
                                $trimmedDescription = Str::limit($description, 200); // Batasi deskripsi hanya 200 karakter
                                $cleanDescription = ltrim($trimmedDescription); // Menghapus spasi di awal teks
                                echo nl2br(e($cleanDescription));
                            ?>
                            @if (strlen($description) > 200)
                                <span class="fh5co_more"><a href="{{ route('news.show', ['id_news' => $berita->id_news]) }}">...</a></span> {{-- Tambahkan link untuk melihat lebih banyak jika deskripsi dipotong --}}
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="d-flex justify-content-end mt-3">
            {{ $searchResults->links('pagination::simple-bootstrap-5') }}
        </div>
    </div>
@endsection
