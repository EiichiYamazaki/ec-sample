<?php

namespace App\Models;

use App\Enum\ItemEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $casts = [
        'is_published' => ItemEnum::class,
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

}
