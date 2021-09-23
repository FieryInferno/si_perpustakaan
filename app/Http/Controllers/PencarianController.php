<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PencarianModel;
use App\Models\EksemplarModel;
use Illuminate\Support\Facades\DB;
use App\Models\AnggotaModel;
use App\Models\KatalogModel;
use App\Models\KoleksiModel;
use Carbon\Carbon;

class PencarianController extends Controller
{
  public function __construct()
  {
    $this->PencarianModel = new PencarianModel();
    $this->EksemplarModel = new EksemplarModel();
    $this->AnggotaModel   = new AnggotaModel();
    $this->katalog        = new KatalogModel();
    $this->koleksi        = new KoleksiModel();
  }

  public function index()
  {
    //pencarian
    if (request()->has('keyword') && trim(request()->keyword)) {
      $data = [
        'kategori' => PencarianModel::select("*")->get()->toArray(),
        'buku' => $this->EksemplarModel->pencarian(request()->keyword, request()->kategori)
      ];
      return view('searchbar', $data);
    } else {
      $buku = $this->katalog->groupBy('katalog.bib_id')->join('koleksi', 'katalog.bib_id', '=', 'koleksi.bib_id')->paginate(5);
      for ($i=0; $i < count($buku); $i++) {
        $key                    = $buku[$i];
        $koleksi                = $this->koleksi->where('bib_id', $key['bib_id'])->where('ketersediaan', 'Tersedia')->count();
        $buku[$i]['eksemplar']  = $koleksi;
      }
      $data = [
        'kategori'  => PencarianModel::select("*")->get()->toArray(),
        'buku'      => $buku
        // 'buku' => EksemplarModel::select("*")->paginate(2)
      ];
      return view('searchbar', $data);
    }
  }

    public function pengunjung()
    {
        $mytime = Carbon::today();
        $mytime->toDateTimeString();
        $data = [
            'kunjungan' => DB::table('kunjungan')->whereRaw('Date(tgl) = CURDATE()')->get()
        ];
        return view('kunjungan', $data);
    }
    public function tamu()
    {

        return view('buku-tamu');
    }
    public function entriTamu()
    {
        //form validasi
        Request()->validate(
            [

                'nama' => 'required',
                'instansi' => 'required',
                'keperluan' => 'required',
            ],
            [

                'nama.required' => 'Silakan Isi Nama Anda',
                'instansi.required' => 'Silakan Isi Asal Instansi Anda',
                'keperluan.required' => 'Silakan Isi Keperluan Anda'

            ]
        );


        $data = [
            'nama' => Request()->nama,
            'instansi' => Request()->instansi,
            'keperluan' => Request()->keperluan
        ];
        DB::table('tamu')->insert($data);

        return redirect()->back()->with('success', 'Terimakasih atas kunjungan anda...');
    }
    public function entriPengunjung()
    {
        $anggota = [
            'kd_anggota' => Request()->kd_anggota
        ];

        if (!$this->AnggotaModel->detailData($anggota)) {
            return redirect()->back()->with('warning', 'Kode Anggota Tida Ada!!! Silakan Periksa kembali Kode Anggota Anda');
        } else {
            $data = [
                'kd_anggota' => Request()->kd_anggota,
            ];
            DB::table('kunjungan')->insert($data);

            return redirect()->back()->with('success', 'Terimakasih atas kunjungan anda...');
        }
    }
}
