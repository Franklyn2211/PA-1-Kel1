@extends("layouts.layout")
@section("title", "Statistik")
@section("content")

<div class="container mt-5">
    <div class="text-center">
        <h2 class="display-4">Daftar Statistik YPA Rumah Damai</h2>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h5 class="mb-0">Anak Spesial</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm mt-3 text-center">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tanggal Bergabung</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($anakDisabilitas as $anak)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $anak->nama }}</td>
                                    <td>{{ $anak->tanggal_bergabung }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h5 class="mb-0">Siswa Informal</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm mt-3 text-center">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tanggal Bergabung</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($anakSekolahInformal as $anak)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $anak->nama }}</td>
                                    <td>{{ $anak->tanggal_bergabung }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h5 class="mb-0">Staf</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm mt-3 text-center">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tanggal Bergabung</th>
                                    <th scope="col">Jabatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stafPegawai as $staf)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $staf->name }}</td>
                                    <td>{{ $staf->date_joined }}</td>
                                    <td>{{ $staf->job_title }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h5 class="mb-0">Relawan</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm mt-3 text-center">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Lokasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($relawans as $relawan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $relawan->name }}</td>
                                    <td>{{ $relawan->email }}</td>
                                    <td>{{ $relawan->location }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">
                <h5 class="mb-0">Donatur</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm mt-3 text-center">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">No.hp</th>
                                <th scope="col">Jumlah Donasi</th>
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

@endsection
