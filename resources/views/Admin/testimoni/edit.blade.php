@extends('Admin.main')
@section('title', 'Edit Testimoni')
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
                                <form action="{{ route('admin.testimoni.update', $testimoni->id_testimonies) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ $testimoni->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Jenis Kelamin:</label>
                                        <select id="gender" name="gender" class="form-control">
                                            <option value="Laki-Laki" {{ $testimoni->gender == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                            <option value="Perempuan" {{ $testimoni->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="description">Deskripsi</label>
                                        <textarea name="description" id="summernote">{!! $testimoni->description !!}</textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="photo">Foto</label>
                                        <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
                                        @error('photo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="p-3 border mb-2 border-1 w-100 d-flex justify-content-center">
                                            @if ($testimoni->photo)
                                                <img src="{{ asset('storage/app/public/photo/' . $testimoni->photo) }}"
                                                    alt="Foto Berita" style="max-width: 200px; margin-top: 10px;">
                                            @else
                                                <p>Tidak ada foto tersedia.</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group text-center"> <!-- Perubahan di sini -->
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
