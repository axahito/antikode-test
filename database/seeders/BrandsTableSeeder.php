<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;
use Faker\Factory;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        Brand::create([
            'name' => $faker->word(),
            'logo' => storage_path('\images\logo\logo_1.png'),
            'banner' => storage_path('\images\banner\banner_1.png')
        ]);
    }
}
