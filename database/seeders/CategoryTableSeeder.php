<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name'=> "DELL"],
            ['name'=> "HP"],
            ['name'=> "Lenovo"],
            ['name'=> "Apple"],
        ];

        foreach ($categories as $category){
            Category::create($category);
        }
    }
}
