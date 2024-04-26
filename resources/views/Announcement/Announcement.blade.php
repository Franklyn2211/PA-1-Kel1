@extends('layouts.layout')

@section('title', 'Pengumuman')

@section('content')
<div class="container py-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($announcements as $announcement)
        <div class="col">
            <div class="card h-100 text-center">
                <img src="{{ asset('storage/app/public/photo/' . $announcement->photo) }}" class="card-img-top mx-auto mt-3" style="width: 200px; height: 200px; object-fit: cover;" alt="{{ $announcement->title }}">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h5 class="card-title text-center text-dark mb-4">{{ $announcement->title }}</h5>
                    <button type="button" class="btn btn-primary btn-detail" data-bs-toggle="modal" data-bs-target="#announcementModal{{ $announcement->id_announcements }}">
                        Lihat Detail
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Modals -->
@foreach ($announcements as $announcement)
<div class="modal fade" id="announcementModal{{ $announcement->id_announcements }}" tabindex="-1" aria-labelledby="announcementModalLabel{{ $announcement->id_announcements }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center text-dark w-100" id="announcementModalLabel{{ $announcement->id_announcements }}">{{ $announcement->title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <img src="{{ asset('storage/app/public/photo/' . $announcement->photo) }}" class="img-fluid rounded mb-3" alt="{{ $announcement->title }}">
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
