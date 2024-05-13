@extends('Admin.main')
@section('title', 'Edit Footer')
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('Admin.Footer.update', $footer->id_footer) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">No.Hp:</label>
                                        <input type="tel" name="phone_number" id="phone" pattern="[0-9]{9,15}" class="form-control" value="{{$footer->phone_number}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" id="email" name="email" class="form-control" value="{{$footer->email}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="facebook_url">Link Facebook</label>
                                        <input type="text" name="facebook_url" id="facebook_url" class="form-control" value="{{$footer->facebook_url}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="instagram_url">Link Instagram</label>
                                        <input type="text" name="instagram_url" id="instagram_url" class="form-control" value="{{$footer->instagram_url}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="youtube_url">Link Youtube</label>
                                        <input type="text" name="youtube_url" id="youtube_url" class="form-control" value="{{$footer->youtube_url}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tiktok_url">Link Tiktok</label>
                                        <input type="text" name="tiktok_url" id="tiktok_url" class="form-control" value="{{$footer->tiktok_url}}" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="about" class="form-label">About</label>
                                        <textarea class="form-control" id="summernote" name="about">{!!$footer->about!!}</textarea>
                                    </div>
                                    <div class="form-group text-center"> <!-- Perubahan di sini -->
                                        <button type="submit" class="btn btn-primary" id="btn-simpan">Simpan</button>
                                        <a href="{{ route('Admin.Footer.index') }}" class="btn btn-warning" id="btn-batal">Batal</a>
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
