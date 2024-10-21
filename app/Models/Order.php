<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    // This disables mass assignment protection for all fields
    protected $guarded = [];

    public function orderProducts(): HasMany
    {
        return $this->hasMany(OrderProduct::class, 'fk_order_id', 'id');
    }
}
