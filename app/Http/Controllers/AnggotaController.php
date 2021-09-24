<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnggotaModel;
use Illuminate\Support\Facades\DB;

class AnggotaController extends Controller
{
  public function __construct()
  {
    $this->AnggotaModel = new AnggotaModel();
  }

  public function index()
  {
    // View Hak Akses dan parsing data
    $users = DB::table('anggota')->get();

    return view('petugas.v_anggota', ['users' => $users]);
  }

  public function detailAnggota($id)
  {
    return DB::table('anggota')->where('id', $id)->first();
  }

  public function entriAnggota()
  {
    return view('petugas.v_entri-anggota');
  }

    public function editAnggota($id)
    {
        if (!$this->AnggotaModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'anggota' => $this->AnggotaModel->detailData($id),
        ];
        return view('petugas.v_edit-anggota', $data);
    }
    public function simpan()
    {
      //form validasi
      Request()->validate(
          [
              'kd_anggota' => 'required|unique:anggota,kd_anggota|max:10',
              'no_identitas' => 'required|unique:anggota,no_identitas',
              'nama_anggota' => 'required',
              'tempat_lahir' => 'required',
              'tgl_lahir' => 'required',
              'jkelamin' => 'required',
              'gambar' => 'required|mimes:jpeg,png,jpg|max:2024000',
          ],
          [
              'kd_anggota.required' => 'Wajib diisi!',
              'kd_anggota.unique' => 'Nomor Anggota ini Sudah Ada!',
              'kd_anggota.max' => 'Nomor Anggota maksimal 10 karakter!',
              'no_identitas.required' => 'Wajib diisi!',
              'no_identitas.unique' => 'No.Identitas ini Sudah Terdaftar!',
              'nama_anggota.required' => 'Wajib diisi!',
              'tempat_lahir.required' => 'Wajib diisi!',
              'tgl_lahir.required' => 'Wajib diisi!',
              'jkelamin.required' => 'Wajib diisi!',
              'gambar.required' => 'Wajib diisi!',
              'gambar.mimes' => 'Format gambar tidak sesuai (png,jpg,jpeg)',
              'gambar.max' => 'Ukuran maksimal 1024 MB',
          ]
      );

      //upload gambar
      $file     = Request()->gambar;
      $filename = Request()->status . '-' . Request()->nama_anggota . '-' . Request()->no_identitas . '.' . $file->extension();
      $file->move(public_path('img/img-anggota'), $filename);

      $data = [
        'kd_anggota'    => Request()->kd_anggota,
        'no_identitas'  => Request()->no_identitas,
        'nama_anggota'  => Request()->nama_anggota,
        'status'        => Request()->status,
        'tempat_lahir'  => Request()->tempat_lahir,
        'tgl_lahir'     => Request()->tgl_lahir,
        'jkelamin'      => Request()->jkelamin,
        'gambar'        => $filename,
        'created_at'    => date("Y-m-d H:i:s")
      ];

        $this->AnggotaModel->simpan($data);
        return redirect()->route('data-anggota')->with('success', 'Data Berhasil ditambahkan!');
    }

    public function simpanEdit($id)
    {
        //form validasi
        Request()->validate(
            [

                'nama_anggota' => 'required',
                // 'kelas' => 'required',
                'tempat_lahir' => 'required',
                'tgl_lahir' => 'required',
                'jkelamin' => 'required',
                'gambar' => 'mimes:jpeg,png,jpg|max:2024000',
            ],
            [

                'nama_anggota.required' => 'Wajib diisi!',
                'tempat_lahir.required' => 'Wajib diisi!',
                'tgl_lahir.required' => 'Wajib diisi!',
                'jkelamin.required' => 'Wajib diisi!',
                'gambar.required' => 'Wajib diisi!',
                'gambar.mimes' => 'Format gambar tidak sesuai (png,jpg,jpeg)',
                'gambar.max' => 'Ukuran maksimal 1024 MB',

            ]
        );


        //Jika ganti gambar
        if (Request()->gambar <> "") {
            //upload gambar
            $file = Request()->gambar;
            $filename = Request()->no_identitas . '-' . Request()->nama_anggota . '.' . $file->extension();
            $file->move(public_path('img/img-anggota'), $filename);

            $data = [

                'nama_anggota' => Request()->nama_anggota,
                'keanggotaan' => Request()->keanggotaan,
                'tempat_lahir' => Request()->tempat_lahir,
                'tgl_lahir' => Request()->tgl_lahir,
                'jkelamin' => Request()->jkelamin,
                'gambar' => $filename,
                'updated_at' => now()
            ];
            $this->AnggotaModel->edit($id, $data);
            // var_dump($data, "ganti");
        } else {
            // Jika tidak ganti gambar
            $data = [

                'nama_anggota' => Request()->nama_anggota,
                'keanggotaan' => Request()->keanggotaan,
                'tempat_lahir' => Request()->tempat_lahir,
                'tgl_lahir' => Request()->tgl_lahir,
                'jkelamin' => Request()->jkelamin,
                'updated_at' => now()
            ];
            $this->AnggotaModel->edit($id, $data);
            // var_dump($data, "tidak ganti");
        }

        return redirect()->route('data-anggota')->with('success', 'Data Berhasil diubah!');
    }

    public function hapus($id)
    {
      //hapus file gambar

      $anggota = $this->AnggotaModel->detailData($id);
      if ($anggota->gambar <> "") {
        unlink(public_path('img/img-anggota') . '/' . $anggota->gambar);
      }
      $this->AnggotaModel->hapus($id);
      return redirect()->route('data-anggota')->with('success', 'Data Berhasil dihapus!');
    }

    public function kartu($id)
    {
        if (!$this->AnggotaModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'anggota' => $this->AnggotaModel->detailData($id),
        ];
        return view('petugas.cetak.v_cetak-kartu', $data);
    }
}
