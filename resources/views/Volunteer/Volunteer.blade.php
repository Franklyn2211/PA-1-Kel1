@extends("layouts.layout")
@section("title", "Relawan")
@section("content")
<div class="daftar-relawan">
    <h2>Mulailah Perubahan Anda: Daftar Sebagai Relawan Sekarang!</h2>
    <p>Terima kasih atas minat Anda untuk bergabung sebagai relawan kami! Kami sangat menghargai partisipasi Anda dalam mendukung misi dan visi kami.</p>
    <form>
        <label for="nama">Nama*</label><br>
        <input type="text" id="nama" name="nama" required><br>
        <label for="email">Email</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="no-hp">No. Hp</label><br>
        <input type="tel" id="no-hp" name="no-hp"><br>
        <label for="tanggal-lahir">Tanggal Lahir</label><br>
        <input type="date" id="tanggal-lahir" name="tanggal-lahir"><br>
        <label for="lokasi">Lokasi yang di pilih*</label><br>
        <select id="lokasi" name="lokasi">
            <option value="lokasi1">Lokasi 1</option>
            <option value="lokasi2">Lokasi 2</option>
            <option value="lokasi3">Lokasi 3</option>
        </select><br>

        <label for="cv">Unggah CV*</label><br>
        <input type="file" id="cv" name="cv" required><br>
        <input type="submit" value="Submit">
    </form>
</div>

<div class="carousel">
    <div class="carousel-item">
        <img src="gambar1.jpg" alt="Gambar 1">
    </div>
    <div class="carousel-item">
        <img src="gambar2.jpg" alt="Gambar 2">
    </div>
    <div class="carousel-item">
        <img src="gambar3.jpg" alt="Gambar 3">
    </div>
</div>
@endsection