@extends("layouts.layout")
@section("title", "News Detail")

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 text-center">
                <div class="news-detail">
                    <img src="{{ asset('storage/app/public/photo/' . $news->photo) }}" alt="{{ $news->title }}" class="img-fluid ">
                </div>
            </div>
            <div class="text-center mt-4">
                <h2>{{ $news->title }}</h2>
                <p class="text-break">{!! $news->description !!}</p>
                <p>{{ $news->date }}</p>
            </div>
        </div>
    </div>
</section>
@endsection
