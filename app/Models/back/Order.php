<?php

namespace App\Models\back;

use App\Models\Ship_address;
use App\Models\Ship_city;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected  $guarded = [];



    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function city(){
        return $this->belongsTo(Ship_city::class,'city_id','id');
    }

    public function address(){
        return $this->belongsTo(Ship_address::class,'address_id','id');
    }


}
