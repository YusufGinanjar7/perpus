<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genres')->insert([
            ['name_genre' => 'Fiction', 'created_at' => now(), 'updated_at' => now()],
            ['name_genre' => 'Non-Fiction', 'created_at' => now(), 'updated_at' => now()],
            ['name_genre' => 'Science Fiction', 'created_at' => now(), 'updated_at' => now()],
            ['name_genre' => 'Fantasy', 'created_at' => now(), 'updated_at' => now()],
            ['name_genre' => 'Biography', 'created_at' => now(), 'updated_at' => now()],
            ['name_genre' => 'History', 'created_at' => now(), 'updated_at' => now()],
            ['name_genre' => 'Romance', 'created_at' => now(), 'updated_at' => now()],
            ['name_genre' => 'mystery', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
