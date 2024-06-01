@extends('Admin.main')
@section('title', 'Sekretaris')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('title')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/Admin">Dashboard</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('Admin.sekretaris.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Sekretaris</a>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-striped table-bordered table-hover text-center" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($secretaries as $sekretaris)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $sekretaris->name }}</td>
                                                <td>{{ $sekretaris->email }}</td>
                                                <td>
                                                    <a href="{{ route('Admin.sekretaris.edit', $sekretaris->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                                    <form action="{{route('Admin.sekretaris.destroy', $sekretaris->id)}}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus Sekretaris ini?')"><i class="fa-solid fa-trash-can"></i> Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
