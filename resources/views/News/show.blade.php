@extends("layouts.layout")
@section("title", "News Detail")

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 offset-md-4">
                <div class="news-detail text-center">
                    <img src="{{ asset('storage/app/public/photo/' . $news->photo) }}" alt="{{ $news->title }}" class="img-fluid ">
                </div>
                <div class="col-md-4">
                    <h2>{{ $news->title }}</h2>
                    <p class="text-break">{{ $news->description }}</p>
                    <p>{{ $news->tanggal }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Sidebar content here -->
            </div>
        </div>
    </div>
</section>
@endsection
