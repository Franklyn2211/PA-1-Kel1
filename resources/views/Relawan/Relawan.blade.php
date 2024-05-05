@extends("layouts.layout")
@section("title", "Relawan")
@section("content")
<div class="daftar-relawan">
    <h2>Mulailah Perubahan Anda: Daftar Sebagai Relawan Sekarang!</h2>
    <p>Terima kasih atas minat Anda untuk bergabung sebagai relawan kami! Kami sangat menghargai partisipasi Anda dalam mendukung misi dan visi kami.</p>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
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
        <label for="location">Lokasi yang dipilih*</label><br>
        <select id="location" name="location">
            <option value="Wilayah I, Desa Lumban Silintong, Kecamatan Balige, Kabupaten Toba">Wilayah I, Desa Lumban Silintong, Kecamatan Balige, Kabupaten Toba</option>
            <option value="Wilayah II, Desa Sawah Lamo, Kecamatan Andam Dewi, Kabupaten Tapanuli Tengah">Wilayah II, Desa Sawah Lamo, Kecamatan Andam Dewi, Kabupaten Tapanuli Tengah</option>
        </select><br>

        <label for="cv">Unggah CV</label><br>
        <input type="file" id="cv" name="cv" required><br>
        <input type="submit" value="Submit">
    </form>
</div>

@endsection
