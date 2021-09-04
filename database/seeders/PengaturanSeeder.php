<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengaturanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pengaturan = [
            [
                'nama_website' => 'Mitra Technology',
                'slogan' => 'Kami bisa bantu anda mewujudkan ide anda kedalam platform yang anda inginkan ',
                'kontak' => '0811-4583-853',
                'email' => 'mitrateknologi1@gmail.com',
                'logo' => 'logo.png'
            ]
        ];
        DB::table('pengaturan')->insert($pengaturan);
    }
}
