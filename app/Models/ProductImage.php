<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'fk_product_id',
        'name',
        'path',
    ];

    protected $hidden = [
        'fk_product_id',
        'created_at',
        'updated_at',
    ];
}
