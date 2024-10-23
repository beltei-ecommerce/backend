<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'fk_category_id',
        'name',
        'product_code',
        'price',
        'quantity',
        'description',
        'description2',
        'disable'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'disable'
    ];

    // Store or Update product
    public static function storeProduct($request, $id = null)
    {
        $product = $request->only([
            'fk_category_id', 'name', 'product_code',
            'price', 'quantity', 'description', 'disable'
        ]);
        $product = self::updateOrCreate(['id' => $id], $product);
        return $product;
    }

    // Check product existed
    public static function contains($field, $value)
    {
        return self::contains($field, $value);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'fk_category_id', 'id');
    }

    public function productImages(): HasMany
    {
        return $this->hasMany(ProductImage::class, 'fk_product_id', 'id');
    }
}
