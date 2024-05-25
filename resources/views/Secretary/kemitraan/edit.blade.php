@extends('Secretary.main')
@section('title', 'Edit Kemitraan')
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
                        <li class="breadcrumb-item"><a href="/sekretaris">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('Sekretaris.kemitraan.index') }}">Kemitraan</a></li>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Form Edit Kemitraan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('Sekretaris.kemitraan.update', $kemitraan->id_partnership) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Nama Kemitraan:</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $kemitraan->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="logo">Logo:</label>
                                    <input type="file" class="form-control-file" id="logo" name="logo">
                                </div>
                                <div class="form-group">
                                    <label for="program">Program:</label>
                                    <input type="text" class="form-control" id="program" name="program" value="{{ $kemitraan->program }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

@endsection
