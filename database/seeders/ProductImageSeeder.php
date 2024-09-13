<?php

namespace Database\Seeders;

use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                "fk_product_id" => 1,
                "name" => "1726215284_laptop1.png",
                "path" => "1726215284_laptop1.png",
            ],
            [
                "fk_product_id" => 2,
                "name" => "1726215392_laptop1.png",
                "path" => "1726215392_laptop1.png",
            ],
            [
                "fk_product_id" => 3,
                "name" => "1726215801_laptop2.png",
                "path" => "1726215801_laptop2.png",
            ],
            [
                "fk_product_id" => 4,
                "name" => "1726215885_laptop3.png",
                "path" => "1726215885_laptop3.png",
            ],
            [
                "fk_product_id" => 5,
                "name" => "1726215960_laptop4.png",
                "path" => "1726215960_laptop4.png",
            ]
        ];
        foreach ($items as $item) {
            ProductImage::create($item);
        }
    }
}
