<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('book_genre')->insert([
            // Bumi (Fiction, Fantasy)
            [
                'book_id' => 1, // ID buku "Bumi"
                'genre_id' => 1, // Genre: Fiction
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_id' => 1,
                'genre_id' => 4, // Genre: Fantasy
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Bulan (Fiction, Fantasy)
            [
                'book_id' => 2,
                'genre_id' => 1, // Genre: Fiction
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_id' => 2,
                'genre_id' => 4, // Genre: Fantasy
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Matahari (Fiction, Science Fiction)
            [
                'book_id' => 3,
                'genre_id' => 1, // Genre: Fiction
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_id' => 3,
                'genre_id' => 2, // Genre: Science Fiction
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Bintang (Fiction)
            [
                'book_id' => 4,
                'genre_id' => 1, // Genre: Fiction
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Ceros dan Batozar (Science Fiction)
            [
                'book_id' => 5,
                'genre_id' => 2, // Genre: Science Fiction
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Komet (Fiction, Fantasy)
            [
                'book_id' => 6,
                'genre_id' => 1, // Genre: Fiction
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_id' => 6,
                'genre_id' => 4, // Genre: Fantasy
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'book_id' => 7,
                'genre_id' => 1, // Genre: Fiction
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_id' => 7,
                'genre_id' => 4, // Genre: Fantasy
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Selena (Fiction)
            [
                'book_id' => 8,
                'genre_id' => 1, // Genre: Fiction
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Nebula (Science Fiction)
            [
                'book_id' => 9,
                'genre_id' => 2, // Genre: Science Fiction
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
