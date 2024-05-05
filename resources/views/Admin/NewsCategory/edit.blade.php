@extends('Admin.main')
@section('title', 'Edit Kategori Berita')
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
                                <form action="{{ route('Admin.NewsCategory.update', $newsCategory->id_news_categories) }}" method="POST" enctype="multipart/form-data">

                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group mb-3">
                                                        <label for="name">Nama Kategori</label>
                                                        <input type="text" class="form-control" id="Name" name="Name" value="{{ $newsCategory->Name }}" required>
                                                        @error('Name')
                                                            <span class="text-danger mt-2">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="description">Deskripsi</label>
                                                        <textarea class="form-control" id="summernote" name="Description" rows="10" required>{!! $newsCategory->Description !!}</textarea>
                                                        @error('Description')
                                                            <span class="text-danger mt-2">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <!-- Jika Anda ingin menyembunyikan form input "Created_by" -->
                                                    <!-- <input type="hidden" name="created_by" value="{{ auth()->user()->id }}"> -->
                                                    <div class="form-group text-center"> <!-- Perubahan di sini -->
                                                        <button type="submit" class="btn btn-primary" id="btn-simpan">Simpan</button>
                                                        <a href="{{ route('Admin.NewsCategory.index') }}" class="btn btn-warning" id="btn-batal">Batal</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .ck-editor__editable_inline {
            min-height: 200px;
        }
    </style>
@endsection
