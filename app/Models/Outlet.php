<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Outlet extends Model
{
    use HasFactory;

    protected $fillable = ['brand_id', 'name', 'picture', 'address', 'position'];

    public function brand () {
        return $this->belongsTo(Brand::class);
    }

    public function getPosition() {
        $raw = '';

        $raw .= 'SELECT ST_X(`'.$this->table.'`.`position`) AS lat, ST_Y(`'.$this->table.'`.`position`) AS lng FROM '.$this->table.' WHERE id = '.$this->id;

        $result = DB::select($raw);
        
        return array(
            "lat" => $result['0']->lat,
            "lng" => $result['0']->lng
        );
    }
}
