<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KoleksiModel extends Model
{
    use HasFactory;
    protected $table = "koleksi";
    public function allData()
    {
        return DB::table('katalog')->join('jenis_karya', 'jenis_karya.id', '=', 'katalog.id_jenis_karya')
            ->join('jenis_bahan', 'jenis_bahan.id', '=', 'katalog.id_jenis_bahan')
            ->join('koleksi',  'koleksi.bib_id', '=', 'katalog.bib_id')
            ->get(['katalog.*', 'koleksi.*', 'jenis_karya.id as id_karya', 'jenis_karya.jenis_karya as karya', 'jenis_bahan.id as id_bahan', 'jenis_bahan.jenis_bahan as bahan']);
    }
    public function detailData($id)
    {

        return DB::table('koleksi')->where('id_buku', $id)->first();
    }

    public function simpan($data)
    {
        return DB::table('koleksi')->insert($data);
    }
    public function edit($id, $data)
    {
        DB::table('koleksi')->where('id_buku', $id)->update($data);
    }
    public function ket($id_buku) //update ketersediaan koleksi buku
    {
        DB::table('koleksi')->where('id_buku', $id_buku)->update([
            'ketersediaan' => 'Dipinjam'
        ]);
    }
}
