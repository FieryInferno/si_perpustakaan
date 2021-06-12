<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('anggota')->insert([
            [
                'kd_anggota' => 'S00001',
                'no_identitas' => '160820001',
                'status' => 'Siswa',
                'nama_anggota' => 'Karina',
                'jkelamin' => 'Perempuan',
                'tempat_lahir' => 'Jakarta',
                'tgl_lahir' => '2000-04-20',
                'status' => 'Aktif',
                'gambar' => 'profile-default.png',
                'created_at' => '2021-04-9 01:00:09'
            ],
            [
                'kd_anggota' => 'S08982',
                'no_identitas' => '130550001',
                'status' => 'Guru',
                'nama_anggota' => 'Johan',
                'jkelamin' => 'Laki-laki',
                'tempat_lahir' => 'Jakarta',
                'tgl_lahir' => '1980-04-20',
                'status' => 'Aktif',
                'gambar' => 'profile-default.png',
                'created_at' => '2021-04-9 01:00:09'
            ]
        ]);
    }
}
