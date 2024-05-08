@extends('Admin.main')
@section('title', 'Testimoni')
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
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <div class="text-right">
                            <a href="{{ route('admin.testimoni.create') }}" class="btn btn-primary"><i
                                    class="fa-solid fa-plus"></i> Tambah Testimoni</a>
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
                                    <th>Jenis Kelamin</th>
                                    <th>Deskripsi</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testimoni as $tes)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $tes->name }}</td>
                                        <td>{{ $tes->gender }}</td>
                                        <td>{!! $tes->description !!}</td>
                                        <td><img src="{{ asset('storage/app/public/photo/' . $tes->photo) }}"
                                                alt="Foto" style="width: 100px;"></td>
                                        <td>
                                            <a href="{{ route('admin.testimoni.edit', $tes) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('admin.testimoni.destroy', $tes) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
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
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

@endsection
