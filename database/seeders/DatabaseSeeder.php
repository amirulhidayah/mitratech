<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\TimSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\CoverSeeder;
use Database\Seeders\ClientsSeeder;
use Database\Seeders\PlatformProjekSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ClientsSeeder::class);
        $this->call(TimSeeder::class);
        $this->call(CoverSeeder::class);
        $this->call(PlatformProjekSeeder::class);
        $this->call(UserSeeder::class);
    }
}
