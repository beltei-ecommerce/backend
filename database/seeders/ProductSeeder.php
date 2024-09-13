<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                "fk_category_id" => 1,
                "name" => "ROG Strix G17 Advantage Edition G713",
                "product_code" => "SS3",
                "price" => 899.0,
                "quantity" => 100,
                "description" => "GeForce® RTX 3080 (TBD)\nWindows 10 Home\nAMD® Ryzen™ 9 \n17\"\n2*PCIE SSD Slot M.2 512GB\/1TB"
            ],
            [
                "fk_category_id" => 1,
                "name" => "ROG Strix G15 Advantage Edition G513",
                "product_code" => "SS3",
                "price" => 800.50,
                "quantity" => 150,
                "description" => "GeForce® RTX 3080 (TBD)  \r\nWindows 10 Home  \r\nAMD® Ryzen™ 9  \r\n15\"  \r\n2*PCIE SSD Slot M.2 512GB\/1TB",
            ],
            [
                "fk_category_id" => 1,
                "name" => "ROG Zephyrus M16 GU603",
                "product_code" => "SS3",
                "price" => 999.99,
                "quantity" => 100,
                "description" => "Windows 10 Pro\nGeForce RTX™ 3070\n11th Gen Intel® Core™ i9\n16\"\n2TB M.2 NVMe™ PCIe® 4.0 SSD",
            ],
            [
                "fk_category_id" => 1,
                "name" => "2021 ROG Flow X13 GV301",
                "product_code" => "SS4",
                "price" => 1200.0,
                "quantity" => 200,
                "description" => "GeForce® GTX 1650\nWindows 10 Pro\nAMD Ryzen™ 9 13\"\n1TB M.2 NVMe™ PCIe® 3.0 SSD",
            ],
            [
                "fk_category_id" => 1,
                "name" => "2021 ROG Zephyrus G14",
                "product_code" => "SS4",
                "price" => 1300.0,
                "quantity" => 100,
                "description" => "GeForce RTX™ GPU\nWindows 10 Pro\nAMD® Ryzen™ 9\n14\"\n1TB M.2 NVMe™ PCIe® 3.0 SSD",
            ]
        ];
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
