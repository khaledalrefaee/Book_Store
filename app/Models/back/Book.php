<?php

namespace App\Models\back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'author',
        'category_id',
        'published_date',
        'quantity',
        'image'
    ];

    public function category()
    {
        // ??
        return $this->belongsTo(Category::class, 'category_id');
    }
}
