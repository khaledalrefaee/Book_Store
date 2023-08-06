<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship_address extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'address',
            'city_id'
        ];

    public function cities()
    {
        return $this->belongsTo(Ship_city::class,'city_id','id');
    }
}
