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
                            <li class="breadcrumb-item"><a href="{{ route('admin.anakdisabilitas.index') }}">Anak Sekolah Informal</a></li>
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
                                <p><strong>Nama:</strong> {{ $anakdisabilitas->name }}</p>
                                <p><strong>Tanggal Lahir:</strong> {{ $anakdisabilitas->date_of_birth }}</p>
                                <p><strong>Jenis Kelamin:</strong> {{ $anakdisabilitas->gender }}</p>
                                <p><strong>Umur:</strong> {{ \Carbon\Carbon::parse($anakdisabilitas->date_of_birth)->age }}</p>
                                <p><strong>Tanggal Bergabung:</strong> {{ $anakdisabilitas->date_joined }}</p>
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
