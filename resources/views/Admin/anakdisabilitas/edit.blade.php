@extends('Admin.main')
@section('title', 'Edit Anak Disabilitas')
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
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('Admin.anakdisabilitas.update', $anakdisabilitas->id_anakdisabilitas) }}" method="POST" enctype="multipart/form-data">>
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="nama">Nama:</label>
                                    <input type="text" id="nama" name="nama" class="form-control" value="{{ $anakdisabilitas->nama }}">
                                </div>
                                <div class="form-group">
                                    <label for="umur">Umur:</label>
                                    <input type="number" id="umur" name="umur" class="form-control" value="{{ $anakdisabilitas->umur }}">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_bergabung">Tanggal Bergabung:</label>
                                    <input type="date" id="tanggal_bergabung" name="tanggal_bergabung" class="form-control" value="{{ $anakdisabilitas->tanggal_bergabung }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

@endsection
