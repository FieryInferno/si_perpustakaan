<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class TransaksiModel extends Model
{
  use HasFactory;
  protected $table  = "transaksi_koleksi";

  public function simpan($data)
  {
    return DB::table('transaksi_koleksi')->insert($data);
  }

  public function detailData($id)
  {
    return DB::table('transaksi_koleksi')->join('v_koleksi_katalog', 'v_koleksi_katalog.id_buku', '=', 'transaksi_koleksi.id_buku')
      ->where([
        'kd_anggota'    => $id,
        'status_pinjam' => 'pinjam'
      ])->get(['v_koleksi_katalog.*', 'transaksi_koleksi.*']);
  }

  public function detailDataHistori($id)
  {
    return DB::table('transaksi_koleksi')->join('v_koleksi_katalog', 'v_koleksi_katalog.id_buku', '=', 'transaksi_koleksi.id_buku')
        ->where('kd_anggota', $id)->where('status_pinjam', 'Kembali')->get(['v_koleksi_katalog.*', 'transaksi_koleksi.*']);
  }

  public function detailDataAnggota($id)
  {
    return DB::table('transaksi_koleksi')
        ->join('anggota', 'anggota.kd_anggota', '=', 'transaksi_koleksi.kd_anggota')
        ->join('v_koleksi_katalog', 'v_koleksi_katalog.id_buku', '=', 'transaksi_koleksi.id_buku')
        ->where('transaksi_koleksi.id_buku', $id)->first(['transaksi_koleksi.*', 'v_koleksi_katalog.*', 'anggota.*']);
  }

  public function detailPeminjaman()
  {
    return DB::table('transaksi_koleksi')
      ->join('anggota', 'anggota.kd_anggota', '=', 'transaksi_koleksi.kd_anggota')
      ->join('v_koleksi_katalog', 'v_koleksi_katalog.id_buku', '=', 'transaksi_koleksi.id_buku')
      ->where('transaksi_koleksi.status_pinjam', 'Pinjam')->get(['transaksi_koleksi.*', 'v_koleksi_katalog.*', 'anggota.*']);
  }
    
    public function editPengembalian($id, $data)
    {
        DB::table('transaksi_koleksi')->where('id_buku', $id)->where('status_pinjam', 'Pinjam')->update($data);
    }
    public function tinyint($data)
    {
        DB::table('transaksi_koleksi')->where('tinyint', 0)->update($data);
    }
    public function batal($id, $data)
    {
        DB::table('transaksi_koleksi')->where('id_buku', $id)->where('tinyint', 0)->where('status_pinjam', 'Kembali')->update($data);
    }
}
