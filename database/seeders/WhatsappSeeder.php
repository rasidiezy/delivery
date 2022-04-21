<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NomorWhatsapp;

class WhatsappSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $whatsapp = [
            [
                'no_hp' => '085158580660',
            ],
        ];
        NomorWhatsapp::insert($whatsapp);
    }
}
