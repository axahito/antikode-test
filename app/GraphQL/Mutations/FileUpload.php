<?php

namespace App\GraphQL\Mutations;

use App\Models\Brand;
use App\Models\Outlet;
use App\Models\Product;

class FileUpload
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $file = $args['file'];
        switch ($args['parameter']) {
            case 'brand':
                if ($args['category'] == 'logo') {
                    $file->storePubliclyAs('images', 'logo_'.$args['id']);
                    Brand::find($args['id'])->update([
                        'logo' => $file
                    ]);
                } else {
                    $file->storePubliclyAs('images', 'banner_'.$args['id']);
                    Brand::find($args['id'])->update([
                        'banner' => $file
                    ]);
                }
                break;

            case 'outlet':
                $file->storePubliclyAs('images', 'picture_outlet_'.$args['id']);
                Outlet::find($args['id'])->update([
                    'picture' => $file
                ]);
                break;

            case 'product':
                $file->storePubliclyAs('images', 'picture_product_'.$args['id']);
                Product::find($args['id'])->update([
                    'picture' => $file
                ]);
                break;
        }
    }
}
