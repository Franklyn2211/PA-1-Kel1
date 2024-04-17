@extends('admin.partials.layout')

@section('title')
    Edit News
@endsection

@section('subtitle')
    <a class="btn btn-warning" href="{{ route('admin.news.index') }}" role="button"><i
            class="fa fa-arrow-left"></i> Kembali</a>
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <form method="post" action="{{ route('admin.news.update', $news->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group row border-bottom pb-4">
                                    <label for="title" class="col-sm-2 col-form-label">Judul Berita</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="title"
                                            value="{{ old('title', $news->title) }}" id="title"
                                            placeholder="Contoh: Judul Berita">
                                    </div>
                                    @error('title')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group row border-bottom pb-4">
                                    <label for="location" class="col-sm-2 col-form-label">Lokasi</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="location"
                                            value="{{ old('location', $news->location) }}" id="location"
                                            placeholder="Contoh: Lokasi Berita">
                                    </div>
                                    @error('location')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group row border-bottom pb-4">
                                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="tanggal"
                                            value="{{ old('tanggal', $news->tanggal) }}" id="tanggal">
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
                                        <select class="form-control" name="news_category_id" id="news_category_id">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('news_category_id', $news->news_category_id) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('news_category_id')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group row border-bottom pb-4">
                                    <label for="is_share" class="col-sm-2 col-form-label">Akan Ditampilkan?</label>
                                    <div class="col-sm-10">
                                        <select name="is_share" class="form-control">
                                            <option value="1" {{ old('is_share', $news->is_share) == '1' ? 'selected' : '' }}>
                                                Ya</option>
                                            <option value="0" {{ old('is_share', $news->is_share) == '0' ? 'selected' : '' }}>
                                                Tidak</option>
                                        </select>
                                    </div>
                                    @error('is_share')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group row border-bottom pb-4">
                                    <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="description" id="description"
                                            cols="30" rows="7">{{ old('description', $news->description) }}</textarea>
                                    </div>
                                    @error('description')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group row border-bottom pb-4">
                                    <label for="updated_by" class="col-sm-2 col-form-label">Diperbarui Oleh</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="updated_by"
                                            value="{{ old('updated_by', $news->updated_by) }}" id="updated_by">
                                    </div>
                                    @error('updated_by')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-success">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .ck-editor__editable_inline {
            min-height: 200px;
        }
    </style>
@endpush

@push('scripts')
    @if (session('alert-type') === 'success')
        <script>
            Swal.fire({
                icon: 'success',
                title: '{{ session('message') }}',
                showConfirmButton: true,
                timer: 2000
            });
        </script>
    @endif

    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
