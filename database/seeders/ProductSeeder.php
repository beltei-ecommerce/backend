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
                "description" => "GeForce® RTX 3080 (TBD)\nWindows 10 Home\nAMD® Ryzen™ 9 \n17\"\n2*PCIE SSD Slot M.2 512GB\/1TB",
                "description2" => "
                14-inch 2560 x 1440 anti-glare IPS display, 16:9\n
                AMD Ryzen 9 5900HS 3.1 GHz (16M cache, up to 4.5 GHz)\n
                16GB DDR4 on board, 16GB DDR4-3200 SO-DIMM\n
                1TB M.2 NVMe PCIe 3.0 SSD\n
                No webcam\n
                Wi-Fi 6 (802.11ax), Bluetooth 5.1 (dual band) 2*2\n
                76WHr battery, 4SIP, four-cell Li-ion\n
                180W AC adapter\n
                ",
            ],
            [
                "fk_category_id" => 1,
                "name" => "ROG Strix G15 Advantage Edition G513",
                "product_code" => "SS3",
                "price" => 800.50,
                "quantity" => 150,
                "description" => "GeForce® RTX 3080 (TBD)  \r\nWindows 10 Home  \r\nAMD® Ryzen™ 9  \r\n15\"  \r\n2*PCIE SSD Slot M.2 512GB\/1TB",
                "description2" => "
                14-inch 2560 x 1440 anti-glare IPS display, 16:9\n
                AMD Ryzen 9 5900HS 3.1 GHz (16M cache, up to 4.5 GHz)\n
                16GB DDR4 on board, 16GB DDR4-3200 SO-DIMM\n
                1TB M.2 NVMe PCIe 3.0 SSD\n
                No webcam\n
                Wi-Fi 6 (802.11ax), Bluetooth 5.1 (dual band) 2*2\n
                76WHr battery, 4SIP, four-cell Li-ion\n
                180W AC adapter\n
                ",
            ],
            [
                "fk_category_id" => 1,
                "name" => "ROG Zephyrus M16 GU603",
                "product_code" => "SS3",
                "price" => 999.99,
                "quantity" => 100,
                "description" => "Windows 10 Pro\nGeForce RTX™ 3070\n11th Gen Intel® Core™ i9\n16\"\n2TB M.2 NVMe™ PCIe® 4.0 SSD",
                "description2" => "
                14-inch 2560 x 1440 anti-glare IPS display, 16:9\n
                AMD Ryzen 9 5900HS 3.1 GHz (16M cache, up to 4.5 GHz)\n
                16GB DDR4 on board, 16GB DDR4-3200 SO-DIMM\n
                1TB M.2 NVMe PCIe 3.0 SSD\n
                No webcam\n
                Wi-Fi 6 (802.11ax), Bluetooth 5.1 (dual band) 2*2\n
                76WHr battery, 4SIP, four-cell Li-ion\n
                180W AC adapter\n
                ",
            ],
            [
                "fk_category_id" => 1,
                "name" => "2021 ROG Flow X13 GV301",
                "product_code" => "SS4",
                "price" => 1200.0,
                "quantity" => 200,
                "description" => "GeForce® GTX 1650\nWindows 10 Pro\nAMD Ryzen™ 9 13\"\n1TB M.2 NVMe™ PCIe® 3.0 SSD",
                "description2" => "
                14-inch 2560 x 1440 anti-glare IPS display, 16:9\n
                AMD Ryzen 9 5900HS 3.1 GHz (16M cache, up to 4.5 GHz)\n
                16GB DDR4 on board, 16GB DDR4-3200 SO-DIMM\n
                1TB M.2 NVMe PCIe 3.0 SSD\n
                No webcam\n
                Wi-Fi 6 (802.11ax), Bluetooth 5.1 (dual band) 2*2\n
                76WHr battery, 4SIP, four-cell Li-ion\n
                180W AC adapter\n
                ",
            ],
            [
                "fk_category_id" => 1,
                "name" => "2021 ROG Zephyrus G14",
                "product_code" => "SS4",
                "price" => 1300.0,
                "quantity" => 100,
                "description" => "GeForce RTX™ GPU\nWindows 10 Pro\nAMD® Ryzen™ 9\n14\"\n1TB M.2 NVMe™ PCIe® 3.0 SSD",
                "description2" => "
                    14-inch 2560 x 1440 anti-glare IPS display, 16:9\n
                    AMD Ryzen 9 5900HS 3.1 GHz (16M cache, up to 4.5 GHz)\n
                    16GB DDR4 on board, 16GB DDR4-3200 SO-DIMM\n
                    1TB M.2 NVMe PCIe 3.0 SSD\n
                    No webcam\n
                    Wi-Fi 6 (802.11ax), Bluetooth 5.1 (dual band) 2*2\n
                    76WHr battery, 4SIP, four-cell Li-ion\n
                    180W AC adapter\n
                    ",
            ],
            [
                "fk_category_id" => 5,
                "name" => "Mid 2019 Apple MacBook Pro",
                "product_code" => "A6",
                "price" => 409.00,
                "quantity" => 50,
                "description" => "Mid 2019 Apple MacBook Pro with 1.4GHz Intel Core i5 (13.3 inch, 8GB RAM, 256GB SSD) Silver (Renewed)",
                "description2" => "
                14-inch 2560 x 1440 anti-glare IPS display, 16:9\n
                AMD Ryzen 9 5900HS 3.1 GHz (16M cache, up to 4.5 GHz)\n
                16GB DDR4 on board, 16GB DDR4-3200 SO-DIMM\n
                1TB M.2 NVMe PCIe 3.0 SSD\n
                No webcam\n
                Wi-Fi 6 (802.11ax), Bluetooth 5.1 (dual band) 2*2\n
                76WHr battery, 4SIP, four-cell Li-ion\n
                180W AC adapter\n
                ",
            ],
            [
                "fk_category_id" => 5,
                "name" => "MacBook Pro 2023",
                "product_code" => "A7",
                "price" => 1495.00,
                "quantity" => 70,
                "description" => "Apple M2 Pro chip 12-core CPU, 16-core Neural Engine and 19-core GPU, 16.2-inch Liquid Retina XDR",
                "description2" => "
                Model Name	MacBook Pro\n
                Screen Size	13.3 Inches\n
                Color	Space Gray\n
                Hard Disk Size	128 GB\n
                CPU Model	Core i5\n
                Ram Memory Installed Size	8 GB\n
                Operating System	macOS 10.15 Catalina\n
                Special Feature	Backlit Keyboard, Fingerprint Reader, HD Audio\n
                Graphics Card Description	Integrated
                ",
            ],
            [
                "fk_category_id" => 5,
                "name" => 'MacBook Air 13',
                "product_code" => "A7",
                "price" => 1489.00,
                "quantity" => 70,
                "description" => 'MacBook Air 13 ( M2 Chip / 16GB / SSD 256GB /13.6" )',
                "description2" => "
                FREE: Sleeve, Lecoo WS21 Bluetooth Mouse, Mouse Pad.\n
                - CPU: Apple M2 Chip 8-Core CPU, 8-Core GPU, and 16-Core Neural Engine\n
                - Ram: 16GB Unified Memory\n
                - Storage: 256GB SSD\n
                - HD Webcam, Wi-Fi, Bluetooth\n
                - 3.5mm Headphone Jack\n
                - Display: 13.6'' Retina True Tone\n
                - Weight: 1.24kg\n
                - Color: Silver, Starlight, Space Gray, Midnightn
                Warranty\n
                - 1-year hardware\n
                - (No warranty for screen, battery, keyboard, fan & speaker, adapter)
                ",
            ],
            [
                "fk_category_id" => 5,
                "name" => 'MacBook Air 13',
                "product_code" => "A7",
                "price" => 1269.00,
                "quantity" => 70,
                "description" => 'MacBook Air 13 ( M3 Chip / 8GB / SSD 512GB /13.6")',
                "description2" => "
                FREE: Sleeve, Lecoo WS21 Bluetooth Mouse, Mouse Pad.\n
                - CPU: Apple M2 Chip 8-Core CPU, 8-Core GPU, and 16-Core Neural Engine\n
                - Ram: 8GB Unified Memory\n
                - Storage: 256GB SSD\n
                - HD Webcam, Wi-Fi, Bluetooth\n
                - 3.5mm Headphone Jack\n
                - Display: 13.6'' Retina True Tone\n
                - Weight: 1.24kg\n
                - Color: Silver, Starlight, Space Gray, Midnight\n
                Warranty\n
                - 1-year hardware\n
                - (No warranty for screen, battery, keyboard, fan & speaker, adapter)
                ",
            ],
            [
                "fk_category_id" => 5,
                "name" => 'MacBook Air 13',
                "product_code" => "A7",
                "price" => 939.00,
                "quantity" => 50,
                "description" => 'MacBook Air 13 ( M2 Chip / 8GB / SSD 256GB /13.6")',
                "description2" => "
                FREE: Sleeve, Lecoo WS21 Bluetooth Mouse, Mouse Pad.\n
                - CPU: Apple M3 Chip 8-Core CPU, 8-Core GPU, and 16-Core Neural Engine\n
                - Ram: 8GB Unified Memory\n
                - Storage: 512GB SSD\n
                - Display: 13.6'' Retina True Tone\n
                - Wi-Fi + Bluetooth\n
                - 3.5mm Headphone Jack\n
                - Weight: 1.24kg\n
                - Color: Silver, Starlight, Space Gray, Midnight\n
                Warranty\n
                - 1-year hardware\n
                - (No warranty for screen, battery, keyboard, fan & speaker, adapter)
                ",
            ],
            [
                "fk_category_id" => 5,
                "name" => 'MacBook Pro 14',
                "product_code" => "A7",
                "price" => 1719.00,
                "quantity" => 40,
                "description" => 'MacBook Pro 14 ( M2 Pro / 16GB / SSD 512GB / 14.2")',
                "description2" => '
                FREE: Sleeve, Lecoo WS21 Bluetooth Mouse, Mouse Pad.
                -CPU: Apple M2 Pro with 10-core CPU, 16-core GPU, 16-core Neural Engine
                -RAM: 16GB Unified
                -Storage: SSD 512GB
                -Display: 14.2" Liquid Retina XDR Display
                -Wi-Fi + Bluetooth 5
                -Weigh : 1.6Kg
                -OS: MacOS
                -Color: Grey and Silver
                Warranty
                - 1-year hardware
                - (No warranty for screen, battery, keyboard, fan & speaker, adapter)
                ',
            ],
        ];
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
