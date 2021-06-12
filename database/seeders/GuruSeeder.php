<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('guru')->insert([
            [
                'kd_anggota' => 'P00001',
                'nip' => '092861192',
                'nama_guru' => 'Melati',
                'jkelamin' => 'Perempuan',
                'tempat_lahir' => 'Palangkaraya',
                'tgl_lahir' => '1982-01-18',
                'status' => 'Aktif',
                'gambar' => 'profile-default',
                'created_at' => '2021-04-9 01:00:09'
            ],
            [
                'kd_anggota' => 'P00002',
                'nip' => '092862536',
                'nama_guru' => 'Bambam',
                'jkelamin' => 'Laki-laki',
                'tempat_lahir' => 'Jakarta',
                'tgl_lahir' => '1990-03-10',
                'status' => 'Non-aktif',
                'gambar' => 'profile-default',
                'created_at' => '2021-04-9 01:00:09'
            ]
        ]);
    }
}
