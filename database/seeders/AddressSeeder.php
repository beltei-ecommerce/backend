<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
            [
                'fk_user_id' => 2,
                'telephone' => '0973432424',
                'company' => 'Sourceamax Asia',
                'address1' => '#51A, St.214 S/K Boeng Reang, Khan Daun Penh',
                'city' => 'Phnom Penh',
                'post_code' => '22222',
                'country' => 'Cambodia',
                'region' => 'Phnom Penh',
            ],
            [
                'fk_user_id' => 3,
                'telephone' => '0663233233',
                'company' => 'Sourceamax Asia',
                'address1' => '#53A, St.2004 Phnom Penh',
                'address2' => '',
                'city' => 'Phnom Penh',
                'post_code' => '44444',
                'country' => 'Cambodia',
                'region' => 'Phnom Penh',
            ],
        ];

        foreach ($rows as $row) {
            Address::create($row);
        }
    }
}
