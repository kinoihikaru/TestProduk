<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'harga',
        'user_id',
    ];

    protected $hidden = [
        'user_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
