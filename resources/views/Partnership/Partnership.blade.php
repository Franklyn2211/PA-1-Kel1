@extends("layouts.layout")
@section("title", "Kemitraan")
@section("content")
<div class="container mt-5">
    <div class="text-center mb-4">
        <h2>Daftar Kemitraan YPA Rumah Damai</h2>
        <p class="lead">Temukan mitra-mitra kreatif dan inovatif kami</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header text-white text-center"style="background-color:rgb(16, 44, 87);">
                    <h5 class="mb-0 text-white">Daftar Kemitraan</h5>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mt-3 text-center">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Logo</th>
                                    <th scope="col">Nama Kemitraan</th>
                                    <th scope="col">Program</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kemitraan as $index => $mitra)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <img src="{{asset('logokemitraan/' . $mitra->logo) }}" alt="" style="width:100px;">
                                    </td>
                                    <td>{{ $mitra->name }}</td>
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
