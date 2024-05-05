@extends('Admin.main')
@section('title', 'Detail Anak Spesial')
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
                        <li class="breadcrumb-item"><a href="{{ route('admin.anakdisabilitas.index') }}">Anak Disabilitas</a></li>
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
<<<<<<< HEAD
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <p><strong>Nama:</strong> {{ $anakdisabilitas->nama }}</p>
                            <p><strong>Umur:</strong> {{ $anakdisabilitas->umur }}</p>
                            <p><strong>Tanggal Bergabung:</strong> {{ $anakdisabilitas->tanggal_bergabung }}</p>
                        </div>
                    </div>
=======
            <!-- Detail Box -->
            <div class="card">
                <div class="card-body">
                    <p><strong>Nama:</strong> {{ $anakdisabilitas->name }}</p>
                    <p><strong>Umur:</strong> {{ $anakdisabilitas->age }}</p>
                    <p><strong>Tanggal Bergabung:</strong> {{ $anakdisabilitas->date_joined }}</p>
>>>>>>> 336e8d942531d4d6b01c3b480285e410f39748e8
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

@endsection
