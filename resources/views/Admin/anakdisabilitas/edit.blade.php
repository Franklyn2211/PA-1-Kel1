@extends('Admin.main')
@section('title', 'Edit Anak Disabilitas')
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.anakdisabilitas.update', ['anakdisabilitas' => $anakdisabilitas->id_child_with_disabilities]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')                                
                                    <div class="form-group">
                                        <label for="name">Nama:</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ $anakdisabilitas->name ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="date_of_birth">Tanggal Lahir:</label>
                                        <input type="date" id="date_of_birth" name="date_of_birth" class="form-control" value="{{ $anakdisabilitas->date_of_birth ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Jenis Kelamin:</label>
                                        <select id="gender" name="gender" class="form-control">
                                            <option value="Laki-Laki" {{ $anakdisabilitas->gender == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                            <option value="Perempuan" {{ $anakdisabilitas->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="date_joined">Tanggal Bergabung:</label>
                                        <input type="date" id="date_joined" name="date_joined" class="form-control" value="{{ $anakdisabilitas->date_joined ?? '' }}">
                                    </div>
                                    <div class="form-group text-center"> <!-- Perubahan di sini -->
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
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
