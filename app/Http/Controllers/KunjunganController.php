<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KunjunganController extends Controller
{
    public function index()
    {

        $data = [
            'anggota' => DB::table('kunjungan')->join('anggota', 'anggota.kd_anggota', '=', 'kunjungan.kd_anggota')
                ->get(['anggota.*', 'kunjungan.*'])
        ];

        return view('petugas.v_kunjungan', $data);
    }
    public function cari()
    {
        $start_date = Carbon::parse(Request()->tgl_awal)->addDays(-1)
            ->toDateTimeString();

        $end_date = Carbon::parse(Request()->tgl_akhir)->addDays(1)
            ->toDateTimeString();

        $data = [
            'anggota' => DB::table('kunjungan')->join('anggota', 'anggota.kd_anggota', '=', 'kunjungan.kd_anggota')
                ->whereBetween('kunjungan.tgl', [$start_date, $end_date])->get(['anggota.*', 'kunjungan.*'])
        ];
        return view('petugas.v_kunjungan', $data);
    }
}
