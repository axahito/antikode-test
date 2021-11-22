<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Brand extends Model
{
    use HasFactory;

    protected $fillables = ['name', 'logo', 'banner'];

    public function outlets () {
        return $this->hasMany(Outlet::class);
    }

    public function products () {
        return $this->hasMany(Product::class);
    }

    public function getDistanceFromMonas() {
        $raw = '';
        $raw .= 'SELECT ST_Distance_Sphere(ST_GeomFromText(`POINT(106.823536 -6.178581)`), foo.outlets.position) as distance FROM foo.outlets  order by distance';

        $result = DB::select($raw);
        
        return $result;
    }
}
