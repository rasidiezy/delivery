<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pickup;

class PickupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pickup::create ([
            'nama' => 'Toko Rasidi',
            'latitude' => '-1.6904291',
            'longitude' => '114.8779508',
            'alamat' => 'Jl. Pahlawan No.37, Pamait, Kec. Dusun Sel., Kabupaten Barito Selatan, Kalimantan Tengah 73713, Indonesia'
        ]);
    }
}
