@extends('layouts.layout')
@section('title', 'Relawan')
@section('content')

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb"
        style="background-image: url('{{ asset('assets/img/hcarausel4.png') }}'); background-size: cover; background-position: center;">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown fw-bolder" data-wow-delay="0.1s">Relawan</h3>
                <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active text-primary">Relawan</li>
                </ol>
        </div>
    </div>
    <!-- Header End -->
    <div class="daftar-relawan">
        <h2>Mulailah Perubahan Anda: Daftar Sebagai Relawan Sekarang!</h2>
        <p>Terima kasih atas minat Anda untuk bergabung sebagai relawan kami! Kami sangat menghargai partisipasi Anda dalam
            mendukung misi dan visi kami.</p>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('relawan.store') }}" enctype="multipart/form-data">
            @csrf
            <label for="name">Nama</label><br>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <br>

            <label for="email">Email</label><br>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <br>

            <label for="phone_number">No. Hp</label><br>
            <input type="tel" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" pattern="[0-9]{9,15}" required>
            @error('phone_number')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <br>

            <label for="date_of_birth">Tanggal Lahir</label><br>
            <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}">
            @error('date_of_birth')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <br>

            <label for="origin">Asal Daerah</label><br>
            <input type="text" id="origin" name="origin" value="{{ old('origin') }}" pattern="^[\pL\s\-]+$">
            @error('origin')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <br>

            <label for="location">Lokasi yang dipilih*</label><br>
            <select id="location" name="location">
                <option value="Wilayah I, Desa Lumban Silintong, Kecamatan Balige, Kabupaten Toba" {{ old('location') == 'Wilayah I, Desa Lumban Silintong, Kecamatan Balige, Kabupaten Toba' ? 'selected' : '' }}>Wilayah I, Desa Lumban Silintong, Kecamatan Balige, Kabupaten Toba</option>
                <option value="Wilayah II, Desa Sawah Lamo, Kecamatan Andam Dewi, Kabupaten Tapanuli Tengah" {{ old('location') == 'Wilayah II, Desa Sawah Lamo, Kecamatan Andam Dewi, Kabupaten Tapanuli Tengah' ? 'selected' : '' }}>Wilayah II, Desa Sawah Lamo, Kecamatan Andam Dewi, Kabupaten Tapanuli Tengah</option>
            </select>
            @error('location')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <br>

            <label for="cv">Unggah CV</label><br>
            <input type="file" id="cv" name="cv" accept=".pdf,.doc,.docx">
            @error('cv')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <br>

            <input type="submit" value="Submit">
        </form>
    </div>

@endsection
