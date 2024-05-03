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
                                <form action="{{ route('admin.stafpegawai.update', $stafpegawai->id_staff) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ $stafpegawai->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="age">Umur</label>
                                        <input type="number" name="age" id="age" class="form-control"
                                            value="{{ $stafpegawai->age }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="date_joined">Tanggal Bergabung</label>
                                        <input type="date" name="date_joined" id="date_joined"
                                            class="form-control" value="{{ $stafpegawai->date_joined }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jon_title">Jabatan</label>
                                        <select class="form-control" id="job_title" name="job_title" value="{{ $stafpegawai->job_title }}" required>
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
