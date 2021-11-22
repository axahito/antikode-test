<?php

namespace App\GraphQL\Mutations;

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
                    $file->storePubliclyAs('logo_'.$args['id']);
                } else {
                    $file->storePubliclyAs('banner_'.$args['id']);
                }
                break;

            case 'outlet':
                $file->storePubliclyAs('picture_outlet_'.$args['id']);
                break;

            case 'product':
                $file->storePubliclyAs('picture_product_'.$args['id']);
                break;
        }
    }
}
