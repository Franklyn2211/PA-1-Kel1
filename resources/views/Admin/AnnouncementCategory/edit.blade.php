@extends('Admin.main')
@section('title', 'Edit Announcement Category')
@section('content')
<form action="{{ route('admin.announcementCategories.update', ['category' => $newsCategory->id]) }}" method="post">
    @method('put')
    @csrf
    <div class="form-group">
        <label for="name">Nama Kategori</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $newsCategory->Name ?? '' }}" required>
    </div>
    <div class="form-group">
        <label for="description">Deskripsi Kategori*</label>
        <textarea class="form-control" id="description" name="description" rows="10"
            required>{{ $newsCategory->Description ?? '' }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary" id="btn-simpan">Simpan</button>
    <a href="{{ route('admin.announcementCategories.index') }}" class="btn btn-warning" id="btn-batal">Batal</a>
</form>
@endsection

@section('styles')
<style>
    .ck-editor__editable_inline {
        min-height: 200px;
    }
</style>
@endsection
