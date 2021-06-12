<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewKoleksiModel extends Model
{
    use HasFactory;
    public $table = "v_koleksi_katalog";

    public function detailData($id)
    {

        return $this->select('*')->where('id_buku', $id)->get();
    }
}
