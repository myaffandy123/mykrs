<?php

namespace Database\Seeders;

use App\Models\Krs;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KrsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $krs = [
            ['nama' => 'KRS Pertama', 'deskripsi' => 'Ini adalah contoh deskripsi pertama', 'user_id' => 1],
            ['nama' => 'KRS Kedua', 'deskripsi' => 'Ini adalah contoh deskripsi pertama', 'user_id' => 1],

            ['nama' => 'KRS Plan A', 'deskripsi' => 'Plan Primary', 'user_id' => 2],
        ];

        foreach ($krs as $i) {
            Krs::create($i);
        }
    }
}
