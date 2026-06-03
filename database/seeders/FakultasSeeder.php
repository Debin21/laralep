<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fakultas = [
            [
                'nama_fakultas' => 'Fakultas Teknik Ancrit',
                'nama_dekan'    => 'Lmao',
            ],
            [
                'nama_fakultas' => 'Fakultas Teknik Silit',
                'nama_dekan'    => 'Lmao2',
            ],
            [
                'nama_fakultas' => 'Fakultas Teknik Biji',
                'nama_dekan'    => 'Lmao3',
            ],
        ];

        foreach ($fakultas as $data) {
            Fakultas::create($data);
        }
    }
}
