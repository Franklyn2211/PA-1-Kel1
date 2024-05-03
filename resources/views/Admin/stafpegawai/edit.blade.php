@extends('Admin.main')
@section('title', 'Edit Staf Pegawai')
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
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.stafpegawai.update', $stafpegawai->id_stafpegawai) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" id="nama" class="form-control"
                                            value="{{ $stafpegawai->nama }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="umur">Umur</label>
                                        <input type="number" name="umur" id="umur" class="form-control"
                                            value="{{ $stafpegawai->umur }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_bergabung">Tanggal Bergabung</label>
                                        <input type="date" name="tanggal_bergabung" id="tanggal_bergabung"
                                            class="form-control" value="{{ $stafpegawai->tanggal_bergabung }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <select class="form-control" id="jabatan" name="jabatan" value="{{ $stafpegawai->jabatan }}" required>
                                            <option value="Ketua Yayasan">Ketua Yayasan</option>
                                            <option value="Pengajar">Pengajar</option>
                                            <option value="Staff">Staff</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="photo">Foto</label>
                                        <input type="file" class="form-control" id="photo" name="photo">
                                        <div class="p-3 border mb-2 border-1 w-100 d-flex justify-content-center">
                                            @if ($stafpegawai->photo)
                                                <img src="{{ asset('storage/app/public/photo/' . $stafpegawai->photo) }}"
                                                    alt="Foto Berita" style="max-width: 200px; margin-top: 10px;">
                                            @else
                                                <p>Tidak ada foto tersedia.</p>
                                            @endif
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
