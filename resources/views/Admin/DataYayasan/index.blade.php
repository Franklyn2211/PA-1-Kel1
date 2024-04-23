@extends('Admin.main')
@section('title', 'Data Yayasan')
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
                    <form action="{{ route('updateDataYayasan') }}" method="post" enctype='multipart/form-data'>
                        @csrf
                        <div class="mb-3">
                            <label for="nama_yayasan" class="form-label">Nama Yayasan</label>
                            <input type="text" class="form-control" id="nama_yayasan" name="nama_yayasan" value="{{ $dataYayasan ? $dataYayasan->nama_yayasan : '' }}" required>
                            @error("nama_yayasan")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="singkatan_nama_yayasan" class="form-label">Singkatan Nama Yayasan</label>
                            <input type="text" class="form-control" id="singkatan_nama_yayasan" name="singkatan_nama_yayasan" value="{{ $dataYayasan ? $dataYayasan->singkatan_nama_yayasan : '' }}" required>
                            @error("singkatan_nama_yayasan")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="sejarah" class="form-label">Sejarah</label>
                            <textarea class="form-control" id="sejarah" name="sejarah" rows="4">{{ $dataYayasan ? $dataYayasan->sejarah : '' }}</textarea>
                            @error("sejarah")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="visi" class="form-label">Visi</label>
                            <textarea class="form-control" id="visi" name="visi" rows="4">{{ $dataYayasan ? $dataYayasan->visi : '' }}</textarea>
                            @error("visi")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="misi" class="form-label">Misi</label>
                            <textarea class="form-control" id="misi" name="misi" rows="4">{{ $dataYayasan ? $dataYayasan->misi : '' }}</textarea>
                            @error("misi")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="input_logo_yayasan" class="form-label">Logo Yayasan</label>
                            <div class="p-3 border mb-2 border-1 w-100 d-flex justify-content-center">
                                @if ($dataYayasan && $dataYayasan->logo_yayasan)
                                    <img src="{{ asset($dataYayasan->logo_yayasan) }}" alt="logo yayasan" style="max-width: 400px; max-height: 300px;">
                                @else
                                    <p>No logo available.</p>
                                @endif
                            </div>
                            <input type="file" class="form-control" id="input_logo_yayasan" name="input_logo_yayasan">
                            @error("input_logo_yayasan")
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
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#sejarah'))
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#visi'))
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#misi'))
        .catch(error => {
            console.error(error);
        });
</script>

@if (session('alert-type') === 'success')
<script>
    Swal.fire({
        icon: 'success',
        title: '{{ session('message') }}',
        showConfirmButton: true,
        timer: 2000
    });
</script>
@endif
@endpush
