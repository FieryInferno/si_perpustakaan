<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'is_admin' => '1',
                'password' => bcrypt('admin'),
                'created_at' => '2021-04-9 01:00:09'
            ],
            [
                'name' => 'petugas',
                'email' => 'user@mail.com',
                'is_admin' => '0',
                'password' => bcrypt('petugas'),
                'created_at' => '2021-04-9 01:00:09'

            ]
        ];
        foreach ($user as $key => $value) {
            # code...
            User::create($value);
        }
    }
}
