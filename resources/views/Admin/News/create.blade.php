@extends('admin.partials.layout')

@section('subtitle')
    <a class="btn btn-warning" href="{{ route('admin.news.index') }}" role="button" id="btn-batal"><i
            class="fa fa-arrow-left"></i>
        Kembali</a>
@endsection

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card p-3">
                        <form method="post" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row border-bottom pb-4">
                                <label for="title" class="col-sm-2 col-form-label">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}"
                                        id="title" placeholder="Judul Berita">
                                </div>
                                @error('title')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="location" class="col-sm-2 col-form-label">Lokasi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="location" value="{{ old('location') }}"
                                        id="location" placeholder="Lokasi Berita">
                                </div>
                                @error('location')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="tanggal" value="{{ old('tanggal') }}"
                                        id="tanggal">
                                </div>
                                @error('tanggal')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="photo" class="col-sm-2 col-form-label">Foto</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="photo" id="photo">
                                </div>
                                @error('photo')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="news_category_id" class="col-sm-2 col-form-label">Kategori Berita</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="news_category_id" name="news_category_id">
                                        <option value="">-- Pilih Kategori --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('news_category_id')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="is_share" class="col-sm-2 col-form-label">Akan Dibagikan?</label>
                                <div class="col-sm-10">
                                    <select name="is_share" class="form-control">
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </div>
                                @error('is_share')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="description" id="description" cols="30"
                                        rows="7">{{ old('description') }}</textarea>
                                </div>
                                @error('description')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="created_by" class="col-sm-2 col-form-label">Dibuat Oleh</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="created_by" value="{{ old('created_by') }}"
                                        id="created_by" placeholder="Dibuat Oleh">
                                </div>
                                @error('created_by')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
