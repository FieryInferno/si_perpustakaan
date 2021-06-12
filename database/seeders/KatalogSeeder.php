<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //data katalog

        DB::table('katalog')->insert([

            [

                'bib_id' => '0010-1120000001',
                'judul_utama'  => 'Matematika Dasar',
                'judul_sub'  => 'Matematika Untuk SMA kelas 10',
                'pengarang' => 'Haryanto',
                'tempat_terbit' => 'Yoygakarta',
                'penerbit' => 'Erlangga',
                'thn_terbit' => '2020',
                'jumlah_hlm' => '400',
                'dimensi' => '17,6 cm x 25 cm',
                'sampul_depan' => 'sampul-default.png',
                'kelas_ddc' => '510.370',
                'no_panggil' => ' 510.370',
                'isbn' => '1221-1221-1221',
                'id_bahasa' => '1',
                'id_jenis_bahan' => '1',
                'id_jenis_karya' => '1',
                'created_at' => '2021-04-9 01:00:09'
            ],
            [
                'bib_id' => '0010-1120000002',
                'judul_utama'  => 'Matematika Dasar',
                'judul_sub'  => 'Matematika Untuk SMA kelas 10',
                'pengarang' => 'Haryanto',
                'tempat_terbit' => 'Yoygakarta',
                'penerbit' => 'Erlangga',
                'thn_terbit' => '2020',
                'jumlah_hlm' => '400',
                'dimensi' => '17,6 cm x 25 cm',
                'sampul_depan' => 'sampul-default.png',
                'kelas_ddc' => '510.370',
                'no_panggil' => ' 510.370',
                'isbn' => '1221-1221-1221',
                'id_bahasa' => '1',
                'id_jenis_bahan' => '2',
                'id_jenis_karya' => '1',
                'created_at' => '2021-04-9 01:00:09'
            ]
        ]);
    }
}
