@extends("layouts.layout")
@section("title", "News Detail")
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
@endsection
@section('content')

<!-- Modal Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="input-group w-75 mx-auto d-flex">
                    <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Search End -->


<!-- Single Product Start -->
<div class="container-fluid py-12">
    <div class="container py-5">
        <ol class="breadcrumb justify-content-start mb-4">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">News</a></li>
            <li class="breadcrumb-item active text-dark">{{ $news->date}}</li>
        </ol>
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="mb-4">
                    <a href="#" class="h1 display-5">{{ $news->title }}</a>
                </div>
                <div class="position-relative rounded overflow-hidden mb-3">
                    <img src="{{ asset('storage/app/public/photo/' . $news->photo) }}" class="img-zoomin img-fluid rounded w-100" alt="">
                    <div class="position-absolute text-white px-4 py-2 bg-primary rounded" style="top: 20px; right: 20px;">                                              
                        {{!! $news->category->name!!}}
                    </div>
                </div>
                {{-- <div class="d-flex justify-content-between">
                    <a href="#" class="text-dark link-hover me-3"><i class="fa fa-clock"></i> 06 minute read</a>
                    <a href="#" class="text-dark link-hover me-3"><i class="fa fa-eye"></i> 3.5k Views</a>
                    <a href="#" class="text-dark link-hover me-3"><i class="fa fa-comment-dots"></i> 05 Comment</a>
                    <a href="#" class="text-dark link-hover"><i class="fa fa-arrow-up"></i> 1.5k Share</a>
                </div> --}}
                <p class="my-4">{!! $news->description !!}</p>
                
                <div class="tab-class">
                    <div class="d-flex justify-content-between border-bottom mb-4">
                        <ul class="nav nav-pills d-inline-flex text-center">
                            <li class="nav-item mb-3">
                                <h5 class="mt-2 me-3 mb-0">Tags:</h5>
                            </li>
                            <li class="nav-item mb-3">
                                <a class="d-flex py-2 bg-light rounded-pill active me-2" data-bs-toggle="pill" href="#tab-1">
                                    <span class="text-dark" style="width: 100px;">{{ $news->category->name}}</span>
                                </a>
                            </li>
                        </ul>
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 me-3">Share:</h5>
                            <i class="fab fa-facebook-f link-hover btn btn-square rounded-circle border-primary text-dark me-2"></i>
                            <i class="btn fab bi-twitter link-hover btn btn-square rounded-circle border-primary text-dark me-2"></i>
                            <i class="btn fab fa-instagram link-hover btn btn-square rounded-circle border-primary text-dark me-2"></i>
                            <i class="btn fab fa-linkedin-in link-hover btn btn-square rounded-circle border-primary text-dark"></i>
                        </div>
                    </div>
                <div class="bg-light rounded my-4 p-4">
                    <h4 class="mb-4">You Might Also Like</h4>
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center p-3 bg-white rounded">
                                <img src="img/chatGPT.jpg" class="img-fluid rounded" alt="">
                                <div class="ms-3">
                                    <a href="#" class="h5 mb-2">Lorem Ipsum is simply dummy text of the printing</a>
                                    <p class="text-dark mt-3 mb-0 me-3"><i class="fa fa-clock"></i> 06 minute read</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center p-3 bg-white rounded">
                                <img src="img/chatGPT-1.jpg" class="img-fluid rounded" alt="">
                                <div class="ms-3">
                                    <a href="#" class="h5 mb-2">Lorem Ipsum is simply dummy text of the printing</a>
                                    <p class="text-dark mt-3 mb-0 me-3"><i class="fa fa-clock"></i> 06 minute read</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-light rounded p-4">
                    <h4 class="mb-4">Comments</h4>
                    <div class="p-4 bg-white rounded mb-4">
                        <div class="row g-4">
                            <div class="col-3">
                                <img src="img/footer-4.jpg" class="img-fluid rounded-circle w-100" alt="">
                            </div>
                            <div class="col-9">
                                <div class="d-flex justify-content-between">
                                    <h5>James Boreego</h5>
                                    <a href="#" class="link-hover text-body fs-6"><i class="fas fa-long-arrow-alt-right me-1"></i> Reply</a>
                                </div>
                                <small class="text-body d-block mb-3"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum has been the industry's standard dummy type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 bg-white rounded mb-0">
                        <div class="row g-4">
                            <div class="col-3">
                                <img src="img/footer-4.jpg" class="img-fluid rounded-circle w-100" alt="">
                            </div>
                            <div class="col-9">
                                <div class="d-flex justify-content-between">
                                    <h5>James Boreego</h5>
                                    <a href="#" class="link-hover text-body fs-6"><i class="fas fa-long-arrow-alt-right me-1"></i> Reply</a>
                                </div>
                                <small class="text-body d-block mb-3"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum has been the industry's standard dummy type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-light rounded p-4 my-4">
                    <h4 class="mb-4">Leave A Comment</h4>
                    <form action="#">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <input type="text" class="form-control py-3" placeholder="Full Name">
                            </div>
                            <div class="col-lg-6">
                                <input type="email" class="form-control py-3" placeholder="Email Address">
                            </div>
                            <div class="col-12">
                                <textarea class="form-control" name="textarea" id="" cols="30" rows="7" placeholder="Write Your Comment Here"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="form-control btn btn-primary py-3" type="button">Submit Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- Sidebar Start -->
                <div class="row g-4">
                    <div class="col-12">
                        <!-- Search Form -->
                        <div class="p-3 rounded border bg-light mb-4">
                            <h4 class="mb-3">Search</h4>
                            <form action="#">
                                <div class="input-group">
                                    <input type="search" class="form-control" placeholder="Search..." aria-label="Search" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-primary" type="button" id="button-addon2">Search</button>
                                </div>
                            </form>
                        </div>
                        <!-- Popular Categories -->
                        <div class="p-3 rounded border bg-light mb-4">
                            <h4 class="mb-3">Popular Categories</h4>
                            <ul class="list-unstyled">
                                {{-- @foreach($popularCategories as $category)
                                <li><a href="#">{{ $category->name }}</a></li> --}}
                                {{-- @endforeach --}}
                            </ul>
                        </div>
                        <!-- Popular News -->
                        <div class="p-3 rounded border bg-light mb-4">
                            <h4 class="mb-3">Popular News</h4>
                            <div class="list-group">
                                {{-- @foreach($popularNews as $newsItem)
                                <a href="#" class="list-group-item list-group-item-action">{{ $newsItem->title }}</a>
                                @endforeach --}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </div>
</div>
<!-- Single Product End -->


@endsection

