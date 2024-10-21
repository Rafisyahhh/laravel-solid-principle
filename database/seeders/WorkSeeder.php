<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $listData = [
            [
                "work" => "PNS",
                "description" => "Pegawai Negeri Sipil",
            ],
            [
                "work" => "TNI",
                "description" => "Tentara Negara Indonesia",
            ],
            [
                "work" => "Polisi",
                "description" => "Polisi Indonesia",
            ],
            [
                "work" => "Wira Swasta",
                "description" => "Pegawai Wira Swasta",
            ],
            [
                "work" => "Wira Usaha",
                "description" => "Pegawai Wira Usaha",
            ],
        ];
    }
}
