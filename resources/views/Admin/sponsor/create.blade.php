@extends('Admin.main')
@section('title', 'Tambah Sponsor')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('title')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/Admin">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.sponsor.index') }}">Sponsors</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.sponsor.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="Name">Nama:</label>
                                        <input type="text" class="form-control" id="Name" name="Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="photo">Foto:</label>
                                        <input type="file" class="form-control-file" name="photo">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="Description">Deskripsi</label>
                                        <textarea class="form-control" name="Description" id="summernote" ></textarea>
                                    </div>
                                    <div class="form-group text-center">
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
