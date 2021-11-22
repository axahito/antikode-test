<?php

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\DB;

class OutletMutator
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     * create new outlet entry
     */
    public function create($_, array $args)
    {
        $outlet = new \App\Models\Outlet([
            'brand_id' => $args['brand_id'],
            'name' => $args['name'],
            'address' => $args['address'],
            'position' => DB::raw("ST_GeomFromText('POINT(".$args['lng']." ".$args['lat'].")')")             
        ]);
        $brand = \App\Models\Brand::find($args['brand_id']);
        $brand->outlets()->save($outlet);

        return $outlet;
    }

        /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     * update outlet entry
     */
    public function update($_, array $args)
    {
        $outlet = \App\Models\Outlet::find($args['id']);
        $outlet->update([
            'brand_id' => $args['brand_id'],
            'name' => $args['name'],
            'address' => $args['address'],
            'position' => DB::raw("ST_GeomFromText('POINT(".$args['lng']." ".$args['lat'].")')")             
        ]);

        return $outlet;
    }
}
