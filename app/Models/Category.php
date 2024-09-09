<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    public static function storeCategory($name, $id = null)
    {
        $category = self::updateOrCreate(['id' => $id], ['name' =>$name]);
        return $category;
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'fk_category_id', 'id');
    }
}
