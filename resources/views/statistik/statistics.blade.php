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
                            <button class="nav-link active text-white" id="jumlah-statistik-tab" data-bs-toggle="tab" data-bs-target="#jadwalpendaftaran-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                                Jumlah Statistik
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-white" id="detail-relawan-tab" data-bs-toggle="tab" data-bs-target="#jadwal-ujian-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false" tabindex="-1">
                                Detail Relawan
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-white" id="detail-donatur-tab" data-bs-toggle="tab" data-bs-target="#jenis-test-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false" tabindex="-1">
                                Detail Donatur
                            </button>
                        </li>
                    </ul>
                </div>
                    <div class="tab-content" id="myTabContent">
                        <hr>
                        <div class="tab-pane ps-3 pe-3 fade active show" id="jadwalpendaftaran-tab-pane" role="tabpanel" aria-labelledby="jadwalpendaftaran-tab" tabindex="0">
                            <table class="table table-striped table-bordered mt-3">
                                <tbody>
                                    <tr>
                                        <td>Anak Disabilitas</td>
                                        <td>{{$totalAnakDisabilitas}}</td>
                                    </tr>
                                    <tr>
                                        <td>Anak Sekolah Informal</td>
                                        <td>{{$totalAnakSekolahInformal}}</td>
                                    </tr>
                                    <tr>
                                        <td>Relawan</td>
                                        <td>{{$totalrelawans}}</td>
                                    </tr>
                                    <tr>
                                        <td>Donatur</td>
                                        <td>{{$totalDonatur}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="jadwal-ujian-tab-pane" role="tabpanel" aria-labelledby="jenis-test-tab" tabindex="0">
                            <table class="table table-striped table-bordered mt-3">
                                <tbody>
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
                                        <td style="text-align: center">{{$relawan->location}}</td>
                                        <td style="text-align: center">{{$relawan->origin}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="jenis-test-tab-pane" role="tabpanel" aria-labelledby="jenis-test-tab" tabindex="0">
                            <table class="table table-striped table-bordered mt-3">
                                <tbody>
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" style="text-align: center">No</th>
                                        <th scope="col" style="text-align: center">Nama</th>
                                        <th scope="col" style="text-align: center">Jumlah Donasi</th>
                                        <th scope="col" style="text-align: center">Asal Daerah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($donates as $donate)
                                    <tr>
                                        <td style="text-align: center">{{ $loop->iteration }}</td>
                                        <td style="text-align: center">{{ $donate->Name }}</td>
                                        <td style="text-align: center">Rp. {{ number_format($donate->donation_amount, 0) }}</td>
                                        <td style="text-align: center">{{ $donate->origin}}</td>
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
