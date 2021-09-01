<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tim = [
            [
                'nama' => 'Ir. Syaiful Hendra, S.Kom., M.Kom.',
                'posisi' => 'Project Manager',
                'foto' => 'hendra.png',
                'urutan' => 1
            ],
            [
                'nama' => 'Amirul Hidayah',
                'posisi' => 'Senior Developer',
                'foto' => 'amirul.png',
                'urutan' => 2
            ],
            [
                'nama' => 'Moh. Arham Rahim',
                'posisi' => 'Senior Developer',
                'foto' => 'arham.png',
                'urutan' => 3
            ]
        ];

        DB::table('tim')->insert($tim);
    }
}
