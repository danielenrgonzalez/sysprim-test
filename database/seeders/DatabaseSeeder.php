<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\BrandSeeder;
use Database\Seeders\ModelOfBrandSeeder;
use Database\Seeders\CarSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            BrandSeeder::class,
            ModelOfBrandSeeder::class,
            CarSeeder::class,
        ]);
    }
}
