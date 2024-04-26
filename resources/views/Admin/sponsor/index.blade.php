@extends('Admin.main')
@section('title', 'Sponsor')
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-right">
                                    <a href="{{ route('admin.sponsor.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah Sponsor</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-striped table-bordered table-hover text-center" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Foto</th>
                                            <th>Description</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sponsor as $sponsors)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $sponsors->Name }}</td>
                                                <td>
                                                    <img src="{{asset('potosponsor/' . $sponsors->poto ) }}" alt="" style="width:100px;" class="img-fluid">
                                                </td>
                                                <td>{{ $sponsors->Description }}</td>
                                                <td>
                                                    <a href="{{ route('admin.sponsor.edit', $sponsors->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                    <form action="{{ route('admin.sponsor.destroy', $sponsors->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this sponsor?')"><i class="fa-solid fa-trash-can"></i> Hapus</button>
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
