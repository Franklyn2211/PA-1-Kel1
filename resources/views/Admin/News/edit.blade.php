@extends('Admin.main')
@section('title', 'News')
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
                            <form action="{{ route('Admin.News.update', $news->id_news) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-group mb-3">
                                                    <label for="title">Judul</label>
                                                    <input type="text" class="form-control" id="title" name="title" value="{{$news->title ?? ''}}" required>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="location">Lokasi</label>
                                                    <input type="text" class="form-control" id="location" name="location" value="{{$news->location ?? ''}}", required>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="tanggal">Tanggal</label>
                                                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{$news->tanggal ?? ''}}">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="photo">Foto</label>
                                                    <input type="file" class="form-control" id="photo" name="photo">
                                                    @if($news->photo)
                                                    <img src="{{ asset('storage/app/public/photo/' . $news->photo) }}" alt="Foto Berita" style="max-width: 200px; margin-top: 10px;">
                                                    @else
                                                    <p>Tidak ada foto tersedia.</p>
                                                    @endif
                                                </div>
                                                
                                                <div class="form-group mb-3">
                                                    <label for="news_category_id">Kategori</label>
                                                    <select class="form-control" id="news_category_id" name="news_category_id">
                                                        @foreach($categories as $category)
                                                        <option value="{{ $category->id_news_categories }}" {{ $news->news_category_id == $category->id_news_categories ? 'selected' : '' }}>{{ $category->Name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>                                                
                                                <div class="form-group mb-3">
                                                    <label for="description">Deskripsi</label>
                                                    <textarea class="form-control" id="description" name="description" rows="5">{{ $news->description }}</textarea>
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
