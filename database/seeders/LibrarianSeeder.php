<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LibrarianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('librarians')->insert([
            'name' => 'librarian',
            'email' => 'test@test.test',
            'password' => Hash::make('password123'),
            'is_librarian' => true
        ]);
    }
}
