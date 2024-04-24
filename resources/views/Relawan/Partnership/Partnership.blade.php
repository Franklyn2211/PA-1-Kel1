@extends("layouts.layout")
@section("title", "Kemitraan")
@section("content")
<div class="container mt-5">
    <div class="text-center mb-4">
        <h2 class="display-4">Daftar Kemitraan YPA Rumah Damai</h2>
        <p class="lead">Temukan mitra-mitra kreatif dan inovatif kami</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Daftar Kemitraan</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mt-3 text-center">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Kemitraan</th>
                                    <th scope="col">Logo</th>
                                    <th scope="col">Program</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kemitraan as $index => $mitra)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $mitra->nama }}</td>
                                    <td>
                                        <img src="{{asset('logokemitraan/' . $mitra->logo) }}" alt="" style="width:100px;">
                                    </td>
                                    <td>{{ $mitra->program }}</td>
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
