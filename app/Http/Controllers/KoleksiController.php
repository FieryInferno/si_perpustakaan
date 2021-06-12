<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KoleksiModel;
use App\Models\KatalogModel;
use Illuminate\Support\Facades\DB;

class KoleksiController extends Controller
{
    public function __construct()
    {
        $this->KoleksiModel = new KoleksiModel();
        $this->KatalogModel = new KatalogModel();
    }
    public function index()
    {

        $data = [
            'koleksi' => $this->KoleksiModel->allData()
        ];
        return view('petugas.v_koleksi', $data);
    }

    public function detailKoleksi($id)
    {
        return DB::table('koleksi')->where('id_buku', $id)->first();
    }
    public function entriKoleksi()
    {
        $data = [
            'katalog' => $this->KatalogModel->allData()
        ];
        return view('petugas.v_entri-koleksi', $data);
    }
    public function simpan()
    {
        //form validasi
        Request()->validate(
            [

                'bib_id' => 'required',
                'id_buku' => 'required|unique:koleksi',
                'tgl_pengadaan' => 'required',
                'akses' => 'required',
                'ketersediaan' => 'required',
                'jenis_sumber' => 'required'
            ],
            [

                'bib_id.required' => 'Wajib diisi!',
                'id_buku.required' => 'Wajib diisi!',
                'id_buku.unique' => 'Nomor ini Sudah Ada!',
                'tgl_pengadaan.required' => 'Wajib diisi!',
                'akses.required' => 'Wajib diisi!',
                'ketersediaan.required' => 'Wajib diisi!',
                'jenis_sumber.required' => 'Wajib diisi!'

            ]
        );


        $data = [
            'bib_id' => Request()->bib_id,
            'id_buku' => Request()->id_buku,
            'tgl_pengadaan' => Request()->tgl_pengadaan,
            'akses' => Request()->akses,
            'ketersediaan' => Request()->ketersediaan,
            'jenis_sumber' => Request()->jenis_sumber,
            'nama_sumber' => Request()->nama_sumber,
            'created_at' => now()
        ];

        $this->KoleksiModel->simpan($data);
        return redirect()->route('koleksi')->with('success', 'Data Berhasil ditambahkan!');
    }
    public function editKoleksi($id)
    {
        $data = [
            'katalog' => $this->KatalogModel->allData(),
            'koleksi' => $this->KoleksiModel->detailData($id)
        ];
        return view('petugas.v_edit-koleksi', $data);
    }
    public function simpanEdit($id)
    {
        //form validasi
        Request()->validate(
            [
                'bib_id' => 'required',
                'tgl_pengadaan' => 'required',
                'akses' => 'required',
                'ketersediaan' => 'required',
                'jenis_sumber' => 'required'
            ],
            [

                'bib_id.required' => 'Wajib diisi!',
                'tgl_pengadaan.required' => 'Wajib diisi!',
                'akses.required' => 'Wajib diisi!',
                'ketersediaan.required' => 'Wajib diisi!',
                'jenis_sumber.required' => 'Wajib diisi!'

            ]
        );

        $data = [
            'bib_id' => Request()->bib_id,
            'tgl_pengadaan' => Request()->tgl_pengadaan,
            'akses' => Request()->akses,
            'ketersediaan' => Request()->ketersediaan,
            'jenis_sumber' => Request()->jenis_sumber,
            'nama_sumber' => Request()->nama_sumber,
            'updated_at' => now()
        ];
        $this->KoleksiModel->edit($id, $data);
        return redirect()->route('katalog')->with('success', 'Data Berhasil diubah!');
    }
}
