<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Models\Book;

class IndexController extends Controller
{
    /**
     * Tampilkan halaman index dengan data buku.
     */
    public function index()
    {
        // Ambil 7 buku dari database yang memiliki available_copies > 0
        $books = Book::where('available_copies', '>', 0)
            ->inRandomOrder()
            ->limit(7)
            ->get();

        // Tampilkan view user.index dengan data buku
        return view('user.index', compact('books'));
    }

    /**
     * Ambil daftar buku dan arahkan ke halaman index.
     */
    public function daftarBuku()
    {
        // Ambil buku secara acak dengan filter available_copies > 0
        $books = Book::where('available_copies', '>', 0)
            ->inRandomOrder()
            ->limit(7)
            ->get();

        if ($books->isEmpty()) {
            // Jika tidak ada buku yang ditemukan
            session()->flash('error', 'Tidak ada buku yang tersedia.');
        } else {
            // Jika buku tersedia
            session()->flash('success', 'Daftar buku berhasil dimuat.');
        }

        // Redirect ke halaman index
        return redirect()->route('user.index');
    }
}
