<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TempPinjamModel extends Model
{
    use HasFactory;
    protected $table = 'temp_peminjaman';

    public function simpan($data)
    {
        return DB::table('temp_peminjaman')->insert($data);
    }
    public function detailData($id)
    {
        return DB::table('temp_peminjaman')->join('v_koleksi_katalog', 'v_koleksi_katalog.id_buku', '=', 'temp_peminjaman.id_buku')
            ->where('kd_anggota', $id)->get(['v_koleksi_katalog.*', 'temp_peminjaman.*']);
    }
    public function hapus($id)
    {
        DB::table('temp_peminjaman')->where('id_buku', $id)->delete();
    }
}
