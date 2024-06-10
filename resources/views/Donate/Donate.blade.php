@extends("layouts.layout")
@section("title", "Donasi")
@section("content")

<div class="container-fluid bg-breadcrumb" style="background-image: url('{{ asset('assets/img/hcarausel5.png') }}'); background-size: cover; background-position: center;">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4 wow fadeInDown fw-bolder" data-wow-delay="0.1s">Ayo Donasi</h3>
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
    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif
    <p>Kami mengundang Anda untuk berpartisipasi dalam upaya amal kami dengan memberikan dukungan melalui formulir donasi berikut ini:</p>
    <form method="POST" action="{{ route('donate.store') }}" enctype="multipart/form-data">
        @csrf
        <label for="Name">Nama</label><br>
        <input type="text" id="Name" name="Name" value="{{ old('Name') }}" required>
        @error('Name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <br>

        <label for="Email">Email</label><br>
        <input type="email" id="Email" name="Email" value="{{ old('Email') }}" required>
        @error('Email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <br>

        <label for="Phone_number">No. Hp</label><br>
        <input type="tel" id="Phone_number" name="Phone_number" value="{{ old('Phone_number') }}" pattern="[0-9]{9,15}" required>
        @error('Phone_number')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <br>

        <label for="origin">Asal Daerah</label><br>
        <input type="text" id="origin" name="origin" value="{{ old('origin') }}" pattern="^[\pL\s\-]+$" required>
        @error('origin')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <br>

        <label for="category">Kategori Donasi</label><br>
        <select id="category" name="category" onchange="toggleDonationFields()" required>
            <option value="">Pilih Kategori</option>
            <option value="money" {{ old('category') == 'money' ? 'selected' : '' }}>Donasi Uang</option>
            <option value="goods" {{ old('category') == 'goods' ? 'selected' : '' }}>Donasi Barang</option>
        </select>
        @error('category')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <br>

        <div id="money" style="display: none; width: 100%;">
            <label for="no-rekening">No. Rekening</label><br>
            <span><strong>1687210113<br>BNI a.n Pendidikan Anak Rumah Damai</strong></span><br><br>
            <label for="donation_amount">Jumlah Donasi</label>
            <input type="number" id="donation_amount" name="donation_amount" value="{{ old('donation_amount') }}" style="width: 100%; padding: 10px 15px; border-radius: 25px; border: 1px solid #ccc;">
            @error('donation_amount')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <br><br>
            <label for="evidence_of_transfer">Bukti Transfer</label>
            <input type="file" id="evidence_of_transfer" name="evidence_of_transfer">
            @error('evidence_of_transfer')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <br><br>
        </div>

        <div id="goods" style="display: none; width: 100%;">
            <label for="goods_name">Nama Barang</label>
            <input type="text" id="goods_name" name="goods_name" value="{{ old('goods_name') }}">
            @error('goods_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <br>
            <label for="goods_quantity">Jumlah Barang</label>
            <input type="number" id="goods_quantity" name="goods_quantity" value="{{ old('goods_quantity') }}" style="width: 100%; padding: 10px 15px; border-radius: 25px; border: 1px solid #ccc;">
            @error('goods_quantity')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <br><br>
        </div>

        <label for="Description">Keterangan</label><br>
        <input type="text" id="Description" name="Description" value="{{ old('Description') }}" required>
        @error('Description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <br>
        <input type="submit" value="Submit">
    </form>
</div>

<script>
    function toggleDonationFields() {
        var category = document.getElementById('category').value;
        var uangFields = document.getElementById('money');
        var barangFields = document.getElementById('goods');

        if (category === 'money') {
            uangFields.style.display = 'block';
            barangFields.style.display = 'none';
            document.getElementById('donation_amount').required = true;
            document.getElementById('evidence_of_transfer').required = true;
            document.getElementById('goods_name').required = false;
            document.getElementById('goods_quantity').required = false;
        } else if (category === 'goods') {
            uangFields.style.display = 'none';
            barangFields.style.display = 'block';
            document.getElementById('donation_amount').required = false;
            document.getElementById('evidence_of_transfer').required = false;
            document.getElementById('goods_name').required = true;
            document.getElementById('goods_quantity').required = true;
        } else {
            uangFields.style.display = 'none';
            barangFields.style.display = 'none';
            document.getElementById('donation_amount').required = false;
            document.getElementById('evidence_of_transfer').required = false;
            document.getElementById('goods_name').required = false;
            document.getElementById('goods_quantity').required = false;
        }
    }
    // Panggil fungsi untuk menampilkan atau menyembunyikan field sesuai nilai yang di submit
    toggleDonationFields();
</script>

@endsection
