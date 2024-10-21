<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $listData = [
            [
                "education" => "SD/MI Sederajat",
                "description" => "Sekolah Dasar Sederajat",
            ],
            [
                "education" => "SMP/MTs Sederajat",
                "description" => "Sekolah Menengah Pertama Sederajat",
            ],
            [
                "education" => "SMA/SMK Sederajat",
                "description" => "Sekolah Menengah Atas Sederajat",
            ],
            [
                "education" => "S1 Sederajat",
                "description" => "Sarjana Sederajat",
            ],
        ];
    }
}
