@extends('layouts.layout')

@section('title', 'Pengumuman Kategori: ' . $category->name)

@section('content')
<div class="container-fluid blog py-5">
    <div class="container py-5">
        <h2 class="text-center mb-5">Pengumuman Kategori: {{ $category->name }}</h2>
        <div class="row g-4 justify-content-center">
            @foreach ($announcements as $announcement)
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="blog-item rounded">
                    <div class="blog-img">
                        <img src="{{ asset('storage/app/public/photo/' . $announcement->photo) }}" class="img-fluid w-100" alt="Image">
                    </div>
                    <div class="blog-centent p-4">
                        <div class="d-flex justify-content-between mb-4">
                            <p class="mb-0 text-muted"><i class="fa fa-calendar-alt text-primary"></i> {{ $announcement->location }}</p>
                            <a href="{{ route('announcements.category', $announcement->category->id_announcement_categories) }}" class="text-muted">
                                <span class="fa fa-search text-primary"></span> {{ $announcement->category->name }}
                            </a>
                        </div>
                        <a href="#" class="h4">{{ $announcement->title }}</a>
                        <p class="my-4"></p>
                        <div class="text-center">
                            <a href="#" class="btn btn-primary rounded-pill text-white py-2 px-4 mb-1" data-bs-toggle="modal" data-bs-target="#announcementModal{{ $announcement->id_announcements }}">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination links -->
        <div class="d-flex justify-content-center mt-4">
            {{ $announcements->links('pagination::simple-bootstrap-5') }}
        </div>
    </div>
</div>

@foreach ($announcements as $announcement)
<div class="modal fade" id="announcementModal{{ $announcement->id_announcements }}" tabindex="-1" aria-labelledby="announcementModalLabel{{ $announcement->id_announcements }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center text-dark w-100" id="announcementModalLabel{{ $announcement->id_announcements }}">{{ $announcement->title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <img src="{{ asset('storage/app/public/photo/' . $announcement->photo) }}" class="img-fluid rounded mb-3" alt="{{ $announcement->title }}" style="max-width: 100%; width: 75%; margin: 0 auto;">
                </div>
                <p class="text-center"><strong>Lokasi:</strong> {{ $announcement->location }}</p>
                <p class="text-center"><strong>Deskripsi:</strong></p>
                <div class="modal-description">
                    <p class="text-center overflow-auto" style="max-height: 300px;">{!! $announcement->description !!}</p>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const detailButtons = document.querySelectorAll('.btn-detail');
        detailButtons.forEach(button => {
            button.addEventListener('click', () => {
                const targetModalId = button.getAttribute('data-bs-target');
                const modal = new bootstrap.Modal(document.querySelector(targetModalId));
                modal.show();
            });
        });
    });
</script>
@endsection
