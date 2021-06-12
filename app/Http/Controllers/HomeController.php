<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
  public $peminjaman_bulanan    = [];
  public $pengembalian_bulanan  = [];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth');
      $no = 0;
      for ($i=1; $i <= 12 ; $i++) { 
        switch (strlen($i)) {
          case 1:
            $bulan  = (string) '0' . $i;
            break;
          
          default:
            $bulan  = (string) $i;
            break;
        }
        $this->peminjaman_bulanan[$no]    = DB::table('v_transaksi')->whereMonth('tgl_pinjam', '=', $bulan)->get();
        $this->pengembalian_bulanan[$no]  = DB::table('v_transaksi')->whereMonth('tgl_kembali', '=', $bulan)->get();
        $no++;
      }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function admin()
    {
      $data = [
        'koleksi'               => DB::table('v_koleksi_katalog')->get(),
        'anggota'               => DB::table('anggota')->where('keanggotaan', 'Aktif')->get(),
        'peminjaman'            => DB::table('v_transaksi')->where('status_pinjam', 'Pinjam')->get(),
        'pengembalian'          => DB::table('v_transaksi')->where('status_pinjam', 'Kembali')->get(),
        'kunjungan'             => DB::table('kunjungan')->where('tgl', now())->get(),
        'peminjaman_bulanan'    => $this->peminjaman_bulanan,
        'pengembalian_bulanan'  => $this->pengembalian_bulanan
      ];
      return view('admin.v_adminHome', $data);
    }

    public function petugas()
    {
      $data = [
        'koleksi' => DB::table('v_koleksi_katalog')->get(),
        'anggota' => DB::table('anggota')->where('keanggotaan', 'Aktif')->get(),
        'peminjaman' => DB::table('v_transaksi')->where('status_pinjam', 'Pinjam')->get(),
        'pengembalian' => DB::table('v_transaksi')->where('status_pinjam', 'Kembali')->get(),
        'peminjaman_bulanan'    => $this->peminjaman_bulanan,
        'pengembalian_bulanan'  => $this->pengembalian_bulanan
      ];
      return view('petugas.v_petugasHome', $data);
    }
}
