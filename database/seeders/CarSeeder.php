<?php

namespace Database\Seeders;

use App\Models\Car;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Car::insert([
            [
                'model_of_brand_id' => 1,
                'plate' => '1xu78',
                'year' => '2000',
                'color' => '#3e3e3e',
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
            [
                'model_of_brand_id' => 15,
                'plate' => '4vg32',
                'year' => '2010',
                'color' => '#000',
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
            [
                'model_of_brand_id' => 21,
                'plate' => '8rt45',
                'year' => '1999',
                'color' => '#fff',
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
