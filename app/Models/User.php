<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // PERBAIKAN: Arahkan ke Donation model, bukan Product
    public function donations()
    {
        return $this->hasMany(Donation::class, 'user_id');
    }
    
    // Jika Anda juga punya relasi ke Product untuk donation
    public function donationProducts()
    {
        return $this->hasMany(Product::class, 'user_id')->where('type', 'donation');
    }
}