@extends('Admin.main')
@section('title', 'Tambah Announcement Category')
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
                            <form action="{{ route('admin.announcementCategory.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-group mb-3">
                                                    <label for="name">Nama Kategori</label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        placeholder="Nama Kategori">
                                                    @error('name')
                                                    <span class="text-danger mt-2">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="description">Deskripsi</label>
                                                    <textarea class="form-control" id="description" name="description"
                                                        rows="5" placeholder="Deskripsi Kategori"></textarea>
                                                    @error('description')
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

@section('styles')
<style>
    .ck-editor__editable_inline {
        min-height: 200px;
    }
</style>
@endsection
