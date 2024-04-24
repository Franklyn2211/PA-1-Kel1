@extends("layouts.layout")
@section("title", "Donasi")
@section("content")
<div class="daftar-relawan">
    <h2>Berikan Harapan, Berbagi Berkah: Donasi Sekarang!</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endifa
    <p>Kami mengundang Anda untuk berpartisipasi dalam upaya amal kami dengan memberikan dukungan melalui formulir donasi berikut ini:</p>
    <form method="POST" action="{{ route('donate.store') }}" enctype="multipart/form-data">
        @csrf
        <label for="Name">Nama*</label><br>
        <input type="text" id="Name" name="Name" required><br>
        <label for="Email">Email*</label><br>
        <input type="email" id="Email" name="Email" required><br>
        <label for="Phone_number">No. Hp*</label><br>
        <input type="tel" id="Phone_number" name="Phone_number" required><br>
        <label for="no-rekening">No. Rekening*</label><br>
        <span><strong>1687210113<br>
        BNI a.n Pendidikan Anak Rumah Damai</strong></span><br>
        <label for="donation_amount">Jumlah Donasi*</label><br>
        <input type="number" id="donation_amount" name="donation_amount" style="width: 100%; padding: 10px 15px; border-radius: 25px; border: 1px solid #ccc;" required><br>
        <label for="evidence_of_transfer">Bukti Transfer*</label><br>
        <input type="file" id="evidence_of_transfer" name="evidence_of_transfer" required><br>
        <label for="Description">Keterangan*</label><br>
        <input type="text" id="Description" name="Description" required><br>
        <input type="submit" value="Submit">
    </form>
</div>
@endsection
