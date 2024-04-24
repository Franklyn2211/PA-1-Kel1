@extends('Admin.main')
@section('title', 'Daftar Volunteer')
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
                <div class="row mb-3">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('admin.volunteer.create') }}" class="btn btn-primary float-right">Tambah Volunteer</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="example1" class="table table-striped table-bordered table-hover text-center"
                                    style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Jumlah Donasi</th>
                                            <th>Gender</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($volunteers as $volunteer)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $volunteer->nama }}</td>
                                                <td>{{ $volunteer->email }}</td>
                                                <td>{{ $volunteer->jumlah_donasi }}</td>
                                                <td>{{ $volunteer->gender }}</td>
                                                <td>
                                                    <a href="{{ route('admin.volunteer.show', $volunteer) }}" class="btn btn-info btn-sm">Lihat</a>
                                                    <a href="{{ route('admin.volunteer.edit', $volunteer) }}" class="btn btn-primary btn-sm">Edit</a>
                                                    <form action="{{ route('admin.volunteer.destroy', $volunteer) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
