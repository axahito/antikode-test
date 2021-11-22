<?php

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\DB;

class OutletMutator
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function create($_, array $args)
    {
        $outlet = new \App\Models\Outlet([
            'brand_id' => $args['brand_id'],
            'name' => $args['name'],
            'address' => $args['address'],
            'picture' => storage_path('images/logo/logo_1.png'),
            'position' => DB::raw("ST_GeomFromText('POINT(".$args['lng']." ".$args['lat'].")')")             
        ]);
        $brand = \App\Models\Brand::find($args['brand_id']);
        $brand->outlets()->save($outlet);

        return $outlet;
    }
}
