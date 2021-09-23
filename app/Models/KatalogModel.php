<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KatalogModel extends Model
{
  use HasFactory;
  protected $table  = 'katalog';

  public function allData()
  {
    return DB::table('katalog')->join('jenis_karya', 'jenis_karya.id', '=', 'katalog.id_jenis_karya')
        ->join('jenis_bahan', 'jenis_bahan.id', '=', 'katalog.id_jenis_bahan')
        ->get(['katalog.*', 'katalog.bib_id as bibid', 'jenis_karya.id as id_karya', 'jenis_karya.jenis_karya as karya', 'jenis_bahan.id as id_bahan', 'jenis_bahan.jenis_bahan as bahan']);
  }

  public function detailData($id)
  {
    return DB::table('katalog')->join('jenis_karya', 'jenis_karya.id', '=', 'katalog.id_jenis_karya')
        ->join('jenis_bahan', 'jenis_bahan.id', '=', 'katalog.id_jenis_bahan')
        ->join('bahasa', 'bahasa.id', '=', 'katalog.id_bahasa')
        ->get(['katalog.*', 'jenis_karya.id as id_karya', 'jenis_karya.jenis_karya as karya', 'jenis_bahan.id as id_bahan', 'jenis_bahan.jenis_bahan as bahan', 'bahasa.id as id_bahasa', 'bahasa.bahasa as bahasa'])
        ->where('bib_id', $id)->first();
  }

  public function jenisBahan()
  {
    return DB::table('jenis_bahan')->get();
  }

  public function jenisKarya()
  {
    return DB::table('jenis_karya')->get();
  }

  public function bahasa()
  {
    return DB::table('bahasa')->get();
  }

  public function simpan($data)
  {
    DB::table('katalog')->insert($data);
  }

  public function edit($id, $data)
  {
    DB::table('katalog')->where('bib_id', $id)->update($data);
  }
}
