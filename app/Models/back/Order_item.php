<?php

namespace App\Models\back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function book(){
        return $this->belongsTo(Book::class,'book_id','id');
    }
}
