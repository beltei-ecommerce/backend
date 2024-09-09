<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'fk_category_id' => 1,
                'name'=>"Dell Pro",
                'product_code'=>"A1",
                'description'=>"This is description",
            ],
            [
                'fk_category_id' => 1,
                'name'=>"Dell 2024",
                'product_code'=>"A2",
                'description'=>"This is description",
            ],
        ];
        foreach ($products as $product){
            Product::create($product);
        }
    }
}
