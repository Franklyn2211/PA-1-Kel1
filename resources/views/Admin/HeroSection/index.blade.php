@extends('Admin.main')
@section('title', 'Hero Section')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@yield('title')</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/Admin">Dashboard</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <div id="item-4" class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <span class="fs-5">@yield('title')</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('updateHeroSection') }}" method="post" enctype='multipart/form-data'>
                        @csrf
                        <div class="mb-3">
                            <label for="input_judul_header" class="form-label">Header Hero</label>
                            <input type="text" class="form-control" id="input_judul_header" name="input_judul_header" value="{{ $dataHeroSection ? $dataHeroSection->header : '' }}" required>
                            @error("input_judul_header")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="input_deskripsi_header" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="input_deskripsi_header" name="input_deskripsi_header" rows="4">{{ $dataHeroSection ? $dataHeroSection->paragraph : '' }}</textarea>
                            @error("input_deskripsi_header")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="input_bg_hero" class="form-label">Background Hero</label>
                            <div class="p-3 border mb-2 border-1 w-100 d-flex justify-content-center">
                                @if ($dataHeroSection && $dataHeroSection->bg_image)
                                    <img src="{{ asset($dataHeroSection->bg_image) }}" alt="bg image" style="width: 50%">
                                @else
                                    <p>No background image available.</p>
                                @endif
                            </div>
                            <input type="file" class="form-control" id="input_bg_hero" name="input_bg_hero">
                            @error("input_bg_hero")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#input_deskripsi_header').summernote({
            height: 100,
            maxHeight: 250,
        });
    });
</script>
@endpush
