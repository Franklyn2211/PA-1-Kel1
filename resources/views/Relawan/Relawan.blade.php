@extends('layouts.layout')
@section('title', 'Relawan')
@section('content')

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb"
        style="background-image: url('{{ asset('assets/img/hcarausel4.png') }}'); background-size: cover; background-position: center;">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Relawan</h1>
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
            {{ $errors->first() }}
        </div>
    @endif
        <form method="POST" action="{{ route('relawan.store') }}" enctype="multipart/form-data">
            @csrf
            <label for="name">Nama</label><br>
            <input type="text" id="name" name="name" required><br>
            <label for="email">Email</label><br>
            <input type="email" id="email" name="email"><br>
            <label for="phone_number">No. Hp</label><br>
            <input type="tel" id="phone" name="phone_number" pattern="[0-9]{9,15}" required><br>
            <label for="date_of_birth">Tanggal Lahir</label><br>
            <input type="date" id="date_of_birth" name="date_of_birth"><br>
            <label for="asaldaerah">Asal Daerah</label><br>
            <input type="text" id="asaldaerah" name="asaldaerah"><br>
            <label for="location">Lokasi yang dipilih*</label><br>
            <select id="location" name="location">
                <option value="Wilayah I, Desa Lumban Silintong, Kecamatan Balige, Kabupaten Toba">Wilayah I, Desa Lumban
                    Silintong, Kecamatan Balige, Kabupaten Toba</option>
                <option value="Wilayah II, Desa Sawah Lamo, Kecamatan Andam Dewi, Kabupaten Tapanuli Tengah">Wilayah II,
                    Desa Sawah Lamo, Kecamatan Andam Dewi, Kabupaten Tapanuli Tengah</option>
            </select><br>

            <label for="cv">Unggah CV</label><br>
            <input type="file" id="cv" name="cv" required><br>
            <input type="submit" value="Submit">
        </form>
    </div>

@endsection
