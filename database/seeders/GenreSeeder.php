<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('genres')->insert([
            [
                'name' => 'horror',
                'style' => 'dark'
            ],
            [
                'name' => 'comedy',
                'style' => 'primary'
            ],
            [
                'name' => 'love',
                'style' => 'secondary'
            ],
            [
                'name' => 'mystery',
                'style' => 'warning'
            ],
            [
                'name' => 'suspence',
                'style' => 'danger'
            ],
            [
                'name' => 'SF',
                'style' => 'info'
            ],
            [
                'name' => 'nature',
                'style' => 'success'
            ]
        ]);
    }
}
