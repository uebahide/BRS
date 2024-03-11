<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'test1',
                'email' => 'reader@brs.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'test2',
                'email' => 'reader2@brs.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'test3',
                'email' => 'reader3@brs.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'test4',
                'email' => 'reader4@brs.com',
                'password' => Hash::make('password123')
            ]
        ]);
    }
}
