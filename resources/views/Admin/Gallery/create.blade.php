@extends('Admin.main')
@section('title', 'Tambah Galeri')
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

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.gallery.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-group mb-3">
                                                    <label for="title">Judul</label>
                                                    <input type="text" class="form-control" id="title" name="title"
                                                        placeholder="Judul Galeri">
                                                    @error('title')
                                                    <span class="text-danger mt-2">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="description">Deskripsi</label>
                                                    <textarea class="form-control" id="summernote" name="description"
                                                        rows="5" placeholder="Deskripsi Galeri"></textarea>
                                                    @error('description')
                                                    <span class="text-danger mt-2">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="photo">Foto</label>
                                                    <input type="file" class="form-control" id="photo" name="photo">
                                                    @error('photo')
                                                    <span class="text-danger mt-2">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group text-center">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
    </div>
</div>
@endsection
