<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function deliveries()
    {
        return $this->hasOne(User::class);
    }
}
