@extends('Admin.main')
@section('title', 'Edit Volunteer')
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.volunteer.index') }}">Volunteer</a></li>
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
                <h1>Edit Volunteer</h1>
                <form action="{{ route('admin.volunteer.update', $volunteer) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $volunteer->nama }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $volunteer->email }}" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_donasi">Jumlah Donasi</label>
                        <input type="number" class="form-control" id="jumlah_donasi" name="jumlah_donasi" value="{{ $volunteer->jumlah_donasi }}" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="L" {{ $volunteer->gender == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ $volunteer->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

@endsection
