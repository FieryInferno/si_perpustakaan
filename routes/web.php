<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\PencarianController::class, 'index']);
Route::get('/pencarian', [App\Http\Controllers\PencarianController::class, 'index']);
Route::get('/pengunjung', [App\Http\Controllers\PencarianController::class, 'pengunjung'])->name('pengunjung');
Route::post('/entri-kunjungan', [App\Http\Controllers\PencarianController::class, 'entriPengunjung'])->name('pengunjung');
Route::get('/buku-tamu', [App\Http\Controllers\PencarianController::class, 'tamu'])->name('tamu');
Route::post('/entri-buku-tamu', [App\Http\Controllers\PencarianController::class, 'entriTamu'])->name('entri-buku-tamu');

//


Auth::routes();
// admin middleware
Route::middleware(['is_admin'])->group(function () {
  Route::prefix('admin')->group(function () {
    Route::prefix('pengguna')->group(function () {
      Route::get('/hapus/{id}', [App\Http\Controllers\HakAksesController::class, 'hapusPengguna']);
      Route::get('/edit/{id}', [App\Http\Controllers\HakAksesController::class, 'editPengguna']);
      Route::post('/edit', [App\Http\Controllers\HakAksesController::class, 'editPengguna'])->name('admin/pengguna/edit');
    });
  });
});

Route::get('/dashboard-admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin')->middleware('is_admin');
Route::get('/dashboard-petugas', [App\Http\Controllers\HomeController::class, 'petugas'])->name('petugas')->middleware('petugas');
Route::get('/pengguna', [App\Http\Controllers\HakAksesController::class, 'index'])->name('admin-akses-pengguna')->middleware('is_admin');
Route::get('/tambah-pengguna', [App\Http\Controllers\HakAksesController::class, 'tambahPengguna'])->name('admin-pengguna')->middleware('is_admin');
Route::post('/simpan-pengguna', [App\Http\Controllers\HakAksesController::class, 'simpanPengguna'])->name('admin-tambah')->middleware('is_admin');
Route::get('/laporan-data-anggota', [App\Http\Controllers\LaporanController::class, 'anggota'])->name('laporan-data-anggota')->middleware('is_admin');
Route::get('/cetak-data-anggota-tgl/', [App\Http\Controllers\LaporanController::class, 'cetakAnggotaPerTanggal'])->name('cetak-data-anggota-tgl')->middleware('is_admin');
Route::get('/cetak-data-anggota', [App\Http\Controllers\LaporanController::class, 'cetakAnggota'])->name('cetak-data-anggota')->middleware('is_admin');

Route::get('/laporan-katalog', [App\Http\Controllers\LaporanController::class, 'katalog'])->name('laporan-katalog')->middleware('is_admin');
Route::get('/cetak-data-katalog-tgl/', [App\Http\Controllers\LaporanController::class, 'cetakKatalogPerTanggal'])->name('cetak-data-katalog-tgl')->middleware('is_admin');
Route::get('/cetak-data-katalog', [App\Http\Controllers\LaporanController::class, 'cetakKatalog'])->name('cetak-data-katalog')->middleware('is_admin');

Route::get('/laporan-koleksi', [App\Http\Controllers\LaporanController::class, 'koleksi'])->name('laporan-koleksi')->middleware('is_admin');
Route::get('/cetak-data-koleksi-tgl/', [App\Http\Controllers\LaporanController::class, 'cetakKoleksiPerTanggal'])->name('cetak-data-koleksi-tgl')->middleware('is_admin');
Route::get('/cetak-data-koleksi', [App\Http\Controllers\LaporanController::class, 'cetakKoleksi'])->name('cetak-data-koleksi')->middleware('is_admin');

Route::get('/laporan-kunjungan', [App\Http\Controllers\LaporanController::class, 'kunjungan'])->name('laporan-kunjungan')->middleware('is_admin');
Route::get('/cetak-data-laporan-tgl/', [App\Http\Controllers\LaporanController::class, 'cetakKunjunganPerTanggal'])->name('cetak-data-laporan-tgl')->middleware('is_admin');
Route::get('/cetak-data-kunjungan', [App\Http\Controllers\LaporanController::class, 'cetakKunjungan'])->name('cetak-data-kunjungan')->middleware('is_admin');

