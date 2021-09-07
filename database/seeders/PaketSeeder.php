<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paket = [
            [
                'nama' => 'Standar',
                'harga' => 'Rp. 2 Juta',
                'urutan' => 1,
            ],
            [
                'nama' => 'Professional',
                'harga' => 'Rp. 7 Juta',
                'urutan' => 2,
            ],
            [
                'nama' => 'Expert',
                'harga' => 'Rp. 15 Juta',
                'urutan' => 3,
            ]
        ];
        DB::table('paket')->insert($paket);
    }
}
