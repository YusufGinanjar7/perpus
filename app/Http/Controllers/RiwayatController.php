<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\loan;

class RiwayatController extends Controller
{
    public function show(Request $request)
    {
        $userId = Auth::id();
        $user = Auth::user();

        // Ambil status filter dari request (jika ada)
        $status = $request->get('status');
        $search = $request->get('search');
        
        // Panggil fungsi filterByStatus untuk mendapatkan data yang sudah difilter
        $loans = $this->filterByStatus($status, $userId, $search);

        return view('user.riwayat', compact('loans', 'user'));
    }

    public function filterByStatus($status, $userId, $search = null)
    {
        // Mulai query untuk mendapatkan riwayat peminjaman berdasarkan user
        $query = Loan::where('user_id', $userId)
                     ->with('book'); // Mengambil relasi dengan model Book

        // Filter berdasarkan status jika ada
        if ($status) {
            $query->where('status', $status);
        }

        // Filter berdasarkan pencarian jika ada
        if ($search) {
            $query->whereHas('book', function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            });
        }

        // Ambil data hasil filter
        return $query->get();
    }
}
