@extends('Admin.main')
@section('title', 'Relawan')
@section('content')
    <form action="{{ route('admin.announcement.update', ['announcement' => $announcement->id]) }}" method="post">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="name">Nama Kategori</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $announcement->Name ?? '' }}" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi Kategori*</label>
            <textarea class="form-control" id="description" name="description" rows="10" required>{{ $announcement->Description ?? '' }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary" id="btn-simpan">Simpan</button>
        <a href="{{ route('admin.announcement.index') }}" class="btn btn-warning" id="btn-batal">Batal</a>
    </form>
@endsection

@section('styles')
    <style>
        .ck-editor__editable_inline {
            min-height: 200px;
        }
    </style>
@endsection
