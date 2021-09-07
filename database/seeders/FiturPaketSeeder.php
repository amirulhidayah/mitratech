<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FiturPaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fitur = [
            [
                'fitur' => 'Biasa',
                'paket_id' => 1
            ],
            [
                'fitur' => 'Normal',
                'paket_id' => 1
            ],
            [
                'fitur' => 'Dukungan Pendek',
                'paket_id' => 1
            ],
            [
                'fitur' => 'Luar Biasa',
                'paket_id' => 2
            ],
            [
                'fitur' => 'Cepat',
                'paket_id' => 2
            ],
            [
                'fitur' => 'Dukungan Tiap Minggu',
                'paket_id' => 2
            ],
            [
                'fitur' => 'Hebat',
                'paket_id' => 3
            ],
            [
                'fitur' => 'Akses Kapan Saja',
                'paket_id' => 3
            ],
            [
                'fitur' => 'Dukungan Panjang',
                'paket_id' => 3
            ],
        ];
        DB::table('fitur_paket')->insert($fitur);
    }
}
