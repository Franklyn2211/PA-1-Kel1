@extends('Secretary.main')
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
                        <li class="breadcrumb-donate"><a href="/sekretaris">Dashboard</a></li>
                        <li class="breadcrumb-donate active">@yield('title')</li>
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
                    <!-- Kategori Donasi -->
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs" id="donationCategory" role="tablist">
                                <li class="nav-donate">
                                    <a class="nav-link active" id="donation-money-tab" data-toggle="tab" href="#donation-money" role="tab" aria-controls="donation-money" aria-selected="true">Donasi Uang</a>
                                </li>
                                <li class="nav-donate">
                                    <a class="nav-link" id="donation-goods-tab" data-toggle="tab" href="#donation-goods" role="tab" aria-controls="donation-goods" aria-selected="false">Donasi Barang</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="donationCategoryContent">
                                <!-- Donasi Uang -->
                                <div class="tab-pane fade show active" id="donation-money" role="tabpanel" aria-labelledby="donation-money-tab">
                                    <table id="donationMoneyTable" class="table table-striped table-bordered table-hover text-center" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Donatur</th>
                                                <th>Email</th>
                                                <th>No. HP</th>
                                                <th>Asal Daerah</th>
                                                <th>Jumlah Donasi</th>
                                                <th>Bukti Transfer</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $moneyIndex = 1; @endphp
                                            @foreach ($donates as $donate)
                                                @if ($donate->category == 'money')
                                                    <tr>
                                                        <td>{{ $moneyIndex++ }}</td>
                                                        <td>{{ $donate->Name }}</td>
                                                        <td>{{ $donate->Email }}</td>
                                                        <td>{{ $donate->Phone_number }}</td>
                                                        <td>{{ $donate->origin }}</td>
                                                        <td>Rp. {{ number_format($donate->donation_amount, 0) }}</td>
                                                        <td>
                                                            @if ($donate->evidence_of_transfer)
                                                                <a href="{{ asset('storage/app/public/evidence_of_transfer/' . $donate->evidence_of_transfer) }}" class="btn btn-primary btn-sm" target="_blank">Lihat Bukti Transfer</a>
                                                            @else
                                                                Bukti transfer tidak tersedia.
                                                            @endif
                                                        </td>
                                                        <td>{{ $donate->Description }}</td>
                                                        <td>
                                                            <form action="{{ route('Secretary.donate.updateStatus', $donate->id_donate) }}" method="POST">
                                                                @csrf
                                                                @method('PATCH')
                                                                <button type="submit" class="btn btn-sm @if ($donate->status == 1) btn-success @else btn-danger @endif">
                                                                    @if ($donate->status == 1)
                                                                        Diterima
                                                                    @else
                                                                        Ditolak
                                                                    @endif
                                                                </button>
                                                                @error('status')
                                                                    <span class="text-danger mt-2">{{ $message }}</span>
                                                                @enderror
                                                            </form>
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
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Donasi Barang -->
                                <div class="tab-pane fade" id="donation-goods" role="tabpanel" aria-labelledby="donation-goods-tab">
                                    <table id="donationGoodsTable" class="table table-striped table-bordered table-hover text-center" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Donatur</th>
                                                <th>Email</th>
                                                <th>No. HP</th>
                                                <th>Asal Daerah</th>
                                                <th>Nama Barang</th>
                                                <th>Jumlah Barang</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $goodsIndex = 1; @endphp
                                            @foreach ($donates as $donate)
                                                @if ($donate->category == 'goods')
                                                    <tr>
                                                        <td>{{ $goodsIndex++ }}</td>
                                                        <td>{{ $donate->Name }}</td>
                                                        <td>{{ $donate->Email }}</td>
                                                        <td>{{ $donate->Phone_number }}</td>
                                                        <td>{{ $donate->origin }}</td>
                                                        <td>{{ $donate->goods_name }}</td>
                                                        <td>{{ $donate->goods_quantity }}</td>
                                                        <td>{{ $donate->Description }}</td>
                                                        <td>
                                                            <form action="{{ route('Secretary.donate.updateStatus', $donate->id_donate) }}" method="POST">
                                                                @csrf
                                                                @method('PATCH')
                                                                <button type="submit" class="btn btn-sm @if ($donate->status == 1) btn-success @else btn-danger @endif">
                                                                    @if ($donate->status == 1)
                                                                        Diterima
                                                                    @else
                                                                        Ditolak
                                                                    @endif
                                                                </button>
                                                                @error('status')
                                                                    <span class="text-danger mt-2">{{ $message }}</span>
                                                                @enderror
                                                            </form>
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
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
