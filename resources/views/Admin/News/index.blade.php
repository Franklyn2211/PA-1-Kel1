@extends('admin.partials.layout')

@section('title', 'List Berita')

@section('subtitle')
    <a class="btn btn-primary" href="{{ route('admin.news.create') }}" role="button">Tambah Berita <i
            class="fa fa-plus"></i></a>
@endsection

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="example1">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Lokasi</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Dibuat Oleh</th>
                                        <th scope="col">Diperbarui Oleh</th>
                                        <th scope="col">Dibagikan?</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($news as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->location }}</td>
                                            <td>{{ $item->tanggal }}</td>
                                            <td>
                                                <img src="{{ asset($item->photo) }}" alt="Foto" width="100">
                                            </td>
                                            <td>{{ $item->category->name }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>{{ $item->created_by }}</td>
                                            <td>{{ $item->updated_by }}</td>
                                            <td>{{ $item->is_share == 1 ? 'Ya' : 'Tidak' }}</td>
                                            <td>
                                                <a href="{{ route('admin.news.edit', $item->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <!-- Tambahkan tombol hapus jika diperlukan -->
                                            </td>
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

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#example1').DataTable();
        });
    </script>
    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.4/datatables.min.js"></script>
@endpush
