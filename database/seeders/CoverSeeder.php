<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cover = [
            [
                'foto' => 'mobile.png'
            ],
            [
                'foto' => 'psikotes.png'
            ],
            [
                'foto' => 'sipekaperban.png'
            ],
            [
                'foto' => 'sipenaemas.png'
            ],
            [
                'foto' => 'situlus.png'
            ],
            [
                'foto' => 'upsp.png'
            ],
        ];
        DB::table('covers')->insert($cover);
    }
}
