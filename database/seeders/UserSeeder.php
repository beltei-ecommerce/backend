<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'first_name' => "Jonh",
                'last_name' => "Son",
                'gender' => "male",
                'email' => 'admin@example.com',
                'password' => '123',
            ],
            [
                'first_name' => "Amma",
                'last_name' => "Nita",
                'gender' => "female",
                'email' => 'user@example.com',
                'password' => '123',
            ],
            [
                'first_name' => "Dara",
                'last_name' => "SOK",
                'gender' => "male",
                'email' => 'dara@example.com',
                'password' => '123',
            ]
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
