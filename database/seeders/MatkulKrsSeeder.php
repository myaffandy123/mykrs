<?php

namespace Database\Seeders;

use App\Models\MatkulKrs;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MatkulKrsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $krs = [
            ['user_id' => 1, 'krs_id' => 1, 'mata_kuliah_id' => 1],
            ['user_id' => 1, 'krs_id' => 1, 'mata_kuliah_id' => 2],
            ['user_id' => 1, 'krs_id' => 2, 'mata_kuliah_id' => 3],
        ];

        foreach ($krs as $i) {
            MatkulKrs::create($i);
        }
    }
}
