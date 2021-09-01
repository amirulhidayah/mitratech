<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlatformProjekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $platform = [
            [
                'nama' => 'Website'
            ],
            [
                'nama' => 'Android'
            ],
            [
                'nama' => 'Desktop'
            ],
        ];
        DB::table('platform_projek')->insert($platform);
    }
}
