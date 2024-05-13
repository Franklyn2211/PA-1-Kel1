@extends('Admin.main')
@section('title', 'Footer')
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
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-right">
                                <a href="{{ route('Admin.Footer.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah Footer</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered table-hover text-center"
                                style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Tentang</th>
                                        <th>No.Hp</th>
                                        <th>Email</th>
                                        <th>Link Facebook</th>
                                        <th>Link Instagram</th>
                                        <th>Link Youtube</th>
                                        <th>Link Tiktok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{!! $footer->about !!}</td>
                                        <td>{{ $footer->phone_number }}</td>
                                        <td>{{ $footer->email }}</td>
                                        <td>{{ $footer->facebook_url }}</td>
                                        <td>{{ $footer->instagram_url }}</td>
                                        <td>{{ $footer->youtube_url }}</td>
                                        <td>{{ $footer->tiktok_url }}</td>
                                        <td>
                                            <a href="{{ route('Admin.Footer.edit', $footer->id_footer) }}" class="btn btn-success btn-sm mr-1"><i class="fa-solid fa-pen"></i> Edit</a>
                                            <form action="{{ route('Admin.Footer.destroy', $footer->id_footer) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus Footer ini?')"><i class="fa-solid fa-trash-can"></i> Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
    </div>
</div>

@endsection