Route::get('/laporan-tamu', [App\Http\Controllers\LaporanController::class, 'tamu'])->name('laporan-tamu')->middleware('is_admin');
Route::get('/cetak-data-tamu-tgl/', [App\Http\Controllers\LaporanController::class, 'cetakTamuPerTanggal'])->name('cetak-data-tamu-tgl')->middleware('is_admin');
Route::get('/cetak-data-tamu', [App\Http\Controllers\LaporanController::class, 'cetakTamu'])->name('cetak-data-tamu')->middleware('is_admin');

Route::get('/laporan-peminjaman', [App\Http\Controllers\LaporanController::class, 'peminjaman'])->name('laporan-peminjaman')->middleware('is_admin');
Route::get('/cetak-data-peminjaman-tgl/', [App\Http\Controllers\LaporanController::class, 'cetakPeminjamanPerTanggal'])->name('cetak-data-peminjaman-tgl')->middleware('is_admin');
Route::get('/cetak-data-peminjaman', [App\Http\Controllers\LaporanController::class, 'cetakpeminjaman'])->name('cetak-data-peminjaman')->middleware('is_admin');

Route::get('/laporan-pengembalian', [App\Http\Controllers\LaporanController::class, 'pengembalian'])->name('laporan-pengembalian')->middleware('is_admin');
Route::get('/cetak-data-pengembalian-tgl/', [App\Http\Controllers\LaporanController::class, 'cetakPengembalianPerTanggal'])->name('cetak-data-pengembalian-tgl')->middleware('is_admin');
Route::get('/cetak-data-pengembalian', [App\Http\Controllers\LaporanController::class, 'cetakpengembalian'])->name('cetak-data-pengembalian')->middleware('is_admin');

Route::get('/laporan-pelanggaran', [App\Http\Controllers\LaporanController::class, 'pelanggaran'])->name('laporan-pelanggaran')->middleware('is_admin');
Route::get('/cetak-data-pelanggaran-tgl/', [App\Http\Controllers\LaporanController::class, 'cetakPelanggaranPerTanggal'])->name('cetak-data-pelanggaran-tgl')->middleware('is_admin');
Route::get('/cetak-data-pelanggaran', [App\Http\Controllers\LaporanController::class, 'cetakPelanggaran'])->name('cetak-data-pelanggaran')->middleware('is_admin');


//petugas middleware
Route::get('/anggota', [App\Http\Controllers\AnggotaController::class, 'index'])->name('data-anggota')->middleware('petugas');
Route::get('/entri-anggota', [App\Http\Controllers\AnggotaController::class, 'entriAnggota'])->name('entri-anggota')->middleware('petugas');
Route::post('/simpan-anggota', [App\Http\Controllers\AnggotaController::class, 'simpan'])->name('simpan-anggota')->middleware('petugas');
Route::get('/edit-anggota/{id}', [App\Http\Controllers\AnggotaController::class, 'editAnggota'])->name('edit-anggota')->middleware('petugas');
Route::post('/simpan-edit-anggota/{id}', [App\Http\Controllers\AnggotaController::class, 'simpanEdit'])->name('simpan-edit-anggota')->middleware('petugas');
Route::get('/hapus-anggota/{id}', [App\Http\Controllers\AnggotaController::class, 'hapus'])->name('hapus-anggota')->middleware('petugas');
Route::get('/kartu/{id}', [App\Http\Controllers\AnggotaController::class, 'kartu'])->middleware('petugas');

Route::get('/katalog', [App\Http\Controllers\KatalogController::class, 'index'])->name('katalog')->middleware('petugas');
Route::get('/entri-katalog', [App\Http\Controllers\KatalogController::class, 'entriKatalog'])->name('entri-katalog')->middleware('petugas');
Route::post('/simpan-katalog', [App\Http\Controllers\KatalogController::class, 'simpan'])->name('simpan-katalog')->middleware('petugas');
Route::post('/simpan-sampul/{id}', [App\Http\Controllers\KatalogController::class, 'uploadSampul'])->name('simpan-sampul')->middleware('petugas');
Route::get('/edit-katalog/{id}', [App\Http\Controllers\KatalogController::class, 'editKatalog'])->name('edit-katalog')->middleware('petugas');
Route::post('/simpan-edit-katalog/{id}', [App\Http\Controllers\KatalogController::class, 'simpanEdit'])->name('simpan-edit-katalog')->middleware('petugas');

