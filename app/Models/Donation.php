<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'category_id',
        'condition',
        'description',
        'photos',
        'donor_name',
        'phone',
        'email',
        'status',
        'user_id'
    ];

    protected $casts = [
        'photos' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
{
    return $this->belongsTo(User::class);
}
}
