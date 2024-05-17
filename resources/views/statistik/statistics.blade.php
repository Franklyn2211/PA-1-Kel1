@extends("layouts.layout")
@section("title", "Statistik")
@section("content")

<div class="container mt-5">
    <div class="text-center mb-4">
        <h2>Daftar Statistik YPA Rumah Damai</h2>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header text-center" style="background-color:rgb(16, 44, 87);">
                    <ul class="nav nav-pills nav-fill" id="tab-tabeltanggalpenting" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active text-white" id="jumlah-statistik-tab" data-bs-toggle="tab" data-bs-target="#jumlah-statistik-tab-pane" type="button" role="tab" aria-controls="jumlah-statistik-tab-pane" aria-selected="true">
                                Jumlah Statistik
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-white" id="detail-relawan-tab" data-bs-toggle="tab" data-bs-target="#detail-relawan-tab-pane" type="button" role="tab" aria-controls="detail-relawan-tab-pane" aria-selected="false" tabindex="-1">
                                Detail Relawan
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-white" id="detail-donatur-tab" data-bs-toggle="tab" data-bs-target="#detail-donatur-tab-pane" type="button" role="tab" aria-controls="detail-donatur-tab-pane" aria-selected="false" tabindex="-1">
                                Detail Donatur
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <hr>
                        <div class="tab-pane ps-3 pe-3 fade active show" id="jumlah-statistik-tab-pane" role="tabpanel" aria-labelledby="jumlah-statistik-tab" tabindex="0">
                            <table class="table table-striped table-bordered mt-3">
                                <tbody>
                                    <tr>
                                        <td>Anak Disabilitas</td>
                                        <td>{{ $totalAnakDisabilitas }}</td>
                                    </tr>
                                    <tr>
                                        <td>Anak Sekolah Informal</td>
                                        <td>{{ $totalAnakSekolahInformal }}</td>
                                    </tr>
                                    <tr>
                                        <td>Relawan</td>
                                        <td>{{ $totalrelawans }}</td>
                                    </tr>
                                    <tr>
                                        <td>Donatur</td>
                                        <td>{{ $totalDonatur }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="detail-relawan-tab-pane" role="tabpanel" aria-labelledby="detail-relawan-tab" tabindex="0">
                            <table class="table table-striped table-bordered mt-3">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" style="text-align: center">No</th>
                                        <th scope="col" style="text-align: center">Nama</th>
                                        <th scope="col" style="text-align: center">Tempat Mengajar</th>
                                        <th scope="col" style="text-align: center">Asal Daerah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($relawans as $relawan)
                                    <tr>
                                        <td style="text-align: center">{{ $loop->iteration }}</td>
                                        <td style="text-align: center">{{ $relawan->name }}</td>
                                        <td style="text-align: center">{{ $relawan->location }}</td>
                                        <td style="text-align: center">{{ $relawan->origin }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="detail-donatur-tab-pane" role="tabpanel" aria-labelledby="detail-donatur-tab" tabindex="0">
                            <ul class="nav nav-pills nav-fill mb-3" id="donaturTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="donasi-uang-tab" data-bs-toggle="tab" data-bs-target="#donasi-uang-tab-pane" type="button" role="tab" aria-controls="donasi-uang-tab-pane" aria-selected="true">Donasi Uang</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="donasi-barang-tab" data-bs-toggle="tab" data-bs-target="#donasi-barang-tab-pane" type="button" role="tab" aria-controls="donasi-barang-tab-pane" aria-selected="false">Donasi Barang</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="donaturTabContent">
                                <div class="tab-pane fade show active" id="donasi-uang-tab-pane" role="tabpanel" aria-labelledby="donasi-uang-tab">
                                    <table class="table table-striped table-bordered mt-3">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" style="text-align: center">No</th>
                                                <th scope="col" style="text-align: center">Nama</th>
                                                <th scope="col" style="text-align: center">Jumlah Donasi</th>
                                                <th scope="col" style="text-align: center">Asal Daerah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $moneyIndex = ($donasiUang->currentPage() - 1) * $donasiUang->perPage() + 1; @endphp
                                            @foreach ($donasiUang as $donate)
                                            <tr>
                                                <td style="text-align: center">{{ $moneyIndex++ }}</td>
                                                <td style="text-align: center">{{ $donate->Name }}</td>
                                                <td style="text-align: center">Rp. {{ number_format($donate->donation_amount, 0) }}</td>
                                                <td style="text-align: center">{{ $donate->origin }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-end mt-3">
                                        {{ $donasiUang->links('pagination::simple-bootstrap-5') }}
                                    </div>
                                </div>
                            
                                <div class="tab-pane fade" id="donasi-barang-tab-pane" role="tabpanel" aria-labelledby="donasi-barang-tab">
                                    <table class="table table-striped table-bordered mt-3">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" style="text-align: center">No</th>
                                                <th scope="col" style="text-align: center">Nama</th>
                                                <th scope="col" style="text-align: center">Nama Barang</th>
                                                <th scope="col" style="text-align: center">Asal Daerah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $goodsIndex = ($donasiBarang->currentPage() - 1) * $donasiBarang->perPage() + 1; @endphp
                                            @foreach ($donasiBarang as $donate)
                                            <tr>
                                                <td style="text-align: center">{{ $goodsIndex++ }}</td>
                                                <td style="text-align: center">{{ $donate->Name }}</td>
                                                <td style="text-align: center">{{ $donate->goods_name }}</td>
                                                <td style="text-align: center">{{ $donate->origin }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-end mt-3">
                                        {{ $donasiBarang->links('pagination::simple-bootstrap-5') }}
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
