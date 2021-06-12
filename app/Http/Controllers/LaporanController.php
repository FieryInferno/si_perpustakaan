<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\KoleksiModel;
use App\Models\EksemplarModel;
use App\Models\TransaksiModel;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->KoleksiModel = new KoleksiModel();
        $this->EksemplarModel = new EksemplarModel();
        $this->TransaksiModel = new TransaksiModel();
    }
    //  Anggota
    public function anggota()
    {
        $users = DB::table('anggota')->get();

        return view('admin.v_lapAnggota', ['users' => $users]);
    }
    public function cariAnggota()
    {
        $start_date = Carbon::parse(Request()->tgl_awal)->addDays(-1)
            ->toDateTimeString();

        $end_date = Carbon::parse(Request()->tgl_akhir)->addDays(1)
            ->toDateTimeString();

        $data = [
            'users' => DB::table('anggota')->whereBetween('created_at', [$start_date, $end_date])->get()
        ];
        return view('admin.v_lapAnggota', $data);
    }
    public function cetakAnggotaPerTanggal()
    {
        $start_date = Carbon::parse(Request()->tgl_awal)->addDays(-1)
            ->toDateTimeString();

        $end_date = Carbon::parse(Request()->tgl_akhir)->addDays(1)
            ->toDateTimeString();
        $query = DB::table('anggota');

        $data = [
            'users' => $query->whereBetween('created_at', [$start_date, $end_date])->get()
        ];
        return view('admin.cetak-laporan.v_cetakAnggota', $data);
    }
    public function cetakAnggota()
    {
        $query = DB::table('anggota')->get();

        $data = [
            'users' => $query
        ];
        return view('admin.cetak-laporan.v_cetakAnggota', $data);
    }

    // Katalog
    public function katalog()
    {

        $data = EksemplarModel::select("*")->get()->toArray();

        return view('admin.v_lapKatalog', ['data' => $data]);
    }
    public function cetakKatalogPerTanggal()
    {
        $start_date = Carbon::parse(Request()->tgl_awal)->addDays(-1)
            ->toDateTimeString();

        $end_date = Carbon::parse(Request()->tgl_akhir)->addDays(1)
            ->toDateTimeString();

        $data = [
            'data' => EksemplarModel::select("*")->whereBetween('created_at', [$start_date, $end_date])->get()->toArray()
        ];
        return view('admin.cetak-laporan.v_cetakKatalog', $data);
    }
    public function cetakKatalog()
    {

        $data = [
            'data' => EksemplarModel::select("*")->get()->toArray()
        ];
        return view('admin.cetak-laporan.v_cetakKatalog', $data);
    }
    // Koleksi
    public function koleksi()
    {
        $data = $this->KoleksiModel->allData();

        return view('admin.v_lapKoleksi', ['data' => $data]);
    }
    public function cetakKoleksiPerTanggal()
    {
        $start_date = Carbon::parse(Request()->tgl_awal)->addDays(-1)
            ->toDateTimeString();

        $end_date = Carbon::parse(Request()->tgl_akhir)->addDays(1)
            ->toDateTimeString();

        $data = [
            'data' =>  DB::table('katalog')->join('jenis_karya', 'jenis_karya.id', '=', 'katalog.id_jenis_karya')
                ->join('jenis_bahan', 'jenis_bahan.id', '=', 'katalog.id_jenis_bahan')
                ->join('koleksi',  'koleksi.bib_id', '=', 'katalog.bib_id')
                ->whereBetween('katalog.created_at', [$start_date, $end_date])
                ->get(['katalog.*', 'koleksi.*', 'jenis_karya.id as id_karya', 'jenis_karya.jenis_karya as karya', 'jenis_bahan.id as id_bahan', 'jenis_bahan.jenis_bahan as bahan'])
        ];
        return view('admin.cetak-laporan.v_cetakKoleksi', $data);
    }
    public function cetakKoleksi()
    {

        $data = [
            'data' =>  DB::table('katalog')->join('jenis_karya', 'jenis_karya.id', '=', 'katalog.id_jenis_karya')
                ->join('jenis_bahan', 'jenis_bahan.id', '=', 'katalog.id_jenis_bahan')
                ->join('koleksi',  'koleksi.bib_id', '=', 'katalog.bib_id')
                ->get(['katalog.*', 'koleksi.*', 'jenis_karya.id as id_karya', 'jenis_karya.jenis_karya as karya', 'jenis_bahan.id as id_bahan', 'jenis_bahan.jenis_bahan as bahan'])
        ];
        return view('admin.cetak-laporan.v_cetakKoleksi', $data);
    }

    // Kunjungan
    public function kunjungan()
    {

        $data = [
            'anggota' => DB::table('kunjungan')->join('anggota', 'anggota.kd_anggota', '=', 'kunjungan.kd_anggota')
                ->get(['anggota.*', 'kunjungan.*'])
        ];

        return view('admin.v_lapKunjungan', $data);
    }
    public function cetakKunjunganPerTanggal()
    {
        $start_date = Carbon::parse(Request()->tgl_awal)->addDays(-1)
            ->toDateTimeString();

        $end_date = Carbon::parse(Request()->tgl_akhir)->addDays(1)
            ->toDateTimeString();

        $data = [
            'anggota' => DB::table('kunjungan')->join('anggota', 'anggota.kd_anggota', '=', 'kunjungan.kd_anggota')
                ->whereBetween('kunjungan.tgl', [$start_date, $end_date])->get(['anggota.*', 'kunjungan.*'])
        ];
        return view('admin.cetak-laporan.v_cetakKunjungan', $data);
    }
    public function cetakKunjungan()
    {
        $data = [
            'anggota' => DB::table('kunjungan')->join('anggota', 'anggota.kd_anggota', '=', 'kunjungan.kd_anggota')
                ->get(['anggota.*', 'kunjungan.*'])
        ];
        return view('admin.cetak-laporan.v_cetakKunjungan', $data);
    }

    //Tamu
    public function tamu()
    {

        $data = [
            'tamu' => DB::table('tamu')->get()
        ];

        return view('admin.v_lapTamu', $data);
    }
    public function cetakTamuPerTanggal()
    {
        $start_date = Carbon::parse(Request()->tgl_awal)->addDays(-1)
            ->toDateTimeString();

        $end_date = Carbon::parse(Request()->tgl_akhir)->addDays(1)
            ->toDateTimeString();

        $data = [
            'tamu' => DB::table('tamu')->whereBetween('tgl', [$start_date, $end_date])->get()
        ];
        return view('admin.cetak-laporan.v_cetakTamu', $data);
    }
    public function cetakTamu()
    {

        $data = [
            'tamu' => DB::table('tamu')->get()
        ];
        return view('admin.cetak-laporan.v_cetakTamu', $data);
    }

    // Peminjaman
    public function peminjaman()
    {
      $data = ['pinjam' => $this->TransaksiModel->detailPeminjaman()];
      return view('admin.v_lapPeminjaman', $data);
    }
    
    public function cetakPeminjamanPerTanggal()
    {
        $start_date = Carbon::parse(Request()->tgl_awal)->addDays(-1)
            ->toDateTimeString();

        $end_date = Carbon::parse(Request()->tgl_akhir)->addDays(1)
            ->toDateTimeString();

        $data = [
            'pinjam' =>  DB::table('transaksi_koleksi')
                ->join('anggota', 'anggota.kd_anggota', '=', 'transaksi_koleksi.kd_anggota')
                ->join('v_koleksi_katalog', 'v_koleksi_katalog.id_buku', '=', 'transaksi_koleksi.id_buku')
                ->where('transaksi_koleksi.status_pinjam', 'Pinjam')->whereBetween('tgl_pinjam', [$start_date, $end_date])->get(['transaksi_koleksi.*', 'v_koleksi_katalog.*', 'anggota.*'])

        ];
        return view('admin.cetak-laporan.v_cetakPeminjaman', $data);
    }
    public function cetakPeminjaman()
    {
        $data = [
            'pinjam' => $this->TransaksiModel->detailPeminjaman()
        ];

        return view('admin.cetak-laporan.v_cetakPeminjaman', $data);
    }
    // Pengembalian
    public function pengembalian()
    {

        $data = [
            'pinjam' => DB::table('transaksi_koleksi')->join('v_koleksi_katalog', 'v_koleksi_katalog.id_buku', '=', 'transaksi_koleksi.id_buku')
                ->join('anggota', 'anggota.kd_anggota', '=', 'transaksi_koleksi.kd_anggota')
                ->where('tinyint', '1')->get()
        ];

        return view('admin.v_lapPengembalian', $data);
    }
    public function cetakPengembalianPerTanggal()
    {
        $start_date = Carbon::parse(Request()->tgl_awal)->addDays(-1)
            ->toDateTimeString();

        $end_date = Carbon::parse(Request()->tgl_akhir)->addDays(1)
            ->toDateTimeString();

        $data = [
            'pinjam' =>  DB::table('transaksi_koleksi')
                ->join('anggota', 'anggota.kd_anggota', '=', 'transaksi_koleksi.kd_anggota')
                ->join('v_koleksi_katalog', 'v_koleksi_katalog.id_buku', '=', 'transaksi_koleksi.id_buku')
                ->where('transaksi_koleksi.status_pinjam', 'Kembali')->whereBetween('tgl_kembali', [$start_date, $end_date])->get(['transaksi_koleksi.*', 'v_koleksi_katalog.*', 'anggota.*'])

        ];
        return view('admin.cetak-laporan.v_cetakPengembalian', $data);
    }
    public function cetakPengembalian()
    {
        $data = [
            'pinjam' =>  DB::table('transaksi_koleksi')
                ->join('anggota', 'anggota.kd_anggota', '=', 'transaksi_koleksi.kd_anggota')
                ->join('v_koleksi_katalog', 'v_koleksi_katalog.id_buku', '=', 'transaksi_koleksi.id_buku')
                ->where('transaksi_koleksi.status_pinjam', 'Kembali')->get(['transaksi_koleksi.*', 'v_koleksi_katalog.*', 'anggota.*'])

        ];
        return view('admin.cetak-laporan.v_cetakPengembalian', $data);
    }
    // Pelanggaran
    public function pelanggaran()
    {

        $data = [
            'pelanggaran' => DB::table('v_transaksi')->join('pelanggaran', 'pelanggaran.no_transaksi', '=', 'v_transaksi.no_transaksi')->get()
        ];

        return view('admin.v_lapPelanggaran', $data);
    }
    public function cetakPelanggaranPerTanggal()
    {
        $start_date = Carbon::parse(Request()->tgl_awal)->addDays(-1)
            ->toDateTimeString();

        $end_date = Carbon::parse(Request()->tgl_akhir)->addDays(1)
            ->toDateTimeString();

        $data = [
            'pelanggaran' => DB::table('v_transaksi')->join('pelanggaran', 'pelanggaran.no_transaksi', '=', 'v_transaksi.no_transaksi')
                ->where('v_transaksi.status_pinjam', 'Kembali')->whereBetween('v_transaksi.tgl_kembali', [$start_date, $end_date])->get()

        ];
        return view('admin.cetak-laporan.v_cetakPelanggaran', $data);
    }
    public function cetakPelanggaran()
    {
        $data = [
            'pelanggaran' => DB::table('v_transaksi')->join('pelanggaran', 'pelanggaran.no_transaksi', '=', 'v_transaksi.no_transaksi')->get()
        ];
        return view('admin.cetak-laporan.v_cetakPelanggaran', $data);
    }
}
