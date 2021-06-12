<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TempKembaliModel extends Model
{
    use HasFactory;
    protected $table = "temp_kembali";
    public function simpan($data)
    {
        return DB::table('temp_kembali')->insert($data);
    }
    public function allData()
    {
        return DB::table('temp_kembali')->join('transaksi_koleksi', 'transaksi_koleksi.id_buku', '=', 'temp_kembali.id_buku')
            ->join('v_koleksi_katalog', 'v_koleksi_katalog.id_buku', '=', 'temp_kembali.id_buku')
            ->get(['v_koleksi_katalog.*', 'transaksi_koleksi.*']);
    }
    public function detailData($id)
    {
        return DB::table('temp_kembali')->join('transaksi_koleksi', 'transaksi_koleksi.id_buku', '=', 'temp_kembali.id_buku')
            ->join('v_koleksi_katalog', 'v_koleksi_katalog.id_buku', '=', 'temp_kembali.id_buku')
            ->where('temp_kembali.no_transaksi', $id)->get(['v_koleksi_katalog.*', 'transaksi_koleksi.*']);
    }
    public function hapus($id)
    {
        DB::table('temp_kembali')->where('id_buku', $id)->delete();
    }
}
