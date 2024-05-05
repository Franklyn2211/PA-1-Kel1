@extends('Admin.main')
@section('title', 'Kontak')
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
                <div class="card">
                    <div class="card-body">
                        <table id="example1" class="table table-striped table-bordered table-hover text-center" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td> <!-- Perbaikan disini -->
                                        <td>{{ $item->email }}</td> <!-- Perbaikan disini -->
                                        <td>{{ $item->phone_number }}</td> <!-- Perbaikan disini -->
                                        <td>{{ $item->message }}</td> <!-- Perbaikan disini -->
                                        <td>
                                            <a href="mailto:{{ $item->email }}?subject=Balasan%20untuk%20{{ $item->name }}" class="btn btn-primary btn-sm">
                                                <i class="fa-solid fa-envelope"></i> Jawab
                                            </a>
                                            <form action="{{ route('kontak.destroy', $item->id_contact) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this contact?')">
                                                    <i class="fa-solid fa-trash-can"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            </div>
        </div>
    </div>

@endsection
