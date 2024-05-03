@extends('Admin.main')
@section('title', 'Edit Anak Sekolah Informal')
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
                                <form action="{{ route('admin.anaksekolahinformal.update', $anaksekolahinformal->id_informal_school_child) }}" method="POST" enctype="multipart/form-data">>
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name">Nama:</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ $anaksekolahinformal->name ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="age">Umur:</label>
                                        <input type="number" id="age" name="age" class="form-control" value="{{ $anaksekolahinformal->age ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="date_joined">Tanggal Bergabung:</label>
                                        <input type="date" id="date_joined" name="date_joined" class="form-control" value="{{ $anaksekolahinformal->date_joined ?? '' }}">
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
