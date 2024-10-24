<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'disable',
        'created_at',
        'updated_at'
    ];

    public static function storeCategory($name, $id = null)
    {
        $category = self::updateOrCreate(['id' => $id], ['name' => $name]);
        return $category;
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'fk_category_id', 'id');
    }
}
