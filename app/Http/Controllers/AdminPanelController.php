<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\AkreditasiInstitutiModel;
use App\Models\AkreditasiSectionModel;
use App\Models\AlamatInstitusiModel;
use App\Models\BiayaStudi;
use App\Models\data_institusi;
use App\Models\Fasilitas;
use App\Models\Pengumuman;
use App\Models\EmailModel;
use App\Models\HeroSectionModel;
use App\Models\InfografisModel;
use App\Models\JadwalUjianModel;
use App\Models\MbkmModel;
use App\Models\ModelHeaderAdmisi;
use App\Models\NomorTeleponModel;
use App\Models\PdfBiayaModel;
use App\Models\Prestasi;
use App\Models\SocalMediaModel;
use App\Models\JalurPendaftaranModel;
use App\Models\BiayaAdminModel;
use App\Models\SubJalurPendaftaran;
use App\Models\JadwalPendaftaranModel;
use App\Models\BiayaPendaftaranModel;
use App\Models\PedomanPendaftaranModel;
use App\Models\Lokasi;
use App\Models\JenisTes;
use App\Models\Major;
use App\Models\prodi;
use App\Models\Course;
use App\Models\Faculty;
use App\Models\Employee;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;
use App\Models\CoverFaq;
use App\Models\Faq;
use App\Models\MitraModel;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use App\Models\Form;
use App\Models\Beasiswa;

class AdminPanelController extends Controller
{
    public function getAdminPanel()
    {
        $admin = Auth::user();
        $dataInstitusi = data_institusi::where('id', 1)->first();
        $dataSocialMedia = SocalMediaModel::all();
        $dataHeroSection = HeroSectionModel::where('id', 1)->first();
        $dataAlamat = AlamatInstitusiModel::all();
        $dataAkreditasiDashboard = AkreditasiSectionModel::where('id', 1)->first();
        $dataNomorTelepon = NomorTeleponModel::all();
        $dataEmail = EmailModel::all();
        $dataAkreditasiInstitusi = AkreditasiInstitutiModel::all()->sortByDesc('tahun_akreditasi');
        $dataMitra = MitraModel::all();

        $data = [
            'indexActive' => 0,
            'admin' => $admin,
            'dataInstitusi' => $dataInstitusi,
            'socialMedia' => $dataSocialMedia,
            'dataHeroSection' => $dataHeroSection,
            'dataAlamat' => $dataAlamat,
            'dataAkreditasiDashboard' => $dataAkreditasiDashboard,
            'dataNomorTelepon' => $dataNomorTelepon,
            'dataEmail' => $dataEmail,
            'dataAkreditasiInstitusi' => $dataAkreditasiInstitusi,
            'dataMitra' => $dataMitra,
        ];

        return view('admin-panel.adminpanel', $data);
    }

    public function ubahDataInstitut(Request $request)
    {
        $dataInstitusi = data_institusi::where('id', 1)->first();

        if ($request->input_logo_institusi) {
            $request->validate([
                'input_logo_institusi' => 'required|image|mimes:jpeg,png,jpg|max:1024',
                'nama_institusi' => 'required|max:30|string',
                'input_singkatan_nama_institusi' => 'required|max:10|string',
                'input_jargon_institusi' => 'required|string|max:50',
                'input_jumlah_dosen' => 'required|numeric',
                'input_jumlah_mahasiswa' => 'required|numeric',
                'input_jumlah_alumni' => 'required|numeric'
            ]);
        }

        else {
            $request->validate([
                'nama_institusi' => 'required|max:30|string',
                'input_singkatan_nama_institusi' => 'required|max:10|string',
                'input_jargon_institusi' => 'required|string|max:50',
                'input_jumlah_dosen' => 'required|numeric',
                'input_jumlah_mahasiswa' => 'required|numeric',
                'input_jumlah_alumni' => 'required|numeric',
            ]);
        }

        if ($request->input_logo_institusi) {
            $photo = $request->file('input_logo_institusi');

            $filename = 'logo_institusi.' . $photo->getClientOriginalExtension();

            $directory = public_path('assets/img/dashboard/');

            if ($dataInstitusi->logo_institusi && file_exists($dataInstitusi->logo_institusi)) {
                unlink($dataInstitusi->logo_institusi);
            }

            $photo->move($directory, $filename);

            $dataInstitusi->logo_institusi = 'assets/img/dashboard/' . $filename;
        }

        $dataInstitusi->nama_institusi = $request->nama_institusi;
        $dataInstitusi->singkatan_nama_institusi = $request->input_singkatan_nama_institusi;
        $dataInstitusi->akreditasi = $request->input_akreditasi;
        $dataInstitusi->jargon = $request->input_jargon_institusi;
        $dataInstitusi->jumlah_dosen = $request->input_jumlah_dosen;
        $dataInstitusi->jumlah_mahasiswa = $request->input_jumlah_mahasiswa;
        $dataInstitusi->jumlah_alumni = $request->input_jumlah_alumni;

        $dataInstitusi->update();

        return redirect()->route('admin-panel');
    }

