<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $listData = [
            [
                "address" => "RT 01",
                "description" => "JL Damarwulan Wlingi",
            ],
            [
                "address" => "RT 02",
                "description" => "JL Soekarno Hatta Wlingi",
            ],
            [
                "address" => "RT 03",
                "description" => "JL Cempaka Putih Wlingi",
            ],
            [
                "address" => "RT 04",
                "description" => "JL Antasari Wlingi",
            ],
        ];
    }
}
