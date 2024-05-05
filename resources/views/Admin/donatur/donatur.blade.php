@extends('Admin.main')
@section('title', 'Donatur')
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="example1" class="table table-striped table-bordered table-hover text-center"
                                    style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Donatur</th>
                                            <th>Email</th>
                                            <th>No. HP</th>
                                            <th>Jumlah Donasi</th>
                                            <th>Bukti Transfer</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($donates as $donate)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $donate->Name }}</td>
                                                <td>{{ $donate->Email }}</td>
                                                <td>{{ $donate->Phone_number }}</td>
                                                <td>{{ $donate->donation_amount }}</td>
                                                <td>
                                                    @if ($donate->evidence_of_transfer)
                                                    <a href="{{ asset('storage/app/public/evidence_of_transfer/' . $donate->evidence_of_transfer) }}" class="btn btn-primary btn-sm" target="_blank">Lihat Bukti Transfer</a>
                                                    @else
                                                        Bukti transfer tidak tersedia.
                                                    @endif
                                                </td>
                                                <td>{{ $donate->Description }}</td>                                                
                                                <td>
                                                    <a href="mailto:{{ $donate->Email }}?subject=Balasan%20untuk%20{{ $donate->Name }}" class="btn btn-primary btn-sm">
                                                        <i class="fa-solid fa-envelope"></i> Jawab
                                                    </a>
                                                    <form action="{{ route('donate.destroy', $donate->id_donate) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus donasi ini?')">
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
