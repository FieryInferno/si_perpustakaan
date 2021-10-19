<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;
use App\Models\EksemplarModel;
use Illuminate\Http\Request;
use App\Models\KatalogModel;
use App\Models\ViewKoleksiModel;

class KatalogController extends Controller
{
  public function __construct()
  {
    $this->KatalogModel = new KatalogModel();
    $this->EksemplarModel = new EksemplarModel();
    $this->ViewKoleksiModel = new ViewKoleksiModel();
  }

  public function index()
  {

    $data = [
      // 'katalog' => $this->KatalogModel->allData(),
      'katalog' => EksemplarModel::select("*")->get()->toArray()
    ];

    // var_dump($data);
    return view('petugas.v_katalog', $data);
  }

  public function entriKatalog()
  {
    // menampilkan katalog entri
    $bahan = $this->KatalogModel->jenisBahan();
    $karya = $this->KatalogModel->jenisKarya();
    $bahasa = $this->KatalogModel->bahasa();
    return view('petugas.v_entri-katalog', ['bahan' => $bahan, 'karya' => $karya, 'bahasa' => $bahasa]);
  }

  public function editKatalog($id)
  {
    if (!$this->KatalogModel->detailData($id)) {
      abort(404);
    }
    $data = [
      'katalog' => $this->KatalogModel->detailData($id),
      'bahasa'  => $this->KatalogModel->bahasa(),
      'karya'   => $this->KatalogModel->jenisKarya(),
      'koleksi' => $this->ViewKoleksiModel->detailData($id)
    ];
    return view('petugas.v_edit-katalog', $data);
  }

  public function simpan()
  {
    //form validasi
    Request()->validate(
      [
        // 'bib_id' => 'required|unique:katalog,bib_id',
        'judul_utama'   => 'required',
        'pengarang'     => 'required',
        'tempat_terbit' => 'required',
        'penerbit'      => 'required',
        'thn_terbit'    => 'required',
        'jumlah_hlm'    => 'required',
        // 'dimensi' => 'required',
        'kelas_ddc'     => 'required',
        'no_panggil'    => 'required',
        'isbn'          => 'required'
        // 'gambar' => 'required|mimes:jpeg,png,jpg|max:2024000',
      ],
      [
        // 'bib_id.required' => 'Wajib diisi!',
        // 'bib_id.unique' => 'Nomor ini Sudah Ada!',
        'judul_utama.required'    => 'Wajib diisi!',
        'pengarang.required'      => 'Wajib diisi!',
        'penerbit.required'       => 'Wajib diisi!',
        'tempat_terbit.required'  => 'Wajib diisi!',
        'penerbit.required'       => 'Wajib diisi!',
        'thn_terbit.required'     => 'Wajib diisi!',
        'jumlah_hlm.required'     => 'Wajib diisi!',
        'kelas_ddc.required'      => 'Wajib diisi!',
        'no_panggil.required'     => 'Wajib diisi!',
        'isbn.required'           => 'Wajib diisi!'
      ]
    );

    $bib_id   = (new Helper)->IDGenerator(new KatalogModel, 'bib_id', 7, '0010-');
    $filename = 'sampul-default.png';
    $data     = [
      'bib_id'          => $bib_id,
      'id_jenis_bahan'  => Request()->jenis_bahan,
      'judul_utama'     => Request()->judul_utama,
      'judul_sub'       => Request()->judul_sub,
      'pengarang'       => Request()->pengarang,
      'penerbit'        => Request()->penerbit,
      'tempat_terbit'   => Request()->tempat_terbit,
      'thn_terbit'      => Request()->thn_terbit,
      'jumlah_hlm'      => Request()->jumlah_hlm,
      'dimensi'         => Request()->dimensi,
      'kelas_ddc'       => Request()->kelas_ddc,
      'no_panggil'      => Request()->no_panggil,
      'edisi'           => Request()->edisi,
      'isbn'            => Request()->isbn,
      'id_jenis_karya'  => Request()->jenis_karya,
      'id_bahasa'       => Request()->bahasa,
      'sampul_depan'    => $filename,
      'created_at'      => date("Y-m-d H:i:s")
    ];

    $this->KatalogModel->simpan($data);
    return redirect()->route('katalog')->with('success', 'Data Berhasil ditambahkan!');
  }

