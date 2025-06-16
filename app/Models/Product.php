<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id', 'image', 'description', 'stock', 'price', 'user_id', 'type'];

    protected $casts = [
        'price' => 'float',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

