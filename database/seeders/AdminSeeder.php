<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'name' => 'Admin YPA Rumah Damai',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin2024'),
                'created_at' => now(),
                'updated_at' => now()
            ]
            ];
            User::insert($admins);
    }
}
