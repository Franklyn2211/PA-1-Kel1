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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="example1" class="table table-striped table-bordered table-hover text-center" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($secretaries as $sekretaris)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $sekretaris->name }}</td>
                                                <td>{{ $sekretaris->email }}</td>
                                                <td>
                                                    <form action="{{ route('updateStatus', $sekretaris->id) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-sm @if ($sekretaris->status == 1) btn-success @else btn-danger @endif">
                                                            @if ($sekretaris->status == 1)
                                                                Diterima
                                                            @else
                                                                Ditolak
                                                            @endif
                                                        </button>
                                                        @error('status')
                                                            <span class="text-danger mt-2">{{ $message }}</span>
                                                        @enderror
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
