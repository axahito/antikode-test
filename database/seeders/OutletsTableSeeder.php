<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Outlet;
use App\Models\Brand;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class OutletsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        Brand::all()->each(function ($brand) use ($faker) {
            foreach (range(1, 3) as $i) {
                Outlet::create([
                    'brand_id' => $brand->id,
                    'name' => $faker->name(),
                    'address' => $faker->address(),
                    'picture' => storage_path('images/logo/logo_1.png'),
                    // 'position' => -6.175150 106.816685,    
                    'position' => DB::raw("ST_GeomFromText('POINT(".$faker->longitude(106.821886, 106.751772)." ".$faker->latitude(-6.177030, -6.158726).")')")             
                ]);
            }
        });
    }
}
