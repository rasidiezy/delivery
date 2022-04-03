<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Discount;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $diskon = [
            [
                'nama' => 'Diskon 5%',
                'persentase' => '5',
                'min_ongkir' => '10000',
                'end_discount' => '2022-04-03'
            ],
            [
                'nama' => 'Diskon 10%',
                'persentase' => '10',
                'min_ongkir' => '15000',
                'end_discount' => '2022-04-03'
            ],
        ];

        Discount::insert($diskon);

    }
}
