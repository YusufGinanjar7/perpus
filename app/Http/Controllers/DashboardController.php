<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\loan;
use App\Models\User;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function dashboard() {
        $totalUsers = User::count();
        $totalBooks = Book::count();
        $lateReturns = Loan::where('status', 'belum')
            ->where('tanggal_pengembalian', '<', now())
            ->count();

        $loans = Loan::with('user', 'booking.book')->get();

        return view('admin.dashboard', compact('totalUsers', 'totalBooks', 'lateReturns', 'loans'));
    }

    // user controller
    public function users()
    {
        $users = User::all();
        return view('admin.user', compact('users'));
        //buat table pop up untuk edit user
    }

    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:8',
        ]);

        // Buat array data untuk diupdate
        $data = [
            'username' => $request->username,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ];

        // Jika password diisi, tambahkan ke array
        if (!empty($request->password)) {
            $data['password'] = bcrypt($request->password);
        }

        // Update data user
        $user->update($data);

        return redirect()->route('dashboard.users')->with('success', 'User updated successfully.');
    }


    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }


    public function getUser(User $user)
    {
        return response()->json($user);
    }


    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect()->route('dashboard.users')->with('success', 'User deleted successfully.');
    }


    // user controller

    //book controller
    public function books()
    {
        $books = Book::all();
        $genres = Genre::all(); // Ambil genre untuk dropdown
        return view('admin.book', compact('books', 'genres'));
    }

    private function getValidationRules()
    {
        return [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genre' => 'required|array', // Genre bisa lebih dari satu
            'genre.*' => 'exists:genres,id', // Pastikan genre valid
            'published_year' => 'required|date_format:Y',
            'publisher' => 'required|string|max:255',
            'available_copies' => 'required|integer|min:0',
            'total_copies' => 'required|integer|min:0',
            'synopsis' => 'required|string',
            'price' => 'required|numeric|min:0',
            'book_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function addBook(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_year' => 'required|integer',
            'publisher' => 'required|string|max:255',
            'available_copies' => 'required|integer|min:1',
            'total_copies' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'synopsis' => 'required|string',
            'genre' => 'required|array',
            'genre.*' => 'integer|exists:genres,id',
            'book_image' => 'nullable|image|max:2048',
        ]);

        $book = new Book($validated);

        // Simpan gambar jika diunggah
        if ($request->hasFile('book_image')) {
            $book->book_image = $request->file('book_image')->store('book_images', 'public');
        }

        $book->save();

        // Simpan relasi genre
        $book->genres()->attach($validated['genre']);

        return redirect()->route('dashboard.books')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        // Validasi data
        $validated = $request->validate($this->getValidationRules());

        // Upload gambar baru jika ada
        if ($request->hasFile('book_image')) {
            // Hapus gambar lama jika ada
            if ($book->book_image) {
                Storage::disk('public')->delete($book->book_image);
            }
            $validated['book_image'] = $request->file('book_image')->store('books', 'public');
        }

        // Perbarui data buku
        $book->update($validated);

        // Sinkronkan genre ke tabel pivot
        $book->genres()->sync($request->genre);

        return redirect()->route('dashboard.books')->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        // Hapus hubungan di tabel pivot
        $book->genres()->detach();

        // Hapus buku
        $book->delete();

        return redirect()->route('dashboard.books')->with('success', 'Buku berhasil dihapus.');
    }

    // book controller

    public function loans()
    {
        $loans = Loan::with(['booking.user', 'booking.book'])
            ->get()
            ->map(function ($loan) {
                $today = now();
                $dueDate = $loan->tanggal_pengembalian;

                // Periksa jika belum dikembalikan dan tenggat waktu lewat
                if ($loan->status === 'belum' && $today->greaterThan($dueDate)) {
                    $daysOverdue = $today->diffInDays($dueDate);
                    $loan->denda = $daysOverdue * 10000; // Rp 10.000 per hari keterlambatan
                    $loan->save();
                }

                return $loan;
            });

        return view('admin.transaksi', compact('loans'));
    }

    public function updateLoanStatus(Request $request, $id)
    {
        $loan = Loan::findOrFail($id);
        $loan->status = $request->status;

        // Reset denda jika sudah dikembalikan
        if ($request->status === 'dikembalikan') {
            $loan->denda = 0;
        }
        if ($request->status === 'hilang') {
            $loan->denda = $loan->booking->book->price;
        }

        $loan->save();

        return redirect()->route('dashboard.loans')->with('success', 'Status pinjaman berhasil diperbarui.');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }

}
