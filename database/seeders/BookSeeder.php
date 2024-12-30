<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'title' => 'Bumi',
                'author' => 'Tere Liye',
                'published_year' => 2014,
                'publisher' => 'Gramedia',
                'available_copies' => 10,
                'total_copies' => 10,
                'synopsis' => 'Bumi adalah kisah tentang perjalanan Raib, Seli, dan Ali ke dunia paralel penuh misteri.',
                'price' => 95000,
                'book_image' => '/img/Bumi.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Bulan',
                'author' => 'Tere Liye',
                'published_year' => 2015,
                'publisher' => 'Gramedia',
                'available_copies' => 8,
                'total_copies' => 10,
                'synopsis' => 'Bulan melanjutkan petualangan Raib, Seli, dan Ali ke dunia paralel berikutnya.',
                'price' => 98000,
                'book_image' => '/img/Bulan.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Matahari',
                'author' => 'Tere Liye',
                'published_year' => 2016,
                'publisher' => 'Gramedia',
                'available_copies' => 7,
                'total_copies' => 10,
                'synopsis' => 'Matahari membawa pembaca lebih dalam ke dunia paralel yang penuh teka-teki.',
                'price' => 100000,
                'book_image' => '/img/Matahari.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Bintang',
                'author' => 'Tere Liye',
                'published_year' => 2017,
                'publisher' => 'Gramedia',
                'available_copies' => 6,
                'total_copies' => 10,
                'synopsis' => 'Bintang adalah cerita yang semakin seru tentang persahabatan dan petualangan.',
                'price' => 105000,
                'book_image' => '/img/Bintang.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Ceros dan Batozar',
                'author' => 'Tere Liye',
                'published_year' => 2018,
                'publisher' => 'Gramedia',
                'available_copies' => 9,
                'total_copies' => 10,
                'synopsis' => 'Ceros dan Batozar memperkenalkan karakter baru di dunia paralel.',
                'price' => 110000,
                'book_image' => '/img/CerosdanBatozar.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Komet',
                'author' => 'Tere Liye',
                'published_year' => 2019,
                'publisher' => 'Gramedia',
                'available_copies' => 8,
                'total_copies' => 10,
                'synopsis' => 'Komet adalah cerita yang semakin menegangkan di dunia paralel.',
                'price' => 115000,
                'book_image' => '/img/Komet.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Komet Minor',
                'author' => 'Tere Liye',
                'published_year' => 2020,
                'publisher' => 'Gramedia',
                'available_copies' => 7,
                'total_copies' => 10,
                'synopsis' => 'Komet Minor melanjutkan kisah epik perjalanan dunia paralel.',
                'price' => 120000,
                'book_image' => '/img/KometMinor.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Selena',
                'author' => 'Tere Liye',
                'published_year' => 2021,
                'publisher' => 'Gramedia',
                'available_copies' => 5,
                'total_copies' => 10,
                'synopsis' => 'Selena memberikan sudut pandang baru dalam kisah dunia paralel.',
                'price' => 125000,
                'book_image' => '/img/Selena.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Nebula',
                'author' => 'Tere Liye',
                'published_year' => 2022,
                'publisher' => 'Gramedia',
                'available_copies' => 6,
                'total_copies' => 10,
                'synopsis' => 'Nebula adalah petualangan terakhir yang penuh kejutan.',
                'price' => 130000,
                'book_image' => '/img/Nebula.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
