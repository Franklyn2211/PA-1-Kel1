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
                    <h5 class="mb-0 text-white">Anak Disabilitas</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm mt-3 text-center">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($anakDisabilitas as $anak)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $anak->nama }}</td>
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
                <div class="card-header text-center"style="background-color:rgb(16, 44, 87);">
                    <h5 class="mb-0 text-white">Anak Sekolah Informal</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm mt-3 text-center">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($anakSekolahInformal as $anak)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $anak->nama }}</td>
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
                <div class="card-header text-center" style="background-color:rgb(16, 44, 87);">
                    <h5 class="mb-0 text-white">Relawan</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm mt-3 text-center" >
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($relawans as $relawan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $relawan->nama_relawan }}</td>
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
            <div class="card-header text-center" style="background-color:rgb(16, 44, 87);">
                <h5 class="mb-0  text-white">Donatur</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm mt-3 text-center">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jumlah Donasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($donates as $donate)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $donate->Name }}</td>
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
