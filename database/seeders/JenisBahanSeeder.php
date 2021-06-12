<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisBahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_bahan')->insert([
            [
                'jenis_bahan' => 'Buku Pelajaran PG (Pegangan-Guru)'

            ],
            [
                'jenis_bahan' => 'Buku Pelajaran  (Buku Pelajaran Siswa)'

            ],
            [
                'jenis_bahan' => 'Kamus'

            ],
            [
                'jenis_bahan' => 'Monograf (Buku, Jurnal, laporan)'

            ]
        ]);
    }
}
