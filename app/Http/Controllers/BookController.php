<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua genre untuk dropdown filter
        $genres = Genre::all();

        // Ambil buku berdasarkan filter genre
        $books = $this->filterByGenre($request);

        // Jika ada pencarian, ambil buku berdasarkan pencarian
        if ($request->has('search') && !empty($request->search)) {
            $books = $this->searchBooks($request->search, $books);
        }

        // Kirim data ke view
        return view('user.daftarbuku', compact('books', 'genres'));
    }

    private function filterByGenre(Request $request)
    {
        $query = Book::query();

        // Filter berdasarkan genre
        if ($request->has('genre') && $request->genre != 'genre') {
            $query->whereHas('genres', function ($query) use ($request) {
                $query->where('name_genre', $request->genre);
            });
        }

        // Ambil semua buku sesuai query
        return $query->get();
    }

    private function searchBooks($searchTerm, $books)
    {
        return $books->filter(function ($book) use ($searchTerm) {
            return stripos($book->title, $searchTerm) !== false ||
                $book->genres->contains('name_genre', $searchTerm);
        });
    }

    // Metode untuk menambahkan buku ke wishlist
    public function addToWishlist(Request $request, $bookId)
    {
        try {
            // Check if book exists
            $book = Book::findOrFail($bookId);

            // Check if already in wishlist
            $existingWishlist = Wishlist::where('user_id', Auth::id())
                ->where('book_id', $bookId)
                ->first();

            if ($existingWishlist) {
                return response()->json([
                    'success' => false,
                    'message' => 'Buku sudah ada di wishlist'
                ]);
            }

            // Add to wishlist
            Wishlist::create([
                'user_id' => Auth::id(),
                'book_id' => $bookId,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Buku berhasil ditambahkan ke wishlist'
            ]);

        } catch (\Exception $e) {
            Log::error('Wishlist Error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menambahkan ke wishlist'
            ], 500);
        }
    }

    // Metode untuk menghapus buku dari wishlist
    public function removeFromWishlist(Request $request, $bookId)
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->where('book_id', $bookId)->first();
        if ($wishlist) {
            $wishlist->delete();
            return response()->json(['success' => true, 'message' => 'Buku berhasil dihapus dari wishlist']);
        }

        return response()->json(['success' => false, 'message' => 'Buku tidak ditemukan di wishlist']);
    }

    // Metode untuk menampilkan wishlist
    public function showWishlist()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->with('book')->get();
        return view('user.wishlist', compact('wishlist'));
    }

    public function show($id)
    {
        // Ambil buku berdasarkan ID
        $book = Book::findOrFail($id);

        // Kirim data buku ke view
        return view('user.detailbuku', compact('book'));
    }

}
