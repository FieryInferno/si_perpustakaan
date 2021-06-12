<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AnggotaModel extends Model
{
    use HasFactory;
    protected $table = "anggota";

    public function detailData($id)
    {
        return DB::table('anggota')->where('kd_anggota', $id)->first();
    }

    public function simpan($data)
    {
        DB::table('anggota')->insert($data);
    }
    public function hapus($id)
    {

        DB::table('anggota')->where('kd_anggota', $id)->delete();
    }

    public function edit($id, $data)
    {
        DB::table('anggota')->where('kd_anggota', $id)->update($data);
    }

    public function kunjungan()
    {
        DB::table('kunjungan')->join('anggota', 'anggota.kd_anggota', '=', 'kunjungan.kd_anggota')
            ->get(['anggota.*, kunjungan.*']);
    }
}
