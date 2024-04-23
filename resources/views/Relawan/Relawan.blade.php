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
    <form method="POST" action="{{ url('/Relawan') }}" enctype="multipart/form-data">
        @csrf
        <label for="nama_relawan">Nama</label><br>
        <input type="text" id="nama_relawan" name="nama_relawan" required><br>
        <label for="email">Email</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="no_hp">No. Hp</label><br>
        <input type="tel" id="no_hp" name="no_hp"><br>
        <label for="tanggallahir">Tanggal Lahir</label><br>
        <input type="date" id="tanggallahir" name="tanggallahir"><br>
        <label for="lokasi">Lokasi yang dipilih*</label><br>
        <select id="lokasi" name="lokasi">
            <option value="Wilayah I, Desa Lumban Silintong, Kecamatan Balige, Kabupaten Toba">Wilayah I, Desa Lumban Silintong, Kecamatan Balige, Kabupaten Toba</option>
            <option value="Wilayah II, Desa Sawah Lamo, Kecamatan Andam Dewi, Kabupaten Tapanuli Tengah">Wilayah II, Desa Sawah Lamo, Kecamatan Andam Dewi, Kabupaten Tapanuli Tengah</option>
        </select><br>

        <label for="cv">Unggah CV</label><br>
        <input type="file" id="cv" name="cv" required><br>
        <input type="submit" value="Submit">
    </form>
</div>

@endsection
