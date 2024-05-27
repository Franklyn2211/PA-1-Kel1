@extends('Admin.main')
@section('title', 'Pengumuman')
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
                                <form action="{{ route('Admin.Announcement.update', $announcements->id_announcements) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group mb-3">
                                                        <label for="title">Judul</label>
                                                        <input type="text" class="form-control" id="title" name="title" value="{{$announcements->title ?? ''}}" required>
                                                        @error('title')
                                                            <span class="text-danger mt-2">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="location">Lokasi</label>
                                                        <input type="text" class="form-control" id="location" name="location" value="{{$announcements->location ?? ''}}", required>
                                                        @error('location')
                                                            <span class="text-danger mt-2">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="photo">Foto</label>
                                                        <input type="file" class="form-control" id="photo" name="photo">
                                                    @if($announcements->photo)
                                                    <img src="{{ asset('storage/app/public/photo/' . $announcements->photo) }}" alt="Foto Pengumuman" style="max-width: 200px; margin-top: 10px;">
                                                    @else
                                                    <p>Tidak ada foto tersedia.</p>
                                                    @endif
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="category_id">Kategori</label>
                                                        <select class="form-control" id="category_id" name="announcement_category_id">
                                                            @foreach($categories as $category)
                                                                <option value="{{ $category->id_announcement_categories }}" {{ $announcements->announcement_category_id == $category->id_announcement_categories ? 'selected' : '' }}>{{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="description">Deskripsi</label>
                                                        <textarea class="form-control" id="summernote" name="description">{!! $announcements->description ?? '' !!}</textarea>
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
