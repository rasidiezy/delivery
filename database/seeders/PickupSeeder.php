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
        $pickup = [
        [
            'nama' => 'Toko Rasidi',
            'latitude' => '-1.6904291',
            'longitude' => '114.8779508',
            'alamat' => 'Jl. Pahlawan No.37, Pamait, Kec. Dusun Sel., Kabupaten Barito Selatan, Kalimantan Tengah 73713, Indonesia'
        ],
        [
            'nama' => 'Takumi Coffe',
            'latitude' => '-1.7162820',
            'longitude' => '114.8366890',
            'alamat' => 'Jl. Pahlawan No.14, Buntok, Kec. Dusun Sel., Kabupaten Barito Selatan, Kalimantan Tengah 73713, Indonesia'
        ],
        [
            'nama' => 'Frozen Food and Cake Buntok',
            'latitude' => '-1.7195863',
            'longitude' => '114.8429075',
            'alamat' => 'Jl. Pelita Raya No.2, Hilir Sper, Kec. Dusun Sel., Kabupaten Barito Selatan, Kalimantan Tengah 73751, Indonesia'
        ],
        [
            'nama' => 'Kopi Dari Hati',
            'latitude' => '-1.7207648',
            'longitude' => '114.8416935',
            'alamat' => 'Jl. Pelita Raya No.41, Buntok Kota, Kec. Dusun Sel., Kabupaten Barito Selatan, Kalimantan Tengah 73751, Indonesia'
        ],
        [
            'nama' => 'Warung Febi',
            'latitude' => '-1.7025075',
            'longitude' => '114.8708131',
            'alamat' => 'Jl. Buntok, Kec. Dusun Sel., Kabupaten Barito Selatan, Kalimantan Tengah 73713, Indonesia'
        ],
        ];

        Pickup::insert($pickup);
    }
}
