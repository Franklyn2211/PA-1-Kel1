@extends('Admin.main')
@section('title', 'Data Yayasan')
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
                                <form action="{{ route('Admin.DataYayasan.update', $dataYayasan->id_data_yayasans) }}" method="post"
                                    enctype='multipart/form-data'>
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group mb-3">
                                                        <label for="nama_yayasan" class="form-label">Nama Yayasan</label>
                                                        <input type="text" class="form-control" id="nama_yayasan"
                                                            name="nama_yayasan"
                                                            value="{{ $dataYayasan ? $dataYayasan->nama_yayasan : '' }}"
                                                            required>
                                                        @error('nama_yayasan')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="singkatan_nama_yayasan" class="form-label">Singkatan
                                                            Nama
                                                            Yayasan</label>
                                                        <input type="text" class="form-control"
                                                            id="singkatan_nama_yayasan" name="singkatan_nama_yayasan"
                                                            value="{{ $dataYayasan ? $dataYayasan->singkatan_nama_yayasan : '' }}"
                                                            required>
                                                        @error('singkatan_nama_yayasan')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="sejarah" class="form-label">Sejarah</label>
                                                        <textarea class="form-control" id="sejarah" name="sejarah">{{ $dataYayasan ? $dataYayasan->sejarah : '' }}</textarea>
                                                        @error('sejarah')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="visi" class="form-label">Visi</label>
                                                        <textarea class="form-control" id="visi" name="visi">{{ $dataYayasan ? $dataYayasan->visi : '' }}</textarea>
                                                        @error('visi')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="misi" class="form-label">Misi</label>
                                                        <textarea class="form-control" id="misi" name="misi">{{ $dataYayasan ? $dataYayasan->misi : '' }}</textarea>
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
