<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\book_genre;

class Book_genreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 100; $i++) {
            $bookGenre[] = [
                'book_id' => $i,
                'genre_id' => rand(1, 7), 
            ];
        }

        book_genre::insert($bookGenre);
    }
}
