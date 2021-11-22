<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillables = ['name', 'price', 'picture'];

    public function brand () {
        return $this->belongsTo(Brand::class);
    }
}
