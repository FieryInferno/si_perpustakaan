<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisKaryaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_karya')->insert([
            [
                'jenis_karya' => 'non-fiksi'

            ],
            [
                'jenis_karya' => 'fiksi'

            ],
            [
                'jenis_karya' => 'biografi'

            ],
            [
                'jenis_karya' => 'antologi'

            ],
            [
                'jenis_karya' => 'panduan'

            ],
        ]);
    }
}
