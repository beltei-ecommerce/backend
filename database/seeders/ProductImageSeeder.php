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
            ],
            [
                "fk_product_id" => 6,
                "name" => "laptop1_1",
                "path" => "laptop1_1",
            ],
            [
                "fk_product_id" => 6,
                "name" => "laptop1_2",
                "path" => "laptop1_2",
            ],
            [
                "fk_product_id" => 6,
                "name" => "laptop1_3",
                "path" => "laptop1_3",
            ],
            [
                "fk_product_id" => 6,
                "name" => "laptop1_4",
                "path" => "laptop1_4",
            ],
            [
                "fk_product_id" => 7,
                "name" => "laptop2_1",
                "path" => "laptop2_1",
            ],
            [
                "fk_product_id" => 7,
                "name" => "laptop2_2",
                "path" => "laptop2_2",
            ],
            [
                "fk_product_id" => 7,
                "name" => "laptop2_3",
                "path" => "laptop2_3",
            ],
            [
                "fk_product_id" => 8,
                "name" => "lp1",
                "path" => "lp1",
            ],
            [
                "fk_product_id" => 9,
                "name" => "lp5_1",
                "path" => "lp5_1",
            ],
            [
                "fk_product_id" => 9,
                "name" => "lp5_2",
                "path" => "lp5_2",
            ],
            [
                "fk_product_id" => 10,
                "name" => "lp4",
                "path" => "lp4",
            ],
            [
                "fk_product_id" => 11,
                "name" => "lp3_1",
                "path" => "lp3_1",
            ],
            [
                "fk_product_id" => 11,
                "name" => "lp3_2",
                "path" => "lp3_2",
            ],
        ];
        foreach ($items as $item) {
            ProductImage::create($item);
        }
    }
}
