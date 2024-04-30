@extends('Admin.main')
@section('title', 'Detail Anak Disabilitas')
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
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                @foreach ($anakdisabilitas as $item)
                                <p><strong>Nama:</strong> {{ $item->nama }}</p>
                                <p><strong>Umur:</strong> {{ $item->umur }}</p>
                                <p><strong>Tanggal Bergabung:</strong> {{ $item->tanggal_bergabung }}</p>
                                @endforeach
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