@extends('Admin.main')
@section('title', 'Anak Sekolah Informal')
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-right">
                                    <a href="{{ route('admin.anaksekolahinformal.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah Anak Sekolah Informal</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-striped table-bordered table-hover text-center"
                                    style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Umur</th>
                                            <th>Tanggal Bergabung</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($anaksekolahinformal as $anaksekolahinformal)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $anaksekolahinformal->nama }}</td>
                                                <td>{{ $anaksekolahinformal->umur }}</td>
                                                <td>{{ $anaksekolahinformal->tanggal_bergabung }}</td>
                                                <td>
                                                    <a href="{{ route('admin.anaksekolahinformal.show', $anaksekolahinformal) }}" class="btn btn-info btn-sm">Lihat</a>
                                                    <a href="{{ route('admin.anaksekolahinformal.edit', $anaksekolahinformal) }}" class="btn btn-primary btn-sm">Edit</a>
                                                    <form action="{{ route('admin.anaksekolahinformal.destroy', $anaksekolahinformal) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus anak sekolah informal ini?')"><i class="fa-solid fa-trash-can"></i> Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            </div>
        </div>
    </div>

@endsection