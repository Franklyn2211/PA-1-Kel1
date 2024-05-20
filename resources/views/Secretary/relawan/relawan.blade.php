@extends('Secretary.main')
@section('title', 'Relawan')
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
                            <li class="breadcrumb-item"><a href="/sekretaris">Dashboard</a></li>
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
                            <div class="card-body">
                                <table id="example1" class="table table-striped table-bordered table-hover text-center"
                                    style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Relawan</th>
                                            <th>Email</th>
                                            <th>No. HP</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Asal Daerah</th>
                                            <th>Lokasi</th>
                                            <th>CV</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($relawan as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->phone_number }}</td>
                                                <td>{{ date('d-m-Y', strtotime($item->date_of_birth)) }}</td>
                                                <td>{{ $item->origin }}</td>
                                                <td>{{ $item->location }}</td>
                                                <td>
                                                    @if ($item->cv)
                                                    <a href="{{ asset('storage/app/public/CV/' . $item->cv) }}" class="btn btn-primary btn-sm" target="_blank">Lihat CV</a>
                                                    @else
                                                        CV tidak tersedia.
                                                    @endif
                                                </td>
                                                <td>
                                                    <form action="{{ route('Secretary.relawan.updateStatus', $item->id_volunteers) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-sm @if ($item->status == 1) btn-success @else btn-danger @endif">
                                                            @if ($item->status == 1)
                                                                Diterima
                                                            @else
                                                                Ditolak
                                                            @endif
                                                        </button>
                                                        @error('status')
                                                            <span class="text-danger mt-2">{{ $message }}</span>
                                                        @enderror
                                                    </form>
                                                    <a href="mailto:{{ $item->email }}?subject=Balasan%20untuk%20{{ $item->name }}" class="btn btn-primary btn-sm">
                                                        <i class="fa-solid fa-envelope"></i> Jawab
                                                    </a>
                                                    <form action="{{ route('relawan.destroy', $item->id_volunteers) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus relawan ini?')">
                                                            <i class="fa-solid fa-trash-can"></i> Hapus
                                                        </button>
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
