<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Jika nama tabel tidak mengikuti konvensi Laravel
    protected $table = 'books';

    // Jika kolom yang dapat diisi (fillable)
    protected $fillable = [
        'title',
        'author',
        'published_year',
        'publisher',
        'available_copies',
        'total_copies',
        'synopsis',
        'price',
        'book_image',
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'book_genre');
    }
    public function wishlist(){
        return $this->belongsToMany(wishlist::class);
    }
}

