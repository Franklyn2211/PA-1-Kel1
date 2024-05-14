@extends("layouts.layout")
@section("title", "Donasi")
@section("content")

<div class="container-fluid bg-breadcrumb" style="background-image: url('{{ asset('assets/img/hcarausel5.png') }}'); background-size: cover; background-position: center;">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Ayo Donasi</h1>
        <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active text-primary">Donasi</li>
        </ol>
    </div>
</div>
<div class="daftar-relawan">
    <h2>Berikan Harapan, Berbagi Berkah: Donasi Sekarang!</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <p>Kami mengundang Anda untuk berpartisipasi dalam upaya amal kami dengan memberikan dukungan melalui formulir donasi berikut ini:</p>
    <form method="POST" action="{{ route('donate.store') }}" enctype="multipart/form-data">
        @csrf
        <label for="Name">Nama*</label><br>
        <input type="text" id="Name" name="Name" required><br>
        <label for="Email">Email*</label><br>
        <input type="email" id="Email" name="Email" required><br>
        <label for="Phone_number">No. Hp*</label><br>
        <input type="tel" id="phone" name="Phone_number" pattern="[0-9]{9,15}" required><br>
        <label for="asaldaerah">Asal Daerah*</label><br>
        <input type="text" id="asaldaerah" name="asaldaerah" required><br>
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
