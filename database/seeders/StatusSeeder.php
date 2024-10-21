<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $listData = [
            [
                "status" => "Pelajar",
                "description" => "Masih duduk dibangku pelajar",
            ],
            [
                "status" => "Mahasiswa",
                "description" => "Mahasiswa Universitas",
            ],
            [
                "status" => "Anak anak",
                "description" => "Anak-anak dibawah 5 tahun",
            ],
            [
                "status" => "Sudah Menikah",
                "description" => "Sudah Menikah",
            ],
        ];
    }
}
