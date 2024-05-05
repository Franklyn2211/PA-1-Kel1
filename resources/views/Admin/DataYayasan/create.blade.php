@extends('Admin.main')
@section('title', 'Tambah Data Yayasan')
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
                                <form action="{{ route('Admin.DataYayasan.store') }}" method="post"
                                    enctype='multipart/form-data'>
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group mb-3">
                                                        <label for="foundation_name" class="form-label">Nama Yayasan</label>
                                                        <input type="text" class="form-control" id="foundation_name" name="foundation_name" placeholder="Nama Yayasan">
                                                        @error('foundation_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="history" class="form-label">Sejarah</label>
                                                        <textarea class="form-control" id="history" name="history"></textarea>
                                                        @error('history')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="visi" class="form-label">Visi</label>
                                                        <textarea class="form-control" id="visi" name="visi"></textarea>
                                                        @error('visi')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="misi" class="form-label">Misi</label>
                                                        <textarea class="form-control" id="misi" name="misi"></textarea>
                                                        @error('misi')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group text-center">
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
