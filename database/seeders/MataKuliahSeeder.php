<?php

namespace Database\Seeders;

use App\Models\MataKuliah;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $matkul = [
            ['nama' => 'Mata Kuliah Test 1', 'kode' => 'T111', 'sks' => 1, 'kelas' => 'A', 'ruang' => 'T1.1', 'hari' => 'Senin', 'jam_mulai' => '07:00:00', 'jam_selesai' => '09:00:00',
            'user_id' => 1],
            ['nama' => 'Mata Kuliah Test 2', 'kode' => 'T222', 'sks' => 2, 'kelas' => 'B', 'ruang' => 'T2.2', 'hari' => 'Selasa', 'jam_mulai' => '09:00:00', 'jam_selesai' => '11:00:00',
            'user_id' => 1],
            ['nama' => 'Mata Kuliah Test 3', 'kode' => 'T333', 'sks' => 3, 'kelas' => 'A', 'ruang' => 'T1.3', 'hari' => 'Rabu', 'jam_mulai' => '13:00:00', 'jam_selesai' => '15:00:00',
            'user_id' => 1],

            ['nama' => 'Rekayasa Perangkat Lunak', 'kode' => 'CIF61019', 'sks' => 4, 'kelas' => 'A', 'ruang' => 'F3.1', 'hari' => 'Senin', 'jam_mulai' => '07:00:00', 'jam_selesai' => '09:00:00',
            'user_id' => 2],
            ['nama' => 'Jaringan Saraf Tiruan', 'kode' => 'CIF61020', 'sks' => 4, 'kelas' => 'B', 'ruang' => 'T2.2', 'hari' => 'Selasa', 'jam_mulai' => '09:00:00', 'jam_selesai' => '11:00:00',
            'user_id' => 2],
            ['nama' => 'Administrasi Sistem Server', 'kode' => 'CIF61022', 'sks' => 3, 'kelas' => 'A', 'ruang' => 'T3.3', 'hari' => 'Rabu', 'jam_mulai' => '13:00:00', 'jam_selesai' => '15:00:00',
            'user_id' => 2],
            ['nama' => 'Pemrograman Sistem Interaktif', 'kode' => 'CIF61018', 'sks' => 4, 'kelas' => 'B', 'ruang' => 'T4.2', 'hari' => 'Selasa', 'jam_mulai' => '09:00:00', 'jam_selesai' => '11:00:00',
            'user_id' => 2],
            ['nama' => 'Jaringan Nirkabel', 'kode' => 'CIF61024', 'sks' => 3, 'kelas' => 'A', 'ruang' => 'T4.3', 'hari' => 'Rabu', 'jam_mulai' => '13:00:00', 'jam_selesai' => '15:00:00',
            'user_id' => 2],

        ];

        foreach ($matkul as $m) {
            MataKuliah::create($m);
        }
    }
}