Route::get('/koleksi', [App\Http\Controllers\KoleksiController::class, 'index'])->name('koleksi')->middleware('petugas');
Route::get('/entri-koleksi', [App\Http\Controllers\KoleksiController::class, 'entriKoleksi'])->name('entri-koleksi')->middleware('petugas');
Route::post('/simpan-koleksi', [App\Http\Controllers\KoleksiController::class, 'simpan'])->name('simpan-koleksi')->middleware('petugas');
Route::get('/edit-koleksi/{id}', [App\Http\Controllers\KoleksiController::class, 'editKoleksi'])->name('edit-koleksi')->middleware('petugas');
Route::post('/simpan-edit-koleksi/{id}', [App\Http\Controllers\KoleksiController::class, 'simpanEdit'])->name('simpan-edit-koleksi')->middleware('petugas');

Route::get('/peminjaman/', [App\Http\Controllers\PeminjamanController::class, 'peminjaman'])->name('peminjaman')->middleware('petugas');
Route::get('/entri-peminjaman/', [App\Http\Controllers\PeminjamanController::class, 'cariAnggota'])->name('entri-peminjaman')->middleware('petugas');
Route::get('/pinjam-buku/', [App\Http\Controllers\PeminjamanController::class, 'cariAnggota'])->name('pinjam-buku')->middleware('petugas');
Route::post('/pilih-buku/', [App\Http\Controllers\PeminjamanController::class, 'pilihBuku'])->name('pinjam-buku')->middleware('petugas');
Route::post('/transaksi-pinjam/', [App\Http\Controllers\PeminjamanController::class, 'simpan'])->name('transaksi-pinjam')->middleware('petugas');
Route::get('/hapus-temp/{id}', [App\Http\Controllers\PeminjamanController::class, 'hapus'])->name('hapus-anggota')->middleware('petugas');


Route::get('/pengembalian/', [App\Http\Controllers\PengembalianController::class, 'index'])->name('pengembalian')->middleware('petugas');
Route::get('/temp-pengembalian/', [App\Http\Controllers\PengembalianController::class, 'addTemp'])->name('temp-Pengembalian')->middleware('petugas');
Route::get('/entri-pengembalian/', [App\Http\Controllers\PengembalianController::class, 'pengembalian'])->name('entri-pengembalian')->middleware('petugas');
Route::post('/transaksi-kembali/', [App\Http\Controllers\PengembalianController::class, 'simpan'])->name('transaksi-kembali')->middleware('petugas');
Route::get('/pengembalian-buku/', [App\Http\Controllers\PengembalianController::class, 'cariBuku'])->name('pengembalian-buku')->middleware('petugas');
Route::post('/pilih-buku-kembali/', [App\Http\Controllers\PengembalianController::class, 'pilihBuku'])->name('pinjam-buku')->middleware('petugas');
Route::get('/hapus-temp-kembali/{id}', [App\Http\Controllers\PengembalianController::class, 'hapus'])->name('hapus-anggota')->middleware('petugas');
Route::get('/daftar-peminjaman/', [App\Http\Controllers\PeminjamanController::class, 'index'])->name('daftar-peminjaman')->middleware('petugas');

Route::get('/pelanggaran/', [App\Http\Controllers\PengembalianController::class, 'dataPelanggaran'])->name('data-pelanggaran')->middleware('petugas');
Route::get('/pelanggaran/{id}', [App\Http\Controllers\PengembalianController::class, 'pelanggaran'])->name('pelanggaran')->middleware('petugas');
Route::post('/simpan-pelanggaran', [App\Http\Controllers\PengembalianController::class, 'simpanPelanggaran'])->name('simpan-pelanggaran')->middleware('petugas');

Route::get('/kunjungan-tamu/', [App\Http\Controllers\TamuController::class, 'index'])->name('kunjungan-tamu')->middleware('petugas');
Route::get('/cari-tamu/', [App\Http\Controllers\TamuController::class, 'cari'])->name('cari-tamu')->middleware('petugas');
Route::get('/kunjungan-anggota/', [App\Http\Controllers\KunjunganController::class, 'index'])->name('kunjungan-anggota')->middleware('petugas');
Route::get('/cari-anggota-kunjungan/', [App\Http\Controllers\KunjunganController::class, 'cari'])->name('cari-anggota-kunjungan')->middleware('petugas');

Route::get('/search', [App\Http\Controllers\ProfilController::class, 'search'])->name('search');

Auth::routes();

Route::get('/profil', [App\Http\Controllers\ProfilController::class, 'index'])->name('profil');
