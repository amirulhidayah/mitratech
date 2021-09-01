<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = [
            [
                'nama' => 'Untad',
                'logo' => 'untad.png'
            ],
            [
                'nama' => 'Bawaslu',
                'logo' => 'bawaslu.png'
            ],
            [
                'nama' => 'Dinas PUPRP',
                'logo' => 'pu.png'
            ]
        ];
        DB::table('clients')->insert($clients);
    }
}
