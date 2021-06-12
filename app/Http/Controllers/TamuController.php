<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TamuController extends Controller
{
    public function index()
    {

        $data = [
            'tamu' => DB::table('tamu')->get()
        ];

        return view('petugas.v_kunjunganTamu', $data);
    }
    public function cari()
    {
        $start_date = Carbon::parse(Request()->tgl_awal)->addDays(-1)
            ->toDateTimeString();

        $end_date = Carbon::parse(Request()->tgl_akhir)->addDays(1)
            ->toDateTimeString();

        $data = [
            'tamu' => DB::table('tamu')->whereBetween('tgl', [$start_date, $end_date])->get()
        ];
        return view('petugas.v_kunjunganTamu', $data);
    }
}
