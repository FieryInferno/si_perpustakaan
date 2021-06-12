<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EksemplarModel extends Model
{
    use HasFactory;
    public $table = "v_eksemplar";

    public function detailData($id)
    {

        return $this->select('*')->where('id_katalog', $id)->get();
    }
    public function pencarian($keyword, $kategori)
    {

        return $this->select('*')->where('id_bahan', $kategori)
            ->where('judul_utama', 'LIKE', "%{$keyword}%")
            ->where('judul_sub', 'LIKE', "%{$keyword}%")
            ->paginate(5);
    }
}
