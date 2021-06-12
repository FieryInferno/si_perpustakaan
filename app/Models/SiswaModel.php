<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SiswaModel extends Model
{
    use HasFactory;
    protected $table = "siswa";
    // protected $fillable = [
    //     'kd_anggota',
    //     'nis',
    //     'nama_siswa',
    //     'jkelamin',
    //     'tempat_lahir',
    //     'tgl_lahir',
    //     'status'
    // ];
    public function detailData($id)
    {
        return DB::table('siswa')->where('kd_anggota', $id)->first();
    }

    public function simpan($data)
    {
        DB::table('siswa')->insert($data);
    }
    public function hapus($id)
    {

        DB::table('siswa')->where('kd_anggota', $id)->delete();
    }

    public function edit($id, $data)
    {
        DB::table('siswa')->where('kd_anggota', $id)->update($data);
    }
}
