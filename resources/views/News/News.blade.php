@extends("layouts.layout")
@section("title", "News")

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @foreach($news as $berita)
                <div class="news-card">
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/app/public/photo/' . $berita->photo) }}" alt="{{ $berita->title }}" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <h5>{{ $berita->title }}</h5>
                            <!-- Tampilkan hanya sebagian deskripsi -->
                            <p>{{ Str::limit($berita->description, 100) }}</p>
                            <a href="{{ route('news.show',  ['id_news' => $berita->id_news]) }}" class="btn btn-primary">See More</a>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="d-flex justify-content-center">
                    {{ $news->links('pagination::simple-bootstrap-5') }}
                </div>

                <ul class="slider-nav">
                    <!-- You can add slider navigation here if needed -->
                </ul>
            </div>
            <div class="col-md-4">
                <!-- Sidebar content here -->
            </div>
        </div>
    </div>
</section>
@endsection
