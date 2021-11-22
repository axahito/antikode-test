<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Outlet;
use Illuminate\Http\Request;

class APIUplaodController extends Controller
{
    public function upload (Request $request)
    {
        $validated = $request->validate([
            'file' => 'file',
            'parameter' => 'required|in:brand,outlet,product',
            'category' => 'required|in:logo,banner,picture',
            'id' => 'requried|numeric'
        ]);

        if ($validated) {
            $file = $request->file('file');

            switch ($request->parameter) {
                case 'brand':
                    $model = Brand::find($request->id);
                    if ($request->category == 'logo') {
                        $file->storePubliclyAs('images', 'logo_'.$request->id);
                        $model->update([
                            'logo' => $file
                        ]);
                    } else {
                        $file->storePubliclyAs('images', 'banner_'.$request->id);
                        $model->update([
                            'banner' => $file
                        ]);
                    }
                    
                    break;

                case 'outlet':
                    $model = Outlet::find($request->id);
                    $file->storePubliclyAs('images', 'picture_outlet_'.$request->id);
                    $model->update([
                        'picture' => $file
                    ]);
                    
                    break;

                case 'product':
                    $model = Outlet::find($request->id);
                    $file->storePubliclyAs('images', 'picture_product'.$request->id);
                    $model->update([
                        'product' => $file
                    ]);
                    
                    break;
            }

            return response()->json([$file], 200);
        } else {
            return response()->json(['input parameter is wrong!']);
        }
    }
}