    public function getEditProfile()
    {
        $admin = Auth::user();

        $data = [
            'admin' => $admin,
        ];

        return view('admin-panel.edit_profile', $data);
    }

    public function getFasilitasAdmin()
    {
        $admin = Auth::user();
        $fasilitas = Fasilitas::orderBy('created_at', 'desc')->get();
        $data = [
            'indexActive' => 2,
            'admin' => $admin,
            'fasilitas' => $fasilitas,
        ];
        return view('admin-panel.view_fasilitas_lists', $data);
    }

    public function getAddFasilitas()
    {
        $admin = Auth::user();
        $data = [
            'indexActive' => 2,
            'admin' => $admin
        ];
        return view('admin-panel.sub_admin_panel.fasilitasAddpanel', $data);
    }

    public function postFasilitas(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'nama_fasilitas' => 'required',
            'deskripsi_fasilitas' => 'required',
            'nama_file' => 'required',
            'file_gambar' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ], [
            'required' => 'Kolom :attribute wajib diisi.',
            'file_gambar.required' => 'File gambar wajib diunggah.',
            'file_gambar.image' => 'File harus berupa gambar.',
            'file_gambar.mimes' => 'Kolom :attribute wajib diisi dengan format file jpeg, jpg, atau png.',
            'file_gambar.max' => 'Ukuran file tidak boleh lebih dari 2 MB.',
        ]);

        // Ambil ekstensi file gambar
        $fileExtension = $request->file_gambar->extension();

        $judulFasilitasTanpaSpasi = str_replace(' ', '_', $request->nama_file);

        // Nama file gabungan dengan ekstensi
        $namaGambar = $judulFasilitasTanpaSpasi . '.' . $fileExtension;

        // Pindahkan file gambar ke direktori yang ditentukan
        $request->file_gambar->move(public_path('assets/img/fasilitas'), $namaGambar);

        // Buat instance Fasilitas
        $fasilitas = new Fasilitas;

        // Set nilai atribut fasilitas
        $fasilitas->kategori = $request->kategori;
        $fasilitas->nama_fasilitas = $request->nama_fasilitas;
        $fasilitas->deskripsi_fasilitas = $request->deskripsi_fasilitas;
        $fasilitas->nama_file = $request->nama_file;
        $fasilitas->file_gambar = $namaGambar;

        // Simpan data ke database
        $fasilitas->save();

        // Redirect atau berikan respons sesuai kebutuhan
        return redirect()->route('fasilitas-admin');
    }

    public function postEditFasilitas(Request $request)
    {
        // Mendapatkan user yang sedang login
        $admin = Auth::user();

        $request->validate([
            'id' => 'required|exists:fasilitas',
            'kategori' => 'required',
            'nama_fasilitas' => 'required',
            'deskripsi_fasilitas' => 'required',
            'nama_file' => 'required',
            'file_gambar' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ], [
            'required' => 'Kolom :attribute wajib diisi.',
            'file_gambar.image' => 'File harus berupa gambar.',
            'file_gambar.mimes' => 'Kolom :attribute wajib diisi dengan format file jpeg, jpg, atau png.',
            'file_gambar.max' => 'Ukuran file tidak boleh lebih dari 2 MB.',
        ]);

        // Mengambil data fasilitas berdasarkan ID
        $fasilitas = Fasilitas::where("id", $request->id)->first();

        if ($fasilitas) {
            // Mengupdate data fasilitas
            $fasilitas->kategori = $request->kategori;
            $fasilitas->nama_fasilitas = $request->nama_fasilitas;
            $fasilitas->deskripsi_fasilitas = $request->deskripsi_fasilitas;
            $fasilitas->nama_file = $request->nama_file;
            // Mengupload gambar baru jika ada
            if ($request->hasFile('file_gambar')) {
                $gambar = $request->file('file_gambar');
                $fileExtension = $request->file_gambar->extension();
                $nama_gambar = $request->nama_file . '.' . $fileExtension;
                $gambar->move(public_path('path_ke_folder_upload'), $nama_gambar);

                // Update both nama_file and file_gambar
                $fasilitas->nama_file = $request->nama_file;
                $fasilitas->file_gambar = $nama_gambar;
            }

            // Menyimpan perubahan
            $fasilitas->save();
        }

        // Redirect dengan pesan sukses
        return redirect()->route('fasilitas-admin')->with('success', 'Fasilitas berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $admin = Auth::user();
        $fasilitas = Fasilitas::find($id);

        if ($fasilitas) {
            $fasilitas->delete();
        }

        $data = [
            'indexActive' => 2,
            'admin' => $admin,
            'fasilitas' => $fasilitas,
        ];

        return $this->getFasilitasAdmin();
    }

    public function getPengumumanAdmin()
    {
        $admin = Auth::user();
        $pengumuman = Pengumuman::orderBy('created_at', 'desc')->get();
        $data = [
            'indexActive' => 2,
            'admin' => $admin,
            'pengumuman' => $pengumuman,
        ];
        return view('admin-panel.view_pengumuman_lists', $data);
    }

    public function getAddPengumuman()
    {
        $admin = Auth::user();
        $data = [
            'indexActive' => 2,
            'admin' => $admin
        ];
        return view('admin-panel.sub_admin_panel.pengumumanAddpanel', $data);
    }

    public function postEditPengumuman(Request $request)
    {
        $admin = Auth::user();

        $request->validate([
            'id' =>'required|exists:pengumuman',
            'kategoriPengumuman' => 'required',
            'judulPengumuman' => 'required',
            'filePengumuman' => 'nullable|mimes:pdf',
            'tanggalPengumuman' => 'required',
        ], [
            'required' => 'Kolom :attribute wajib diisi.',
            'filePengumuman.required' => 'File pengumuman wajib diunggah.',
            'filePengumuman.mimes' => 'File pengumuman harus dalam format PDF.',
            'filePengumuman.max' => 'Ukuran file tidak boleh lebih dari 2 MB.',
        ]);

        $pengumuman = Pengumuman::where("id", $request->id)->first();

        if ($pengumuman){
            $pengumuman->kategoriPengumuman = $request->kategoriPengumuman;
            $pengumuman->judulPengumuman = $request->judulPengumuman;
            $pengumuman->tanggalPengumuman = $request->tanggalPengumuman;

            if($request->hasFile('filePengumuman')){
                $file = $request->file('filePengumuman');
                $fileExtension = $request->filePengumuman->extension();
                $namaFile = $request->judulPengumuman . '.' . $fileExtension;
                $file->move(public_path('assets/file_Pengumuman'), $namaFile);

                $pengumuman->filePengumuman = $namaFile;
            }

            $pengumuman->save();
        }

        return redirect()->route('pengumuman-panel');
    }


    public function addSocialMedia(Request $request)
    {
        $request->validate([
            'input_nama_social_media' => 'required|string|max:50',
            'input_link_social_media' => 'required|string|max:150',
            'input_logo_social_media' => 'required|string|max:100',
        ]);

        $username = Auth::user()->username;

        SocalMediaModel::create([
            'nama' => $request->input_nama_social_media,
            'link' => $request->input_link_social_media,
            'icon' => $request->input_logo_social_media,
            'created_by' => $username,
            'updated_by' => $username,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect('admin-panel');
    }

    public function updateSocialMedia (Request $request) {

        $socialMedia = SocalMediaModel::where('id', $request->id)->first();

        $request->validate([
            'input_nama_socialmedia' => 'required|string|max:50',
            'input_link' => 'required|string|max:150',
            'input_icon' => 'required|string|max:100',
        ]);

        $socialMedia->nama = $request->input_nama_socialmedia;
        $socialMedia->link = $request->input_link;
        $socialMedia->icon = $request->input_icon;

        $socialMedia->updated_by = Auth::user()->username;

        $socialMedia->update();

        return redirect()->route('admin-panel');
    }

    public function removeSocialMedia(Request $request)
    {
        SocalMediaModel::where('id', $request->id)->first()->delete();
        return redirect()->back();
    }

    public function updateHeroSection(Request $request)
    {
        $request->validate([
            'input_judul_header' => 'required|string|max:50',
            'input_deskripsi_header' => 'required|string|max:300'
        ]);

        $dataHero = HeroSectionModel::where('id', 1)->first();

        $dataHero->header = $request->input_judul_header;
        $dataHero->paragraph = $request->input_deskripsi_header;

        if ($request->input_bg_hero) {
            $request->validate([
                'input_bg_hero' => 'image|mimes:jpeg,png,jpg|max:1024',
            ]);

            // Mengambil file yang sudah divalidasi dari request
            $photo = $request->file('input_bg_hero');

            // Membuat nama unik untuk file yang diunggah
            $filename = time() . '_hero.' . $photo->getClientOriginalExtension();

            // Menentukan direktori tempat penyimpanan file di dalam direktori 'public'
            $directory = public_path('assets/img/dashboard/');

            //Pindahkan file ke direktori yang diinginkan
            $photo->move($directory, $filename);

            // Menghapus photo lama jika ada
            if ($dataHero->bg_image && file_exists($dataHero->bg_image)) {
                unlink($dataHero->bg_image);
            }

            $dataHero->bg_image = 'assets/img/dashboard/' . $filename;
        }

        $dataHero->update();

        return redirect()->back();

    }

    public function getAddAdminView() {
        $admin = Auth::user();
        $admins = AdminModel::all();

        $data = [
            'admin' => $admin,
            'admins' => $admins,
        ];

        return view('admin-panel.add_admin', $data);
    }

    public function addAlamat (Request $request) {
        $request->validate([
            'input_nama_alamat' => 'required|max:50',
            'input_alamat' => 'required|max:150',
        ]);

        AlamatInstitusiModel::create([
            'nama' => $request->input_nama_alamat,
            'alamat' => $request->input_alamat,
            'created_by' => Auth::user()->username
        ]);

        return redirect()->route('admin-panel');
    }

    public function editAlamat (Request $request) {
        $request->validate([
            'input_nama_alamat' => 'required|string|max:50',
            'input_alamat' => 'required|string|max:150'
        ]);

        $username = Auth::user()->username;
        $alamat = AlamatInstitusiModel::where('id', $request->id)->first();

        $alamat-> nama = $request->input_nama_alamat;
        $alamat-> alamat = $request->input_alamat;
        $alamat->updated_at = now();
        $alamat->updated_by = $username;

        $alamat->update();

        return redirect()->back();
    }

    public function removeAlamat(Request $request)
    {
        try {
            AlamatInstitusiModel::where('id', $request->id)->first()->delete();
            return redirect(null, 200)->back();
        } catch (Exception $e) {
            return redirect(null, 404)->back();
        }
    }
    public function getAdmisiPanel () {
        $admin = Auth::user();
        $dataHeaderAdmisi = ModelHeaderAdmisi::where('id', 1)->first();
        $dataNonKompetisi  = MbkmModel::where('jenis_kegiatan', 'Non Kompetisi')->get();
        $dataKompetisi =  MbkmModel::where('jenis_kegiatan', 'Kompetisi')->get();
        $jalur = JalurPendaftaranModel::all();
        $jadwalPendaftaran = JadwalPendaftaranModel::all();
        $dataBiaya = BiayaAdminModel::all();
        $dataInfografis = InfografisModel::all();
        $jalurMasuk = [];
        $lokasi = Lokasi::orderBy('lokasiTes', 'asc')->get();
        $jenis = JenisTes::orderBy('gelombang', 'asc')->get();
        $dataJadwalUjian = JadwalUjianModel::all();
        $dataSubJalurPendaftaran = SubJalurPendaftaran::all();
        $biayaPen = BiayaPendaftaranModel::all();
        $pedomanpendaftaran = PedomanPendaftaranModel::all();
        $PdfbiayaPendaftaran = PdfBiayaModel::all();
        $prodis = prodi::orderBy("created_at", "desc")->get();
        $biayaStudis = BiayaStudi::all();



        foreach (InfografisModel::all() as $e) {
            if (!in_array($e->jalur, $jalurMasuk)) {
                $jalurMasuk[] = $e->jalur;
            }
        }

        $dataInfografisJalurMasuk = [];

        foreach ($jalurMasuk as $e) {
            $dataInfografisJalurMasuk[] = InfografisModel::where('jalur', $e)->get();
        }

        $data = [
            'indexActive' => 1,
            'admin' => $admin,
            'dataHeaderAdmisi' => $dataHeaderAdmisi,
            'dataNonKompetisi' => $dataNonKompetisi,
            'dataKompetisi'=>$dataKompetisi,
            'dataInfografis' => $dataInfografisJalurMasuk,
            'lokasi' => $lokasi,
            'jenis' => $jenis,
            'jalur'=>$jalur,
            'dataBiaya' => $dataBiaya,
            'dataJadwalUjian' => $dataJadwalUjian,
            'jadwalPendaftaran'=>$jadwalPendaftaran,
            'dataSubJalurPendaftaran'=>$dataSubJalurPendaftaran,
            'biayaPen'=>$biayaPen,
            'pedomanpendaftaran' => $pedomanpendaftaran,
            'PdfbiayaPendaftaran'=>$PdfbiayaPendaftaran,
            'prodis' => $prodis,
            'biayaStudis'=>$biayaStudis
        ];
        return view('admin-panel.admisi_panel', $data);
    }

    public function addAkreditasiInstitusi (Request $request) {
        if ($request->sertifikat_akreditasi) {
            $request->validate([
                'akreditasi' => 'required',
                'lembaga_akreditasi' => 'required|string',
                'sertifikat_akreditasi' => 'required|image|mimes:jpeg,png,jpg|max:1024',
                'tahun_akreditasi' => 'required',
            ]);

            // Mengambil file yang sudah divalidasi dari request
            $photo = $request->file('sertifikat_akreditasi');

            // Membuat nama unik untuk file yang diunggah
            $filename = time() . '_sertifikat_institusi.' . $photo->getClientOriginalExtension();

            // Menentukan direktori tempat penyimpanan file di dalam direktori 'public'
            $directory = public_path('assets/img/dashboard/');

            //Pindahkan file ke direktori yang diinginkan
            $photo->move($directory, $filename);

            AkreditasiInstitutiModel::create([
                'akreditasi' => $request->akreditasi,
                'lembaga_akreditasi' => $request->lembaga_akreditasi,
                'sertifikat_akreditasi' => 'assets/img/dashboard/' . $filename,
                'tahun_akreditasi' => $request->tahun_akreditasi,
            ]);
        }

        return redirect()->route('admin-panel');
    }

    public function removeNomorTelepon (Request $request) {
        try {
            NomorTeleponModel::where('id', $request->id)->first()->delete();
            return redirect(null, 200)->route('admin-panel');
        } catch (\Exception $e) {
            abort(404, 'ID nomor telepon tidak ditemukan');
        }
    }

    public function addNomorTelepon (Request $request) {
        $request->validate([
            'namaNomorTelepon' => 'required|string|max:20',
            'nomorTelepon' => 'required|string|max:15'
        ]);

        try {
            $username = Auth::user()->username;

            NomorTeleponModel::create([
                'nama' => $request->namaNomorTelepon,
                'nomor_telepon' => $request->nomorTelepon,
                'updated_at' => now(),
                'created_at' => now(),
                'created_by' => $username,
                'updated_by' => $username,
            ]);

            return redirect(null, 200)->route('admin-panel');
        } catch (Exception $e) {
            abort(403, 'Gagal Menambah Nomor Telepon');
        }
    }

    public function removeAkreditasi (Request $request) {
        try {
            AkreditasiInstitutiModel::where('id', $request->id)->first()->delete();

            return redirect(null, 200)->route('admin-panel');
        } catch (\Exception $e) {
            abort(404, 'ID tidak ditemukan');
        }
    }

    public function destroyLokasi($id)
    {
        $admin = Auth::user();
        $lokasi = Lokasi::find($id);

        if ($lokasi) {
            $lokasi->delete();
        }

        $data = [
            'indexActive' => 2,
            'admin' => $admin,
            'lokasi' => $lokasi,
        ];

        return $this->getAdmisiPanel();
    }

    public function destroyJenisTes($id)
    {
        $admin = Auth::user();
        $jenis = JenisTes::find($id);

        if($jenis){
            $jenis->delete();
        }

        $data = [
            'indexActive' => 2,
            'admin' => $admin,
            'jenis' => $jenis,
        ];

        return $this->getAdmisiPanel();
    }

    public function postEditlokasi(Request $request)
    {
        // Mendapatkan user yang sedang login
        $admin = Auth::user();

        $request->validate([
            'id' => 'required|exists:lokasi',
            'lokasiTes' => 'required',
            'alamatLokasi' => 'required',
        ]);

        // Mengambil data fasilitas berdasarkan ID
        $lokasi = Lokasi::where("id", $request->id)->first();

        if ($lokasi) {
            // Mengupdate data fasilitas
            $lokasi->lokasiTes = $request->lokasiTes;
            $lokasi->alamatLokasi = $request->alamatLokasi;

            // Menyimpan perubahan
            $lokasi->save();
    }
    // Redirect dengan pesan sukses
    return $this->getAdmisiPanel();
    }

    public function postEditJenis(Request $request)
    {
        // Mendapatkan user yang sedang login
        $admin = Auth::user();

        $request->validate([
            'id' => 'required|exists:jenis',
            'gelombang' => 'required',
            'jenisUjian' => 'required',
        ]);

        // Mengambil data fasilitas berdasarkan ID
        $jenis = JenisTes::where("id", $request->id)->first();

        if ($jenis) {
            // Mengupdate data fasilitas
            $jenis->gelombang = $request->gelombang;
            $jenis->jenisUjian = $request->jenisUjian;

            // Menyimpan perubahan
            $jenis->save();
    }
    // Redirect dengan pesan sukses
    return $this->getAdmisiPanel();
    }

    public function updateAkreditasiSection(Request $request) {
        $request->validate([
            'input_header' => 'required|string|max:20',
            'input_deskripsi' => 'required|string|max:250',
        ]);

        $akreditasiSection = AkreditasiSectionModel::where('id', 1)->first();

        $akreditasiSection->header = $request->input_header;
        $akreditasiSection->description = $request->input_deskripsi;
        $akreditasiSection->updated_at = now();

        $akreditasiSection->update();

        return redirect()->back();
    }


    public function getProgramPanel () {
        $admin = Auth::user();
        $faculties = Faculty::all();
        $majors = Major::all();
        $employees = Employee::with('major')->get();
        $courses = Course::all();

        $data = [
            'indexActive' => 2,
            'admin' => $admin,
            'faculties'=>$faculties,
            'majors'=>$majors,
            'employees'=>$employees,
            'courses'=>$courses,
        ];
        return view('admin-panel.program_panel', $data);
    }

    public function getPrestasiPanel () {
        $admin = Auth::user();
        $data = [
            'indexActive' => 2,
            'admin' => $admin,
            'dataPrestasi' => Prestasi::orderBy('created_at', 'desc')->get(),
        ];
        return view('admin-panel.prestasi_panel', $data);
    }

    public function getTestimoniPanel()
    {
        $admin = Auth::user();

        $data = [
            'indexActive' => 2,
            'admin' => $admin,
            'dataTestimoni' => Testimoni::orderBy('created_at', 'desc')->get(),
        ];

        return view('admin-panel.testimoni_panel', $data);
    }

    public function addMitra (Request $request) {
        $request->validate([
            'input_logo' => 'image|mimes:jpeg,png,jpg|max:1024',
        ]);

        // Mengambil file yang sudah divalidasi dari request
        $photo = $request->file('input_logo');

        // Membuat nama unik untuk file yang diunggah
        $filename = time() . '_mitra.' . $photo->getClientOriginalExtension();

        // Menentukan direktori tempat penyimpanan file di dalam direktori 'public'
        $directory = public_path('assets/img/dashboard/mitra');

        //Pindahkan file ke direktori yang diinginkan
        $photo->move($directory, $filename);

        MitraModel::create([
            'nama' => $request->input_nama_mitra,
            'logo' => 'assets/img/dashboard/mitra/' . $filename,
            'created_by' => Auth::user()->username
        ]);

        return redirect()->route('admin-panel');
    }

    public function editMitra(Request $request)
    {
        $username = Auth::user()->username;
        $mitra = MitraModel::where('id', $request->id)->first();
    
        if (!$mitra) {
            // Handle the case where MitraModel with the given ID is not found
            return redirect()->back()->with('error', 'Mitra not found');
        }
    
        $mitra->nama = $request->input_nama_mitra;
        
        if ($request->input_logo) {
            $request->validate([
                'input_logo' => 'image|mimes:jpeg,png,jpg|max:1024',
            ]);
    
            // Mengambil file yang sudah divalidasi dari request
            $photo = $request->file('input_logo');
    
            // Membuat nama unik untuk file yang diunggah
            $filename = time() . '_logo_mitra.' . $photo->getClientOriginalExtension();
    
            // Menentukan direktori tempat penyimpanan file di dalam direktori 'public'
            $directory = public_path('assets/img/dashboard/mitra/');
    
            // Pindahkan file ke direktori yang diinginkan
            $photo->move($directory, $filename);
    
            // Menghapus photo lama jika ada
            if ($mitra->logo && file_exists($mitra->logo)) {
                unlink($mitra->logo);
            }
    
            $mitra->logo = 'assets/img/dashboard/mitra/' . $filename;
        }
    
        $mitra->updated_at = now();
        $mitra->updated_by = $username;
    
        $mitra->save();
    
        return redirect()->back()->with('success', 'Mitra updated successfully');
    }
    

    public function removeMitra(Request $request)
    {
        MitraModel::where('id', $request->id)->first()->delete();
        return redirect()->back();
    }

    public function getviewMitra(){
        $mitra = MitraModel::all();
        $data['mitra'] = $mitra;
        return view('mitra.mitra', $data);
    }

    public function getFaqPanel () {
        $admin = Auth::user();
        $faqs = Faq::where('id', 1)->first();

        $data = [
            'indexActive' => 7,
            'admin' => $admin,
            'faqs' => $faqs,
        ];

        dd($faqs);
        return view('admin-panel.faq_admin', $data);
    }

    public function getFaqAdmin()
    {
        $admin = Auth::user();
        $faq = Faq::orderBy('created_at', 'desc')->get();
        $data = [
            'indexActive' => 7,
            'admin' => $admin,
            'faq' => $faq,
        ];
        return view('admin-panel.faq_admin', $data);
    }

    public function getAddFaq()
    {
        $admin = Auth::user();
        $data = [
            'indexActive' => 7,
            'admin' => $admin
        ];
        return view('admin-panel.sub_admin_panel.faqAdminpanel', $data);
    }

    public function postFaq(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'pertanyaan' => 'required',
            'jawaban' => 'required'
        ]);
    
    // Buat instance Faq
    $faq = new Faq;

    // Set nilai atribut faq
    $faq->kategori = $request->kategori;
    $faq->pertanyaan = $request->pertanyaan;
    $faq->jawaban = $request->jawaban;

    // Simpan data ke database
    $faq->save();

    // Redirect atau berikan respons sesuai kebutuhan
    return redirect()->route('faq-admin');
    }

    public function postEditFaq(Request $request)
    {
        // Mendapatkan user yang sedang login
        $admin = Auth::user();

        $request->validate([
            'id' => 'required|exists:faq',
            'kategori' => 'required',
            'pertanyaan' => 'required',
            'jawaban' => 'required'
        ]);

        // Mengambil data fasilitas berdasarkan ID
        $faq = Faq::where("id", $request->id)->first();

        if ($faq) {
            // Mengupdate data fasilitas
            $faq->kategori = $request->kategori;
            $faq->pertanyaan = $request->pertanyaan;
            $faq->jawaban = $request->jawaban;
        
            // Menyimpan perubahan
            $faq->save();
    }
    // Redirect dengan pesan sukses
    return redirect()->route('faq-admin')->with('success', 'FAQ berhasil diperbarui.');
    }

    public function destroyFaq($id)
    {
        $admin = Auth::user();
        $faq = Faq::find($id);

        if ($faq) {
            $faq->delete();
        }
    
        $data = [
            'indexActive' => 7,
            'admin' => $admin,
            'faq' => $faq,
        ];

        return $this->getFaqAdmin();
    }

    public function showAdminView()
    {
        $formData = Form::all(); // Ambil semua data dari tabel forms

        return view('admin.view', compact('formData'));
    }

    public function getFormPanel () {
        $admin = Auth::user();
        $forms = Form::orderBy("created_at", "desc")->get();
        
        $data = [
            'indexActive' => 9,
            'admin' => $admin,
            'forms' => $forms
        ];
        return view('admin-panel.form_panel.form', $data);
    }

    public function beasiswa() {
        $admin = Auth::user();
        $beasiswa = Beasiswa::all();
    
        $data = [
            'indexActive' => 8,
            'admin' => $admin,
            'beasiswa' => $beasiswa
        ];
    
        return view('admin-panel.sub_beasiswa_panel.index', $data);
    }

}
