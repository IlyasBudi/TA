<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
    ]);

        DB::table('category_buses')->insert([
        [
            'name' => 'Big Bus Seat 50 2-2 Non Toilet',
        ],
        [
            'name' => 'Big BusSeat 59 2-3 Non Toilet',
        ],
        [
            'name' => 'Seat 35/39 Konf 2-2',
        ],
        [
            'name' => 'Seat 30 Konf 2-2',
        ]
    ]);
    }
}
