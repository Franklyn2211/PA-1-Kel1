@extends('Admin.main')
@section('title', 'Detail Staf Pegawai')
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

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail Staf Pegawai</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    @if ($stafpegawai->photo)
                        <img src="{{ asset('storage/app/public/photo/' . $stafpegawai->photo) }}"
                            alt="Foto Berita" style="max-width: 200px; margin-top: 10px;">
                    @else
                        <p>Tidak ada foto tersedia.</p>
                    @endif
                </div>
                <div class="col-md-9">
                    <p><strong>Nama:</strong> {{ $stafpegawai->nama }}</p>
                    <p><strong>Umur:</strong> {{ $stafpegawai->umur }}</p>
                    <p><strong>Tanggal Bergabung:</strong> {{ $stafpegawai->tanggal_bergabung }}</p>
                    <p><strong>Jabatan:</strong> {{ $stafpegawai->jabatan }}</p>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