  public function simpanEdit($id)
  {
    //form validasi
    Request()->validate(
      [
        'judul_utama' => 'required',
        'pengarang' => 'required',
        'tempat_terbit' => 'required',
        'penerbit' => 'required',
        'thn_terbit' => 'required',
        'jumlah_hlm' => 'required',
        // 'dimensi' => 'required',
        'kelas_ddc' => 'required',
        'no_panggil' => 'required',
        'isbn' => 'required',
        'sampul_depan' => 'mimes:jpeg,png,jpg|max:2024000',
      ],
      [
        'judul_utama.required' => 'Wajib diisi!',
        'pengarang.required' => 'Wajib diisi!',
        'penerbit.required' => 'Wajib diisi!',
        'tempat_terbit.required' => 'Wajib diisi!',
        'penerbit.required' => 'Wajib diisi!',
        'thn_terbit.required' => 'Wajib diisi!',
        'jumlah_hlm.required' => 'Wajib diisi!',
        'kelas_ddc.required' => 'Wajib diisi!',
        'no_panggil.required' => 'Wajib diisi!',
        'isbn.required' => 'Wajib diisi!',
        'sampul_depan.mimes' => 'Format gambar tidak sesuai (png,jpg,jpeg)',
        'sampul_depan.max' => 'Ukuran maksimal 1024 MB',
      ]
    );


    //Jika ganti gambar
    if (Request()->gambar <> "") {
      //upload gambar
      $file = Request()->gambar;
      $filename = Request()->bib_id . '-' . Request()->judul_utama . '.' . $file->extension();
      $file->move(public_path('img/img-katalog'), $filename);

      $data = [
        'judul_utama'     => Request()->judul_utama,
        'judul_sub'       => Request()->judul_sub,
        'pengarang'       => Request()->pengarang,
        'penerbit'        => Request()->penerbit,
        'tempat_terbit'   => Request()->tempat_terbit,
        'thn_terbit'      => Request()->thn_terbit,
        'jumlah_hlm'      => Request()->jumlah_hlm,
        'dimensi'         => Request()->dimensi,
        'kelas_ddc'       => Request()->kelas_ddc,
        'edisi'           => Request()->edisi,
        'no_panggil'      => Request()->no_panggil,
        'isbn'            => Request()->isbn,
        'id_jenis_karya'  => Request()->jenis_karya,
        'id_bahasa'       => Request()->jenis_karya,
        'sampul_depan'    => $filename,
        'updated_at'      => now()
      ];

      $this->KatalogModel->edit($id, $data);
    } else {
        // Jika tidak ganti gambar
      $data = [
        'judul_utama' => Request()->judul_utama,
        'judul_sub' => Request()->judul_sub,
        'pengarang' => Request()->pengarang,
        'penerbit' => Request()->penerbit,
        'tempat_terbit' => Request()->tempat_terbit,
        'thn_terbit' => Request()->thn_terbit,
        'jumlah_hlm' => Request()->jumlah_hlm,
        'dimensi' => Request()->dimensi,
        'kelas_ddc' => Request()->kelas_ddc,
        'edisi' => Request()->edisi,
        'no_panggil' => Request()->no_panggil,
        'isbn' => Request()->isbn,
        'id_jenis_karya' => Request()->jenis_karya,
        'id_bahasa' => Request()->jenis_karya,
        'updated_at' => now()
      ];
      $this->KatalogModel->edit($id, $data);
    }

    return redirect()->route('katalog')->with('success', 'Data Berhasil diubah!');
    // return redirect()->back()->with('success', 'Data Berhasil diubah!');
  }

  public function uploadSampul($id)
  {
    //form validasi
    Request()->validate(
      [
        'gambar' => 'required|mimes:jpeg,png,jpg|max:2024000',
      ],
      [
        'gambar.required' => 'Wajib diisi!',
        'gambar.mimes' => 'Format gambar tidak sesuai (png,jpg,jpeg)',
        'gambar.max' => 'Ukuran maksimal 1024 MB',
      ]
    );

    //upload gambar
    $file     = Request()->gambar;
    $filename = Request()->bib_id . '.' . $file->extension();
    $file->move(public_path('img/img-katalog'), $filename);

    $data = [
      'sampul_depan' => $filename,
    ];

    $this->KatalogModel->edit($id, $data);
    return redirect()->route('koleksi')->with('success', 'Data Berhasil ditambahkan!');
  }

  public function destroy($id)
  {
    $this->katalog->where('bib_id', $id)->delete();
    $this->koleksi->where('bib_id', $id)->delete();
    return redirect('/katalog')->with('success', 'Data Berhasil dihapus');
  }
}
