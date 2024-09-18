<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
            ['fk_user_id' => 2, 'fk_product_id' => 1, 'quantity' => 1],
            ['fk_user_id' => 2, 'fk_product_id' => 2, 'quantity' => 2],
            ['fk_user_id' => 3, 'fk_product_id' => 3, 'quantity' => 3],
            ['fk_user_id' => 3, 'fk_product_id' => 4, 'quantity' => 1],
        ];

        foreach ($rows as $row) {
            Cart::create($row);
        }
    }
}
