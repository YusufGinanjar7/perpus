<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Wishlist;
use App\Models\Genre; // Import model Genre

class WishlistController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $wishlistQuery = Wishlist::where('user_id', $user->id)
                                ->with('book.genres'); // Pastikan Anda memuat relasi many-to-many dengan `genres`

        // Filter berdasarkan genre jika ada
        if ($request->has('genre') && $request->genre != 'genre') {
            $wishlistQuery->whereHas('book.genres', function ($query) use ($request) {
                $query->where('name_genre', $request->genre); // Menggunakan relasi genres pada book
            });
        }

        // Ambil wishlist dengan genre yang difilter
        $wishlist = $wishlistQuery->get();

        // Ambil daftar genre untuk ditampilkan di filter
        $genres = Genre::all();

        return view('user.wishlist', compact('wishlist', 'user', 'genres'));
    }


    public function remove($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();

        return redirect()->route('wishlist.show')->with('success', 'Buku berhasil dihapus dari wishlist!');
    }
}
