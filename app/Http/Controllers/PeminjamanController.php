<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Models\AnggotaModel;
use App\Models\KoleksiModel;
use App\Models\TempPinjamModel;
use App\Models\TransaksiModel;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
  public function __construct()
  {
    $this->AnggotaModel     = new AnggotaModel();
    $this->KoleksiModel     = new KoleksiModel();
    $this->TempPinjamModel  = new TempPinjamModel();
    $this->TransaksiModel   = new TransaksiModel();
  }

  public function index()
  {
    $data['pinjam'] = $this->TransaksiModel->detailPeminjaman();
    return view('petugas.v_peminjaman', $data);
  }

  public function peminjaman()
  {
    return view('petugas.v_entri-peminjaman');
  }

  public function cariAnggota()
  {
    $id           = ['kd_anggota' => Request()->kd_anggota];
    $keanggotaan  = DB::table('anggota')->where('kd_anggota', $id)
        ->where('keanggotaan', 'Aktif')->first(); // cek apakah anggota aktif

    if (!$this->AnggotaModel->detailData($id)) {
      return redirect()->back()->with('warning', 'Silakan Periksa Kembali Kode Anggota yang Anda Masukkan');
    } elseif (!$keanggotaan) {
      return redirect()->back()->with('warning', 'Maaf Anggota Non-aktif Tidak Dapat Meminjam Buku');
    }
    $data = [
      'anggota' => $this->AnggotaModel->detailData($id),
      'pinjam'  => $this->TransaksiModel->detailData($id),
      'histori' => $this->TransaksiModel->detailDataHistori($id),
      'koleksi' => $this->TempPinjamModel->detailData($id),
    ];
    return view('petugas.v_entri-pinjam-buku', $data);
  }

  public function pilihBuku()
  {
    $dipinjam = DB::table('koleksi')
      ->where('id_buku', Request()->id_buku)
      ->where('ketersediaan', 'Tersedia')->first(); //cek ketersediaan buku
      
    $baca = DB::table('koleksi')->where('id_buku', Request()->id_buku)
      ->where('akses', 'Dapat dipinjam')->first(); // cek apakah buku dapat dipinjam

    // cek apakah anggota sudah mengembalikan buku
    // $pinjam = DB::table('transaksi_koleksi')->where('kd_anggota', Request()->kd_anggota)
    //   ->where('status_pinjam', 'Pinjam')->first();

    $bahan = DB::table('v_koleksi_katalog')->where('id_buku', Request()->id_buku)->first();
    if (!$dipinjam) {
      return redirect()->back()->with('warning', 'Buku belum dikembalikan atau sedang dipinjam');
    } else if (!$baca) {
      return redirect()->back()->with('warning', 'Buku Tidak Dapat dipinjam');
    }
    // else if ($pinjam) {
    //   return redirect()->back()->with('warning', 'Anggota belum mengembalikan buku');
    // }
    
    Request()->validate(
      [
        'id_buku' => 'required|unique:temp_peminjaman,id_buku',
      ],
      [
        'id_buku.unique' => 'Buku ini Sudah Ada! Silakan Pilih Buku Lain',
        'id_buku.required' => 'Silakan Pilih Buku Yang Akan Dipinjam',
      ]
    );

    if ($bahan->id_bahan == 1 && $bahan->id_bahan == 2) {
      $now    = date('Y-m-d');
      $addDay = date('Y-m-d', strtotime('+3 days', strtotime($now)));
      $data   = [
        'kd_anggota' => Request()->kd_anggota,
        'id_buku' => Request()->id_buku,
        'tgl_pinjam' => $now,
        'jatuh_tempo' => null,
      ];
      $this->TempPinjamModel->simpan($data);
      return redirect()->back();
    } else {
      $now    = date('Y-m-d');
      $addDay = date('Y-m-d', strtotime('+3 days', strtotime($now)));
      $data   = [
        'kd_anggota' => Request()->kd_anggota,
        'id_buku' => Request()->id_buku,
        'tgl_pinjam' => $now,
        'jatuh_tempo' => $addDay,
      ];
      $this->TempPinjamModel->simpan($data);
      return redirect()->back();
    }
  }

  public function hapus($id)
  {
    $this->TempPinjamModel->hapus($id);
    return redirect()->back();
  }

  public function simpan(Request $request)
  {
    $count = DB::table('temp_peminjaman')->where('kd_anggota', Request()->kd_anggota)->count();
    if ($count > 0) {
      foreach ($request->id_buku as $i => $id_buku) {
        $thn      = date('Y');
        $genId    = (new Helper)->InvoiceGenerator(new TransaksiModel, 'no_transaksi', 8, $thn);
        $data[1]  = [ // array dimulai dari index ke-1
          'id_buku'       => $request->id_buku[$i],
          'no_transaksi'  => $genId,
          'kd_anggota'    => $request->kd_anggota[$i],
          'tgl_pinjam'    => $request->tgl_pinjam[$i],
          'jatuh_tempo'   => $request->jatuh_tempo[$i],
          'status_pinjam' => 'Pinjam'
        ];
        TransaksiModel::insert($data);

        $id_buku = Request()->id_buku[$i];
        $this->KoleksiModel->ket($id_buku);
        $this->KoleksiModel->where('id_buku', $id_buku)->update(['ketersediaan' => 'Dipinjam']);
        $this->TempPinjamModel->hapus($id_buku);
      }

      return redirect()->back()->with('success', 'Data buku telah disimpan!!!');
  } else {
    return redirect()->back()->with('warning', 'Silakan Input Buku Yang akan dipinjam!!!');
  }
}
}
