<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnggotaModel;
use App\Models\KoleksiModel;
use App\Models\TempPinjamModel;
use App\Models\TransaksiModel;
use App\Models\TempKembaliModel;
use Illuminate\Support\Facades\DB;

class PengembalianController extends Controller
{
  public function __construct()
  {
    $this->AnggotaModel     = new AnggotaModel();
    $this->KoleksiModel     = new KoleksiModel();
    $this->TempPinjamModel  = new TempPinjamModel();
    $this->TransaksiModel   = new TransaksiModel();
    $this->TempKembaliModel = new TempKembaliModel();
  }

  public function index()
  {
    $data = [
      'pinjam' => DB::table('transaksi_koleksi')
        ->join('koleksi', 'koleksi.id_buku', '=', 'transaksi_koleksi.id_buku')
        ->join('katalog', 'katalog.bib_id', '=', 'koleksi.bib_id')
        ->join('jenis_bahan', 'katalog.id_jenis_bahan', '=', 'jenis_bahan.id')
        ->join('anggota', 'anggota.kd_anggota', '=', 'transaksi_koleksi.kd_anggota')
        ->where('tinyint', '1')->get()
    ];
    return view('petugas.v_pengembalian', $data);
  }

  public function pengembalian()
  {
    $data = [
      'pinjam' => DB::table('transaksi_koleksi')->join('v_koleksi_katalog', 'v_koleksi_katalog.id_buku', '=', 'transaksi_koleksi.id_buku')
          ->where('tinyint', '0')->get()
    ];
    return view('petugas.v_entri-pengembalian', $data);
  }

  public function addTemp(Request $request)
  {
    $this->validate($request, [
      'id_buku' => 'required',
    ], [
      'id_buku.required' => 'Silakan Masukkan Buku yang Akan dikembalikan',
    ]);

    $id   = Request()->id_buku;
    $data = [
      'status_pinjam' => 'Kembali',
      'tgl_kembali' => date('Y-m-d'),
      'tinyint' => '0'
    ];
    $this->TransaksiModel->editPengembalian($id, $data);
    $this->KoleksiModel->where('id_buku', $id)->update(['ketersediaan' => 'Tersedia']);
    return redirect()->back();
  }

  public function hapus($id)
  {
    $data = [
      'status_pinjam' => 'Pinjam',
      'tgl_kembali' => null,
      'tinyint' => null,
    ];
    $this->TransaksiModel->batal($id, $data);
    $this->KoleksiModel->where('id_buku', $id)->update(['ketersediaan' => 'Dipinjam']);
    return redirect()->back();
  }

  public function simpan(Request $request)
  {
    $count = $this->TransaksiModel->where('tinyint', '0')->count();
    // dd($count);
    if ($count > 0) {
      $data = ['tinyint' => '1', 'tgl_kembali' => now()];
      $this->TransaksiModel->tinyint($data);
      return redirect('entri-pengembalian')->with('success', 'Data buku telah disimpan!!!');
    } else {
      return redirect('entri-pengembalian')->with('warning', 'Silakan Input Buku Yang akan dipinjam!!!');
    }
  }

  public function dataPelanggaran()
  {
    $data = [
      'pelanggaran' => DB::table('v_transaksi')->join('pelanggaran', 'pelanggaran.no_transaksi', '=', 'v_transaksi.no_transaksi')->get()
    ];
    return view('petugas.v_pelanggaran', $data);
  }

  public function pelanggaran($id)
  {
    $data = ['pelanggaran' => $this->TransaksiModel->join('v_koleksi_katalog', 'transaksi_koleksi.id_buku', '=', 'v_koleksi_katalog.id_buku')->where('no', $id)->first()];
    // dd($data);
    return view('petugas.v_entri-pelanggaran', $data);
  }

    public function simpanPelanggaran()
    {
        $data = [
            'no_transaksi' => Request()->no_transaksi,
            'id_buku' => Request()->id_buku,
            'jenis_pelanggaran' => Request()->jenis_pelanggaran,
            'jenis_denda' => Request()->jenis_denda,
            'jumlah_denda' => Request()->jumlah_denda,
        ];
        DB::table('pelanggaran')->insert($data);
        return $this->pengembalian();
    }
}
