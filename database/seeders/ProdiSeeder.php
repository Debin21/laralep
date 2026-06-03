<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prodi;
use App\Models\Fakultas; 

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prodis = [
            [
                'nama_prodi'   => 'Pendidikan sesat',
                'alias_prodi'  => 'Lmao',
                'nama_kaprodi' => 'Ajojing'
            ],
            [
                'nama_prodi'   => 'Pendidikan sesat2',
                'alias_prodi'  => 'Lmao2',
                'nama_kaprodi' => 'Ajojing2'
            ],
            [
                'nama_prodi'   => 'Pendidikan sesat3',
                'alias_prodi'  => 'Lmao3',
                'nama_kaprodi' => 'Ajojing3'
            ],
        ];

        foreach ($prodis as $prodi) {
            $prodi['fakultas_id'] = Fakultas::inRandomOrder()->first()->id;

            Prodi::create($prodi);
        }
    }
}