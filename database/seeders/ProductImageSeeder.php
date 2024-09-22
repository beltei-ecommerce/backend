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
                "name" => "1726215284_laptop1",
                "path" => "1726215284_laptop1",
            ],
            [
                "fk_product_id" => 1,
                "name" => "1726215284_laptop1",
                "path" => "1726215284_laptop1",
            ],
            [
                "fk_product_id" => 2,
                "name" => "1726215392_laptop1",
                "path" => "1726215392_laptop1",
            ],
            [
                "fk_product_id" => 3,
                "name" => "1726215801_laptop2",
                "path" => "1726215801_laptop2",
            ],
            [
                "fk_product_id" => 4,
                "name" => "1726215885_laptop3",
                "path" => "1726215885_laptop3",
            ],
            [
                "fk_product_id" => 5,
                "name" => "1726215960_laptop4",
                "path" => "1726215960_laptop4",
            ]
        ];
        foreach ($items as $item) {
            ProductImage::create($item);
        }
    }
}
