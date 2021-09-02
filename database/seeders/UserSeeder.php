<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use Faker\Generator;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{

    // protected $faker;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // $faker = Faker\Factory::create();
    public function run()
    {

        $faker = \Faker\Factory::create();
        $user = [
            [
                'name' => 'Moh. Arham Rahim',
                'username' => 'arhamrahim97',
                'email' => $faker->unique()->safeEmail(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 1,
                'foto' => 'empty-picture.png',
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Amirul Hidayah',
                'username' => 'amirulhidayah',
                'email' => $faker->unique()->safeEmail(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 1,
                'foto' => 'empty-picture.png',
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Syaiful Hendra',
                'username' => 'syaifulhendra',
                'email' => $faker->unique()->safeEmail(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 1,
                'foto' => 'empty-picture.png',
                'remember_token' => Str::random(10),
            ]
        ];
        // foreach ($user as $a) {
        //     User::create($a);
        // }

        DB::table('users')->insert($user);
    }
}
