<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\loan;
use Carbon\Carbon;

class PinjamBukuController extends Controller
{
    public function pinjamBuku(Request $request)
    {
        $user = Auth::user();
        // Mengarahkan ke view pinjam buku
        return view('user.pinjambuku', compact('user'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required_without:book_id|string',
            'book_id' => 'required_without:judul|exists:books,id',
            'tanggal_peminjaman' => 'required|date',
            'terms' => 'accepted',
        ]);

        // Jika book_id tidak dikirim, cari buku berdasarkan judul
        if (!$request->book_id) {
            $books = Book::where('title', 'LIKE', '%' . $request->judul . '%')->get();

            if ($books->isEmpty()) {
                return redirect()->back()->with('error', 'Buku dengan judul tersebut tidak ditemukan.');
            }

            // Jika hanya satu buku ditemukan, pilih otomatis
            if ($books->count() === 1) {
                $book = $books->first();
                $request->merge(['book_id' => $book->id]); // Tambahkan book_id ke request
            } else {
                // Jika lebih dari satu buku ditemukan, kembalikan pilihan ke pengguna
                return redirect()->back()->with('books', $books)->with('error', 'Harap pilih buku yang tepat.');
            }
        }

        // Menghitung tanggal pengembalian 5 hari setelah tanggal peminjaman
        $tanggalPengembalian = Carbon::parse($request->tanggal_peminjaman)->addDays(5);

        // Buat entri peminjaman baru
        Loan::create([
            'book_id' => $request->book_id,
            'user_id' => Auth::id(),
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'tanggal_pengembalian' => $tanggalPengembalian,
            'denda' => 0,
            'status' => 'belum',
        ]);

        return redirect()->back()->with('success', 'Buku berhasil dipinjam!');
    }
}

