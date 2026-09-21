<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    // TODO: ganti dua array ini dengan query ke tabel `anggota` dan `jenis_pekerjaan`.
    private array $daftarAnggota = [
        ['no_anggota' => '2024001', 'nama' => 'Ahmad Fauzi', 'wa' => '0812-xxxx-xxxx', 'email' => 'ahmad@example.com', 'alamat' => 'Ds. Sukamaju', 'role' => 'Anggota', 'aktif' => true],
        ['no_anggota' => '2024002', 'nama' => 'Budi Santoso', 'wa' => '0813-xxxx-xxxx', 'email' => 'budi@example.com', 'alamat' => 'Ds. Sukamaju', 'role' => 'Admin', 'aktif' => true],
        ['no_anggota' => '2024003', 'nama' => 'Siti Aminah', 'wa' => '0821-xxxx-xxxx', 'email' => 'siti@example.com', 'alamat' => 'Ds. Sukamaju', 'role' => 'Anggota', 'aktif' => true],
        ['no_anggota' => '2024004', 'nama' => 'Dedi Kurniawan', 'wa' => '0857-xxxx-xxxx', 'email' => 'dedi@example.com', 'alamat' => 'Ds. Sukamaju', 'role' => 'Anggota', 'aktif' => false],
    ];

    private array $daftarPekerjaan = [
        ['nama' => 'Pemupukan', 'deskripsi' => 'Pemupukan lahan sesuai jadwal musim tanam', 'jumlah_dibutuhkan' => 4],
        ['nama' => 'Panen padi', 'deskripsi' => 'Pemanenan padi yang sudah siap panen', 'jumlah_dibutuhkan' => 8],
        ['nama' => 'Bersih saluran', 'deskripsi' => 'Pembersihan saluran irigasi', 'jumlah_dibutuhkan' => 3],
    ];

    public function __construct()
    {
        // Demo role switcher: tambahkan ?role=admin di URL buat lihat tampilan Admin.
        // TODO: ganti jadi auth()->user()->role setelah login beneran diimplementasikan.
        View::share('role', request()->query('role', 'anggota'));
    }

    public function login()
    {
        return view('auth.login');
    }

    public function attemptLogin(Request $request)
    {
        $request->validate([
            'no_anggota' => 'required',
            'password' => 'required',
        ]);

        // TODO: ganti dengan logika autentikasi beneran.
        // Contoh arah implementasi (sesuai tabel `anggota` di ERD):
        //
        //   $anggota = Anggota::where('nomor_anggota', $request->no_anggota)->first();
        //   if (! $anggota || ! Hash::check($request->password, $anggota->password)) {
        //       return back()->withErrors(['no_anggota' => 'No. anggota atau kata sandi salah.']);
        //   }
        //   Auth::login($anggota);
        //
        // Untuk sekarang, langsung redirect ke Beranda tanpa validasi kredensial.
        return redirect()->route('beranda');
    }

    public function beranda()
    {
        // TODO: ganti data dummy ini dengan query ke tabel jadwal & upah
        // milik anggota yang sedang login.
        $tugasHariIni = 'Pemupukan — sesi pagi';
        $upahHarian = 85000;
        $pengumuman = 'Jadwal minggu depan sudah diperbarui.';

        return view('beranda', compact('tugasHariIni', 'upahHarian', 'pengumuman'));
    }

    public function penugasan()
    {
        // TODO: ganti dengan query ke tabel `jadwal`, urutkan berdasarkan tanggal,
        // tandai baris "hari ini" berdasarkan tanggal server.
        $daftarTugas = [
            ['tanggal' => '4 Sep', 'pekerjaan' => 'Pemupukan', 'petugas' => 'Budi S.', 'status' => 'Hari ini', 'hari_ini' => true],
            ['tanggal' => '1 Sep', 'pekerjaan' => 'Panen padi', 'petugas' => 'Siti A.', 'status' => 'Selesai', 'hari_ini' => false],
            ['tanggal' => '30 Agu', 'pekerjaan' => 'Bersih saluran', 'petugas' => 'Budi S.', 'status' => 'Selesai', 'hari_ini' => false],
        ];

        return view('penugasan', compact('daftarTugas'));
    }

    public function presensi()
    {
        // TODO: ganti dengan query ke tabel `presensi` milik anggota yang login.
        $riwayatPresensi = [
            ['tanggal' => '4 Sep', 'masuk' => '06.58', 'keluar' => null, 'status' => 'Hari ini', 'hari_ini' => true],
            ['tanggal' => '1 Sep', 'masuk' => '07.02', 'keluar' => '11.30', 'status' => 'Hadir', 'hari_ini' => false],
            ['tanggal' => '30 Agu', 'masuk' => '06.55', 'keluar' => '11.15', 'status' => 'Hadir', 'hari_ini' => false],
        ];
        $sudahCheckinHariIni = true; // dummy — nanti cek dari data presensi hari ini

        return view('presensi', compact('riwayatPresensi', 'sudahCheckinHariIni'));
    }

    public function upah()
    {
        // TODO: ganti dengan query ke tabel `upah`, jumlahkan berdasarkan status_pembayaran.
        $riwayatUpah = [
            ['tanggal' => '4 Sep', 'pekerjaan' => 'Pemupukan', 'jumlah' => 85000, 'dibayar' => false],
            ['tanggal' => '1 Sep', 'pekerjaan' => 'Panen padi', 'jumlah' => 95000, 'dibayar' => true],
            ['tanggal' => '30 Agu', 'pekerjaan' => 'Bersih saluran', 'jumlah' => 80000, 'dibayar' => true],
        ];
        $totalBulanIni = array_sum(array_column($riwayatUpah, 'jumlah'));
        $belumDibayar = array_sum(array_column(array_filter($riwayatUpah, fn($u) => !$u['dibayar']), 'jumlah'));

        return view('upah', compact('riwayatUpah', 'totalBulanIni', 'belumDibayar'));
    }

    public function profil()
    {
        // TODO: ganti dengan auth()->user() setelah login beneran diimplementasikan.
        $anggota = [
            'nama' => 'Ahmad Fauzi',
            'inisial' => 'AF',
            'no_anggota' => '2024001',
            'wa' => '0812-xxxx-xxxx',
            'status' => 'Aktif',
            'role' => 'Anggota',
        ];

        return view('profil', compact('anggota'));
    }

    public function kelolaAnggota()
    {
        $daftarAnggota = $this->daftarAnggota;

        return view('kelola-anggota', compact('daftarAnggota'));
    }

    public function formAnggotaTambah()
    {
        return view('form-anggota', ['mode' => 'tambah', 'data' => null]);
    }

    public function formAnggotaEdit(string $no_anggota)
    {
        $data = collect($this->daftarAnggota)->firstWhere('no_anggota', $no_anggota);

        return view('form-anggota', ['mode' => 'edit', 'data' => $data]);
    }

    public function simpanAnggota(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'no_anggota' => 'required',
            'wa' => 'required',
        ]);

        // TODO: simpan/update ke tabel `anggota` beneran (masih dummy, belum tersambung database).
        return redirect()->route('kelola.anggota', ['role' => 'admin'])
            ->with('sukses', 'Data anggota berhasil disimpan (dummy, belum tersambung ke database).');
    }

    public function kelolaPekerjaan()
    {
        $daftarPekerjaan = $this->daftarPekerjaan;

        return view('kelola-pekerjaan', compact('daftarPekerjaan'));
    }

    public function formPekerjaanTambah()
    {
        return view('form-pekerjaan', ['mode' => 'tambah', 'data' => null]);
    }

    public function formPekerjaanEdit(string $nama)
    {
        $data = collect($this->daftarPekerjaan)->firstWhere('nama', $nama);

        return view('form-pekerjaan', ['mode' => 'edit', 'data' => $data]);
    }

    public function simpanPekerjaan(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jumlah_dibutuhkan' => 'required|integer|min:1',
        ]);

        // TODO: simpan/update ke tabel `jenis_pekerjaan` beneran (masih dummy, belum tersambung database).
        return redirect()->route('kelola.pekerjaan', ['role' => 'admin'])
            ->with('sukses', 'Data jenis pekerjaan berhasil disimpan (dummy, belum tersambung ke database).');
    }

    public function laporan()
    {
        // TODO: ganti dengan query agregat ke tabel jadwal/presensi/upah,
        // difilter berdasarkan periode_mulai & periode_selesai (lihat tabel `laporan` di ERD).
        $totalTugasSelesai = 27;
        $totalUpahDibayarkan = 2295000;
        $tingkatKehadiran = 92;

        $rekapAnggota = [
            ['nama' => 'Ahmad Fauzi', 'tugas_selesai' => 9, 'total_upah' => 765000, 'kehadiran' => 95],
            ['nama' => 'Budi Santoso', 'tugas_selesai' => 11, 'total_upah' => 935000, 'kehadiran' => 100],
            ['nama' => 'Siti Aminah', 'tugas_selesai' => 7, 'total_upah' => 595000, 'kehadiran' => 82],
        ];

        return view('laporan', compact('totalTugasSelesai', 'totalUpahDibayarkan', 'tingkatKehadiran', 'rekapAnggota'));
    }
}
