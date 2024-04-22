@extends("layouts.layout")
@section("title", "News Detail")

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="news-detail text-center">
                    <img src="{{ asset('storage/app/public/photo/' . $news->photo) }}" alt="{{ $news->title }}" class="img-fluid ">
                    <h2>{{ $news->title }}</h2>
                    <p>{{ $news->description }}</p>
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
