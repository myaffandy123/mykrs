<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'Administrator Test', 'nim' => '123123', 'email' => 'admin@admin.com', 'password' => Hash::make('admintest')],
            ['name' => 'Muhammad Yusuf Affandy', 'nim' => '215150200111052', 'email' => 'myaffandy123@gmail.com', 'password' => Hash::make('myaffandy')],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
