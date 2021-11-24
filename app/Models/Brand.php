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
}
