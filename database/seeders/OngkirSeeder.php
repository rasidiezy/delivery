<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ongkir;

class OngkirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ongkir = [
            [
                'ongkir' => 2000,
            ],
        ];
        Ongkir::insert($ongkir);
    }
}
